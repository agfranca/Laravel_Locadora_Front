@extends('modelo')

@section('titulo', 'Locações')

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
                    <h2> <a style="text-decoration:none" href="{{route('locacoes.index')}}"> Locações </a> </h2>
                    <a style="margin-bottom: 25px" href="{{route('locacoes.create')}}" class="btn btn-primary btn-sm"><b>+</b></a>
                </div>
                <div class="row col-md-12 custyle">
                    {{-- JQuery DataTable --}}
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
                    <link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" rel="stylesheet" />
                    <table id="myTable" class="table display compact table-striped custab">
                    <thead>     
                        <tr>
                            <th>Cliente</th>
                            <th>Carro</th>
                            <th>Data Início</th>
                            <th>Data Término Previsto</th>
                            <th>Data Término Realizado</th>
                            <th>Diaria</th>
                            <th>KM Inicial</th>
                            <th>KM Final</th>
                            <th width="15%" class="text-center">Ação</th>
                        </tr>
                    </thead>
                            @foreach ($locacoes as $locacao)
                            <tr>
                                <td>{{$locacao['cliente']['nome']}}</td>
                                <td>{{$locacao['carro']['modelo']['nome']}}</td>
                                <td>{{Carbon\Carbon::parse($locacao['data_inicio_periodo'])->format('d/m/Y')}}</td>
                                <td>{{Carbon\Carbon::parse($locacao['data_final_previsto_periodo'])->format('d/m/Y')}}</td>
                                <td>{{Carbon\Carbon::parse($locacao['data_final_realizado_periodo'])->format('d/m/Y')}}</td>
                                <td>{{$locacao['valor_diaria']}}</td>
                                <td>{{$locacao['km_inicial']}}</td>
                                <td>{{$locacao['km_final']}}</td>
                                <td class="d-flex justify-content-center"><a style="margin-right: 2px" class="btn btn-info btn-xs" href="{{route('locacoes.edit',$locacao['id'])}}"><span class="glyphicon glyphicon-edit"></span> Editar</a>    
                                    <form style="display: inline" action="{{route('locacoes.destroy',$locacao['id'])}}" method="post" >
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
