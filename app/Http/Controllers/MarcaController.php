<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Expr\Cast\Array_;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/marca')->collect();

        return view('marcas.index', compact('marcas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('marcas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //dd($request->imagem);
        //$media = $request->imagem;
        //$file     = $request->file('imagem');
        //$fileName = $file->getClientOriginalName();
        //$realPath = $file->getRealPath();
        //$imagem = Fopen($realPath, 'r');
        //dd($request->file('imagem'));
        //-> attach('attachment', file_get_contents($image))
        $response = Http::acceptJson()
        //-> attach('attachment', file_get_contents($file))
        ->post('https://locadoraxapi.herokuapp.com/api/marca',[
            'nome' => $request->nome,
            'imagem' => $request->imagem,
         //   'imagem'=> $imagem,
        ]);
        //dd($response->body());
        return redirect()->route('marcas.index');
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
        //dd('ssdsds');
        $marca = Http::accept('application/json')
        ->get('https://locadoraxapi.herokuapp.com/api/marca/'.$id)->collect();
        return view('marcas.edit',compact('marca'));
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
/*         
        if ($request->file('imagem') <> Null) {
            
            $imagem     = $request->file('imagem');
            $fileName   = $imagem->getClientOriginalName();
            $realPath   = $imagem->getRealPath();
            $fopen      = Fopen($realPath, 'r');
            $base64     = base64_encode($imagem);

            $response = Http::accept('application/json')
            
           // -> attach('attachment', file_get_contents($imagem))
            //->withBody(base64_encode($imagemm), 'image/jpeg')
            ->put('https://locadoraxapi.herokuapp.com/api/marca/'.$id,[
                'nome' => $request->nome,
                'imagem' => $base64,
            ]); 
            //dd($response);
        }else{
            Http::accept('application/json')
            ->put('https://locadoraxapi.herokuapp.com/api/marca/'.$id,[
            'nome' => $request->nome,
            ]); 
        }
 */
        Http::accept('application/json')
            ->put('https://locadoraxapi.herokuapp.com/api/marca/'.$id,[
            'nome' => $request->nome,
            'imagem' => $request->imagem,
            ]); 

        
        return redirect()->route('marcas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $response = Http::acceptJson()->delete('https://locadoraxapi.herokuapp.com/api/marca/'.$id.'');
        //dd($response->body());
        return redirect()->route('marcas.index');
    }
}
