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
        

        $cipher = "aes-256-cbc";
        $iv = "0123456789012345";
        $key = "870d87ta20685b40";
        
        $cnpj = openssl_encrypt($cnpj, $cipher, $key, $options=0, $iv);
        $nome = openssl_encrypt($nome, $cipher, $key, $options=0, $iv);

        return Http::get("http://127.0.0.1:5000/?login=$cnpj&senha=$senha&nome=$nome")->body();
       
    }
}