<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/modelo')->collect();
        
        return view('modelos.index', compact('modelos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $marcas = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/marca')->collect();
        return view('modelos.create', compact('marcas'));
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
        if (isset($request->air_bag)){
            $air_bag = 1;
        }else{
            $air_bag = 0;
        }
        //Testar se existe pois o campo checkbox tipo switch não retorna se não estiver marcado 
        if (isset($request->abs)){
            $abs = 1;
        }else{
            $abs = 0;
        }
        
        
        $response = Http::acceptJson()
        ->post('https://locadoraxapi.herokuapp.com/api/modelo',[
            'marca_id' => $request->marca_id,
            'nome' => $request->nome,
            'imagem' => $request->imagem,
            'numero_portas' => $request->numero_portas,
            'lugares' => $request->lugares,
            'air_bag' => $air_bag,
            'abs' => $abs,
        ]);
        //testar o retorno da API
        //dd($response->body());
        return redirect()->route('modelos.index');
    }

    /**
     * 
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
        $marcas = Http::accept('application/json')->get('https://locadoraxapi.herokuapp.com/api/marca')->collect();
        $modelo = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/modelo/'.$id)->collect();
        return view('modelos.edit',compact('modelo','marcas'));
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
         //Testar se existe pois o campo checkbox tipo switch não retorna se não estiver marcado 
         if (isset($request->air_bag)){
            $air_bag = 1;
        }else{
            $air_bag = 0;
        }
        //Testar se existe pois o campo checkbox tipo switch não retorna se não estiver marcado 
        if (isset($request->abs)){
            $abs = 1;
        }else{
            $abs = 0;
        }

        $response = Http::accept('application/json')
            ->put('https://locadoraxapi.herokuapp.com/api/modelo/'.$id,[
                'marca_id' => $request->marca_id,
                'nome' => $request->nome,
                'imagem' => $request->imagem,
                'numero_portas' => $request->numero_portas,
                'lugares' => $request->lugares,
                'air_bag' => $air_bag,
                'abs' => $abs,
            ]); 

        //dd($response->body());
        return redirect()->route('modelos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::acceptJson()->delete('https://locadoraxapi.herokuapp.com/api/modelo/'.$id.'');
        //dd($response->body());
        return redirect()->route('modelos.index');
    }
}
