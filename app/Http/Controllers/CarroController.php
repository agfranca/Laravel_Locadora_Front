<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class CarroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $carros = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/carro')->collect();
        
        return view('carros.index', compact('carros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $modelos = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/modelo')->collect();
        return view('carros.create', compact('modelos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Testar se existe pois o campo checkbox tipo switch não retorna se não estiver marcado 
        if (isset($request->disponivel)){
            $disponivel = 1;
        }else{
            $disponivel = 0;
        }

        $response = Http::acceptJson()
        ->post('https://locadoraxapi.herokuapp.com/api/carro',[
            'modelo_id' => $request->modelo_id,
            'placa' => $request->placa,
            'disponivel' => $disponivel,
            'km' => $request->km,
        ]);
        //testar o retorno da API
        //dd($response->body());
        return redirect()->route('carros.index');

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
        $modelos = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/modelo')->collect();
        $carro = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/carro/'.$id)->collect();
        return view('carros.edit',compact('carro','modelos'));
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
        //dd($request->disponivel);
        //Testar se existe pois o campo checkbox tipo switch não retorna se não estiver marcado 
        if (isset($request->disponivel)){
            $disponivel = 1;
        }else{
            $disponivel = 0;
        }
        //dd($id);
        //dd($request->all());
        $response = Http::accept('application/json')
        ->put('https://locadoraxapi.herokuapp.com/api/carro/'.$id,[
            'modelo_id' => $request->modelo_id,
            'placa' => $request->placa,
            'disponivel' => $disponivel,
            'km' => $request->km,
        ]);
        //testar o retorno da API
        //dd($response->body());
        return redirect()->route('carros.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::acceptJson()->delete('https://locadoraxapi.herokuapp.com/api/carro/'.$id.'');
        //dd($response->body());
        return redirect()->route('carros.index');
    }
}
