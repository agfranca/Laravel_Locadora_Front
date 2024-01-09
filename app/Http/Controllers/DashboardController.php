<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        $clientes = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/cliente')->collect()->count();
        
        $marcas = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/marca')->collect()->count();

        $modelos = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/modelo')->collect()->count();

        $carros = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/carro')->collect()->count();

        $locacoes = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/locacao')->collect()->count();

        $carrosdisponiveis = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/carro?filtro=disponivel:=:1')->collect();

        return view('index',compact('clientes','marcas', 'modelos', 'carros', 'locacoes','carrosdisponiveis'));
    }
}
