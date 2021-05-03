<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth:admin'); 
    }

    public function index(){
        $usuarios = User::all();
        return view ('admin', compact('usuarios'));
    }
}
