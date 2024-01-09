@extends('modelo')

@section('titulo', 'Modelos')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">    
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('modelos.index')}}"> Modelos </a> </h2>
                    <div class="row col-md-12 custyle">
                        <form action="{{ route('modelos.update', $modelo['id'])}}" method="post">
                            @method('PUT') 
                            @csrf 
                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-4">
                                        <!-- Marca Select -->
                                        <div class="form-floating mb-3">
                                            <select name="marca_id" class="form-select" aria-label="Default select example" >
                                                <option >Selecione a Marca</option>
                                                @foreach ($marcas as $marca)
                                                <option value="{{$marca['id']}}" @if($modelo['marca_id']==$marca['id']) selected @endif>{{$marca['nome']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                  <div class="col-12 col-md-4">
                                        <!-- Name input-->
                                        <div class="form-floating mb-3">
                                            <input name="nome" value="{{$modelo['nome']}}" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="name">Modelo</label>  
                                        </div>
                                  </div>
                                  <div class="col-12 col-md-4">
                                        <!-- Imagem input-->
                                        <div class="form-floating mb-3">
                                            <input name="imagem" value="{{$modelo['imagem']}}" class="form-control" id="imagem" type="text" placeholder="Enter your name..." />
                                            <label for="imagem">Imagem</label>  
                                        </div>
                                  </div>
                                </div>
                              
                              
                            <div class="row">
                                <div class="col-12 col-md-3">
                                  <!-- Portas input-->
                                    <div class="form-floating mb-3">
                                        <input type="number" value="{{$modelo['numero_portas']}}" class="form-control" id="numero_portas" name="numero_portas" min="1" max="5" placeholder="Enter your name...">
                                        <label for="numero_portas">Portas</label>  
                                    </div>
                                </div>
                                <div class="col-12 col-md-3">
                                  <!-- Lugares input-->
                                    <div class="form-floating mb-3">
                                        <input type="number" class="form-control"value="{{$modelo['lugares']}}"  id="lugares" name="lugares" min="1" max="10" placeholder="Enter your name...">
                                        <label for="lugares">Lugares</label>  
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                  <!-- Air Bag input-->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="air_bag" type="checkbox" role="switch" id="flexSwitchCheckDefault" @if($modelo['air_bag']==1)checked @endif >
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Air Bag</label>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3">
                                  <!-- ABS input-->
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="abs" type="checkbox" role="switch" id="flexSwitchCheckDefault2" @if($modelo['abs']==1)checked @endif>
                                        <label class="form-check-label" for="flexSwitchCheckDefault2">ABS</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Atualizar</button>
                        </form>
                    </div>
                </div>
        </header> 

@endsection
