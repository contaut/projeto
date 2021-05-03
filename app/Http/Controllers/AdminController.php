<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;

class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin'); 
    }

    public function index(){
        $clientes = Cliente::all();
        return view ('admin', compact('clientes'));
    }
}
