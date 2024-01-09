@extends('modelo')

@section('titulo', 'Clientes')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('clientes.index')}}"> Clientes </a> </h2>
                    <div class="row col-md-12 custyle">
                    
                        <form action='{{ route('clientes.store') }}' method="post">
                            @csrf
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input name="nome" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Cliente</label>  
                            </div>
                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Cadastrar</button>
                        </form>
                    </div>
                </div>
        </header>   
              
@endsection
