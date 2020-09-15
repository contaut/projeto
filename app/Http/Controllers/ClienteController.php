<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

use App\Imports\ClientesImport;

use Maatwebsite\Excel\Facades\Excel;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('clientes.index');
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('clientes.create');
    }

    public function edit()
    {
        return view ('clientes.edit');
    }

    public function import()
    {
        return view ('clientes.import');
    }

    public function importFile(Request $request) 
    {
        try
        {
        $request->validate([
            'planilha' => 'required',
        ]);
        
        $file = request()->file('planilha');
        //dd($file);

        Excel::import(new ClientesImport, $file);     
        return redirect()->route('clientes.index');//with('success', 'All good!');  
        } 
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            return view('clientes.import', compact('failures'));
         }
    }
     
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:255',
            'cnpj' => 'required|max:18|unique:clientes|cnpj',
            'cga' => 'required|max:14|unique:clientes',
            'senha' => 'required',
            'uniprofissional' => 'required|max:255',
            'qtd_pessoas' => 'required_if:uniprofissional,S',
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->cga = $request->input('cga');
        $cliente->senha = $request->input('senha');
        $cliente->uniprofissional = $request->input('uniprofissional');
        $cliente->qtd_socios = $request->input('qtd_pessoas');
        $cliente->save();
        return redirect()->route('clientes.index');
    }
}
