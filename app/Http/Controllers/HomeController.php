<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Corrida;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->role == 'motorista')
            $corridas = Corrida::whereNull('motorista_id')->get();
        
        
        return view('home', compact('corridas'));
    }
}
