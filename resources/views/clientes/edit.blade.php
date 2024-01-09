@extends('modelo')

@section('titulo', 'Clientes')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('clientes.index')}}"> Clientes </a> </h2>
                    <div class="row col-md-12 custyl">
                        <form action="{{ route('clientes.update', $cliente['id']) }}" method="post">
                            @method('PUT')
                            @csrf
                            <!-- ID input hidden-->
                            <input name="id" value="{{$cliente['id']}}" class="form-control" type="hidden" />
                            <!-- Name input-->
                            <div class="form-floating mb-3">
                                <input name="nome" value="{{$cliente['nome']}}" class="form-control" id="name" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                <label for="name">Cliente</label>  
                            </div>
                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Atualizar</button>
                        </form>
                    </div>
                </div>
        </header>         

@endsection
