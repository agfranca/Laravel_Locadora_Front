@extends('modelo')
n
@section('titulo', 'Carros')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('carros.index')}}"> Clientes </a> </h2>
                    <div class="row col-md-12 custyle">
                    
                        <form action='{{ route('carros.store') }}' method="post">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-md-12">
                                    <!-- Modelo Select -->
                                    <div class="form-floating mb-3">
                                        <select name="modelo_id" class="form-select" aria-label="Default select example" >
                                            <option selected>Selecione a Modelo</option>
                                            @foreach ($modelos as $modelo)
                                            <option value="{{$modelo['id']}}">{{$modelo['nome']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>    
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-4">           
                                    <!-- Placa input-->
                                    <div class="form-floating mb-3">
                                        <input name="placa" class="form-control" id="placa" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="placa">Placa</label>  
                                    </div>
                                </div>

                                 <!-- KM input-->
                                 <div class="col-12 col-md-4">
                                    <div class="form-floating mb-3">
                                        <input name="km" class="form-control" id="km" type="text" placeholder="Enter your name..." data-sb-validations="required" />
                                        <label for="km">KM</label>  
                                    </div>
                                </div>
                                
                                <!-- Disponivel input-->
                                <div class="col-6 col-md-4">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" name="disponivel" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Disponível</label>
                                    </div>
                                </div>
                                
                            </div>


                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Cadastrar</button>
                        </form>
                    </div>
                </div>
        </header>   
              
@endsection
