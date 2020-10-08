<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cliente;

use App\Imports\ClientesImport;

use Maatwebsite\Excel\Facades\Excel;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return view ('clientes.index', compact('clientes'));
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
            'cnpj' => 'required|string|max:18|unique:clientes|cnpj',
            'cga' => 'required|string|min:14|max:14|unique:clientes|regex:/^\d{3}\.\d{3}\/\d{3}\-\d{2}$/',
            'senha' => 'required',
            'uniprofissional' => 'required|max:255',
            'qtd_socios' => 'required_if:uniprofissional,==,S',
        ]);

        $cliente = new Cliente();
        $cliente->nome = $request->input('nome');
        $cliente->cnpj = $request->input('cnpj');
        $cliente->cga = $request->input('cga');
        $cliente->senha = $request->input('senha');
        $cliente->uniprofissional = $request->input('uniprofissional');
        $cliente->qtd_socios = $request->input('qtd_socios');
        $cliente->save();
        return redirect()->route('clientes.index')->with('mensagem', 'Cliente cadastrado!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!$client = Cliente::find($id))
            return redirect()->back();

        return view ('clientes.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(!$client = Cliente::find($id))
            return redirect()->back();

            Validator::make($request->all(), [
                'cnpj' => [
                    'required',
                    'max:18',
                    'cnpj',
                    Rule::unique('clientes')->ignore($client->id),
                ],
                'cga' => [
                    'required',
                    'max:14',
                    'cnpj',
                    Rule::unique('clientes')->ignore($client->id),
                ],
                'nome' => 'required|max:255',
                'senha' => 'required',
                'uniprofissional' => 'required|max:255',
                'qtd_socios' => 'required_if:uniprofissional,==,S',
            ]);   

        $client->update($request->all());

        return redirect()->route('clientes.index')->with('mensagem', 'Cliente atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!$client = Cliente::find($id))
            return redirect()->back();
        
        $client->delete();

        return redirect()->route('clientes.index');
    }
}
