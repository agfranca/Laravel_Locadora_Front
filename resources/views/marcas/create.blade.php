@extends('modelo')

@section('titulo', 'Marcas')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">    
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('marcas.index')}}"> Marcas </a> </h2>
                    <div class="row col-md-12 custyle">
                        <form action='{{ route('marcas.store') }}' method="post" enctype="multipart/form-data">
                            @csrf    
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input name="nome" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Marca</label>  
                            </div>
                            <!-- Imagem input-->
                            <div class="form-floating mb-3">
                                <input name="imagem" class="form-control" id="imagem" type="text" placeholder="Enter your name..."/>
                                <label for="imagem">Imagem</label>  
                            </div>
                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Cadastrar</button>
                        </form>
                    </div>
                </div>
        </header> 

@endsection
