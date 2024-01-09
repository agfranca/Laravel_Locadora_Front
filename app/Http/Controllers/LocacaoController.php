<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class LocacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locacoes = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/locacao')->collect();
        
        return view('locacoes.index', compact('locacoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clientes = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/cliente')->collect();
        $carros = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/carro')->collect();
        return view('locacoes.create', compact('clientes','carros'));
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
        ->post('https://locadoraxapi.herokuapp.com/api/locacao',[
            'cliente_id' => $request->cliente_id,
            'carro_id' => $request->carro_id,
            'data_inicio_periodo' => $request->data_inicio_periodo,
            'data_final_previsto_periodo' => $request->data_final_previsto_periodo,
            'data_final_realizado_periodo' => $request->data_final_realizado_periodo,
            'valor_diaria' => $request->valor_diaria,
            'km_inicial' => $request->km_inicial,
            'km_final' => $request->km_final,
        ]);
        //testar o retorno da API
        //dd($response->body());
        return redirect()->route('locacoes.index');
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
        $clientes = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/cliente')->collect();
        $carros = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/carro?filtro=disponivel:=:1')->collect();
        $locacao = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/locacao/'.$id)->collect();
        
        return view('locacoes.edit', compact('clientes','carros','locacao'));
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
        $response = Http::acceptJson()
        ->put('https://locadoraxapi.herokuapp.com/api/locacao/'.$id,[
            'cliente_id' => $request->cliente_id,
            'carro_id' => $request->carro_id,
            'data_inicio_periodo' => $request->data_inicio_periodo,
            'data_final_previsto_periodo' => $request->data_final_previsto_periodo,
            'data_final_realizado_periodo' => $request->data_final_realizado_periodo,
            'valor_diaria' => $request->valor_diaria,
            'km_inicial' => $request->km_inicial,
            'km_final' => $request->km_final,
        ]);
        //testar o retorno da API
        //dd($response->body());
        return redirect()->route('locacoes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::acceptJson()
        ->delete('https://locadoraxapi.herokuapp.com/api/locacao/'.$id);
        //dd($response->body());
        return redirect()->route('locacoes.index');
    }
}
