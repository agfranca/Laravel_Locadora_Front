@extends('modelo')

@section('titulo', 'Clientes')

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
                    <h2> <a style="text-decoration:none" href="{{route('clientes.index')}}"> Clientes </a> </h2>
                    <a style="margin-bottom: 25px" href="{{route('clientes.create')}}" class="btn btn-primary btn-sm"><b>+</b></a>
                </div>
                <div class="row col-md-12 custyle">
                    {{-- JQuery DataTable --}}
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
                    <link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" rel="stylesheet" />
                    
                    <table id="myTable" class="table display compact table-striped custab">
                    <thead>     
                        <tr>
                            <th width="5%">Id</th>
                            <th>Nome</th>
                            <th width="15%" class="text-center">Ação</th>
                        </tr>
                    </thead>
                            @foreach ($clientes as $cliente)
                            <tr>
                                <td>{{$cliente['id']}}</td>
                                <td>{{$cliente['nome']}}</td>
                                
                                <td class="d-flex justify-content-center"><a style="margin-right: 2px" class="btn btn-info btn-xs" href="{{route('clientes.edit',$cliente['id'])}}"><span class="glyphicon glyphicon-edit"></span> Editar</a>    
                                    <form style="display: inline" action="{{route('clientes.destroy',$cliente['id'])}}" method="post" >
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
