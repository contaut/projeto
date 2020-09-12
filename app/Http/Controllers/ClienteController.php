<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return view ('clientes.index');
    }

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
}
