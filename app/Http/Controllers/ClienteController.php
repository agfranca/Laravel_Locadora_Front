<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/cliente')->collect();
        
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $response = Http::acceptJson()
        ->post('https://locadoraxapi.herokuapp.com/api/cliente',[
            'nome' => $request->nome,
        ]);
        //dd($response->body());
        return redirect()->route('clientes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //dd($id);
        $cliente = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/cliente/'.$id)->collect();
        return view('clientes.edit',compact('cliente'));
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
        
        $cliente = Http::accept('application/json')
        ->put('https://locadoraxapi.herokuapp.com/api/cliente/'.$id,[
            'nome' => $request->nome,
        ]);
        //$cliente->update($request->all());
        return redirect()->route('clientes.index');    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd('Estou no Destroy');
        $response = Http::acceptJson()
        ->delete('https://locadoraxapi.herokuapp.com/api/cliente/'.$id);
        //dd($response->body());
        return redirect()->route('clientes.index');
    }
}
