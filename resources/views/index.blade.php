@extends('modelo')

@section('titulo', 'Home')

@section('conteudo')
<style>
.card{
    margin: 5px;
}
</style>   

                           




        <!-- Masthead-->
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">

                <H3>Olá @php if(isset($_SESSION['token'])){echo $_SESSION['nome'];} @endphp! </H3>
                <h5>Seguem os números para orienteção do seu dia. </h5>
                <br>
                <!-- Dashboard Big Numbers-->    
            <div class="container" style="color: black">
                <div class="row justify-content-between">
                    <div class="card border-light col-sm-2" style="max-width: 18rem;">
                        <div class="card-header">CLIENTES</div>
                        <div class="card-body">
                          <h1 class="card-title">{{$clientes}}</h1>
                          <p class="card-text">Clientes cadastrados.</p>
                        </div>
                    </div>
                    
                    <div class="card border-light col-sm-2" style="max-width: 18rem;">
                        <div class="card-header">MARCAS</div>
                        <div class="card-body">
                          <h1 class="card-title">{{$marcas}}</h1>
                          <p class="card-text">Marcas cadastradas.</p>
                        </div>
                    </div>
        
                    <div class="card border-light col-sm-2" style="max-width: 18rem;">
                        <div class="card-header">MODELOS</div>
                        <div class="card-body">
                          <h1 class="card-title">{{$modelos}}</h1>
                          <p class="card-text">Modelos cadastrados.</p>
                        </div>
                    </div>
        
                    <div class="card border-light col-sm-2" style="max-width: 18rem;">
                        <div class="card-header">CARROS</div>
                        <div class="card-body">
                          <h1 class="card-title">{{$carros}}</h1>
                          <p class="card-text">Carros cadastrados.</p>
                        </div>
                    </div>
        
                    <div class="card border-light col-sm-2" style="max-width: 18rem;">
                        <div class="card-header">LOCAÇÕES</div>
                        <div class="card-body">
                          <h1 class="card-title">{{$locacoes}}</h1>
                          <p class="card-text">Locações cadastrados.</p>
                        </div>
                    </div>
                </div>   
            </div>

                <!-- Dashboard Tabelas Basicas-->    
            <div class="container" style="color: black">
                <div class="row justify-content-between">
                    <div class="card border-light col-sm-6">
                        <div class="card-header">PRÓXIMAS ENTREGAS</div>
                        <div class="card-body">
                          <h1 class="card-title">{{$clientes}}</h1>
                          <p class="card-text">Clientes cadastrados.</p>
                        </div>
                    </div>
                    
                    <div class="card border-light col-sm-5">
                        <div class="card-header">CARROS DISPONÍVEIS</div>
                        <div class="card-body">
                          
                            <div class="row col-md-12 custyle">
                                {{-- JQuery DataTable --}}
                                <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                                <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
                                <link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" rel="stylesheet" />
                                <table id="myTable" class="table display compact table-striped custab">
                                <thead>     
                                    <tr>
                                        <th>Modelo</th>
                                        <th>Placa</th>
                                        <th width="15%" class="text-center">Ação</th>
                                    </tr>
                                </thead>
                                        @foreach ($carrosdisponiveis as $carro)
                                        <tr>
                                            <td>{{$carro['modelo']['nome']}}</td>
                                            <td>{{$carro['placa']}}</td>
                                            
                                            <td class="d-flex justify-content-center">
                                                <a style="margin-right: 2px" class="btn btn-info btn-xs" href="#"><span class="glyphicon glyphicon-edit"></span>Locar</a>    
                                            </td>
                                        </tr>
                                        @endforeach
                                </table>
                            </div>



                        </div>
                    </div>
        
                    
                </div>   
            </div>



               
                
            </div>



        </header>         
@endsection