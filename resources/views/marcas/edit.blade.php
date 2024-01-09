@extends('modelo')

@section('titulo', 'Marcas')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">    
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('marcas.index')}}"> Marcas </a> </h2>
                    <div class="row col-md-12 custyle">
                        <form action="{{ route('marcas.update', $marca['id'])}}" method="post" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf  
                            <!-- ID input hidden-->
                            <input name="id" value="{{$marca['id']}}" class="form-control" type="hidden" />  
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input name="nome"  value="{{$marca['nome']}}" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Marca</label>  
                            </div>
                            <!-- Imagem input-->
                            <div class="form-floating mb-3">
                                <input name="imagem" value="{{$marca['imagem']}}" class="form-control" type="text" />
                                <label for="name">Imagem</label>  
                            </div>
                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Atualizar</button>
                        </form>
                    </div>
                </div>
        </header> 

@endsection
