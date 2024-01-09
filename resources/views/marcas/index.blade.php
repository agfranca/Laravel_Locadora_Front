@extends('modelo')

@section('titulo', 'Marcas')

@section('conteudo')
<style>
    .masthead {
        padding-top: 10rem;
        padding-bottom: 2rem;
    }
</style>

        <!-- Masthead-->
        <header class="masthead">
                <div class="container">
                    <div  class="d-flex justify-content-between">
                        <h2> <a style="text-decoration:none" href="{{route('marcas.index')}}"> Marcas </a> </h2>
                        <a style="margin-bottom: 25px" href="{{route('marcas.create')}}" class="btn btn-primary btn-sm"><b>+</b></a>
                    </div>
                    <div class="row col-md-12 custyle">
                    {{-- JQuery DataTable --}}
                    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
                    <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
                    <link href="https://cdn.datatables.net/1.12.0/css/jquery.dataTables.min.css" rel="stylesheet" />
                    <table id="myTable" class="table display compact table-striped custab">
                    <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th>Nome</th>
                            <th>imagem</th>
                            <th width="15%" class="text-center">Ação</th>
                        </tr>
                    </thead>
                            @foreach ($marcas as $marca)
                            <tr>
                                <td>{{$marca['id']}}</td>
                                <td>{{$marca['nome']}}</td>
                                <td>{{$marca['imagem']}}</td>
                                <td class="text-center"><a class='btn btn-info btn-xs' href="{{route('marcas.edit',$marca['id'])}}"><span class="glyphicon glyphicon-edit"></span> Editar</a> 
                                    <form style="display: inline" action="{{route('marcas.destroy',$marca['id'])}}" method="post" >
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
                     <div style="margin-bottom: 5px">
                        {{-- 
                        {{$marcas->appends($request->input())->links() }}
                         --}} 
                         {{-- {{ $marcas->links() }} --}}   
                    </div>
                </div>
                
            
           
            <script>
            $(document).ready( function () {
            $('#myTable').DataTable();
            } );
            </script>
            






        </header>         
@endsection
