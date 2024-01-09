@extends('modelo')

@section('titulo', 'Locações')

@section('conteudo')

        <!-- Masthead-->
        <header class="masthead">    
                <div class="container">
                    <h2> <a style="text-decoration:none" href="{{route('locacoes.index')}}"> Locações </a> </h2>
                    <div class="row col-md-12 custyle">
                        <form action='{{ route('locacoes.store') }}' method="post" enctype="multipart/form-data">
                            @csrf  

                            <div class="container">
                                <div class="row">
                                    <div class="col-12 col-md-6">
                                        <!-- Cliente Select -->
                                        <div class="form-floating mb-3">
                                            <select name="cliente_id" class="form-select" aria-label="Default select example" >
                                                <option selected>Selecione o Cliente</option>
                                                @foreach ($clientes as $cliente)
                                                <option value="{{$cliente['id']}}">{{$cliente['nome']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6">
                                        <!-- Carro Select -->
                                        <div class="form-floating mb-3">
                                            <select name="carro_id" class="form-select" aria-label="Default select example" >
                                                <option selected>Selecione o Carro</option>
                                                @foreach ($carros as $carro)
                                                <option value="{{$carro['id']}}">{{$carro['modelo']['nome']}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                                                            
                                  <div class="col-12 col-md-4">
                                        <!-- Data Inicio input-->
                                        <div class="form-floating mb-3">
                                            <input name="data_inicio_periodo" class="form-control" id="data_inicio_periodo" type="date" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="data_inicio_periodo">Data Início</label>  
                                        </div>
                                  </div>

                                    <div class="col-12 col-md-4">
                                        <!-- Data Final Previsto input-->
                                        <div class="form-floating mb-3">
                                            <input name="data_final_previsto_periodo" class="form-control" id="data_final_previsto_periodo" type="date" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="data_final_previsto_periodo">Data Final</label>  
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <!-- Data Final Realizado input-->
                                        <div class="form-floating mb-3">
                                            <input name="data_final_realizado_periodo" class="form-control" id="data_final_realizado_periodo" type="date" placeholder="Enter your name..." data-sb-validations="required" />
                                            <label for="data_final_realizado_periodo">Data Final Realizada</label>  
                                        </div>
                                    </div>

                                  <div class="col-12 col-md-4">
                                        <!-- Diaria input-->
                                        <div class="form-floating mb-3">
                                            <input name="valor_diaria" class="form-control" id="valor_diaria" type="number"  min="1" step="any" placeholder="Enter your name..." />
                                            <label for="valor_diaria">Valor Diaria</label>  
                                        </div>
                                       
                                  </div>

                                    <div class="col-12 col-md-4">
                                        <!-- KM Inicial input-->
                                        <div class="form-floating mb-3">
                                            <input name="km_inicial" class="form-control" id="km_inicial" type="number"  min="1" step="any" placeholder="Enter your name..." />
                                            <label for="km_inicial">KM Inicial</label>  
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-4">
                                        <!-- KM Final input-->
                                        <div class="form-floating mb-3">
                                            <input name="km_final" class="form-control" id="km_final" type="number"  min="1" step="any" placeholder="Enter your name..." />
                                            <label for="km_final">KM Final</label>  
                                        </div>
                                    </div>

                                </div>
                              
                              
                            
                        </div>
                            <button style="margin-bottom: 5px" class="btn btn-primary btn-xl" type="submit" name="salvar">Cadastrar</button>
                        </form>
                    </div>
                </div>
        </header> 

@endsection
