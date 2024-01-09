@extends('modelo')

@section('titulo', 'Carros')

@section('conteudo')
<style>
.masthead {
    padding-top: 10rem;
    padding-bottom: 2rem;
}
</style>

        <!-- Masthead-->
        <header class="masthead">
            <div  class="container">
                <div  class="d-flex justify-content-between">
                    <h2> <a style="text-decoration:none" href="{{route('carros.index')}}"> Carros </a> </h2>
                    <a style="margin-bottom: 25px" href="{{route('carros.create')}}" class="btn btn-primary btn-sm"><b>+</b></a>
                </div>
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
                            <th>Km</th>
                            <th>Disponível</th>
                            <th width="15%" class="text-center">Ação</th>
                        </tr>
                    </thead>
                            @foreach ($carros as $carro)
                            <tr>
                                <td>{{$carro['modelo']['nome']}}</td>
                                <td>{{$carro['placa']}}</td>
                                <td>{{$carro['km']}}</td>
                                <td>@if($carro['disponivel'] == 1) Sim @else Não @endif </td>

                                <td class="d-flex justify-content-center"><a style="margin-right: 2px" class="btn btn-info btn-xs" href="{{route('carros.edit',$carro['id'])}}"><span class="glyphicon glyphicon-edit"></span> Editar</a>    
                                    <form style="display: inline" action="{{route('carros.destroy',$carro['id'])}}" method="post" >
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-xs">
                                            <span class="glyphicon glyphicon-remove">Excluir</span> 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                    </table>
                </div>
          
            <script>
                $(document).ready( function () {
                    $('#myTable').DataTable( {
                        language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.12.1/i18n/pt-PT.json'
                        }
                    } );
                } );
            </script>
            
        </header>         
@endsection
