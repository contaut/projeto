<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Cliente;

class PythonController extends Controller
{
    public function run(Request $request)
    {
        $id = $request->get("id");
        
        if(!$client = Cliente::find($id))
          return redirect()->back();

        $cnpj = preg_replace('/[^0-9]+/', '', $client['cnpj']);  
        $senha = $client['senha'];
        $nome = $client['nome'];

        return Http::get("http://127.0.0.1:5000/?login=$cnpj&senha=$senha&nome=$nome")->body();
       
    }
}