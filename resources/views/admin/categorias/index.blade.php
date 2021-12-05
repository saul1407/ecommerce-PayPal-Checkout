@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Listado Categorias</h1>
@stop

@section('content')
    
@if (session('info'))
  
<div class="alert alert-danger" role="alert">
  <strong>{{session('info')}}</strong>
</div>

@endif
 <div class="card text-left">
    <div class="card-header">
      
     <div class="d-flex justify-content-between">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.categorias.create') }}">Crear</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listador de categoria</li>
          </ol>
        </nav>

        <a href="{{ route('admin.categorias.create') }}" class="btn btn-secondary" style="max-height: 42px">Crear Categoria</a>
     </div>

    </div>
   <div class="card-body">
    <table class="table table-striped">
        <thead class="thead-inverse">
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Creada Por</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acción</th>
            </tr>
            </thead>
            <tbody>

                @foreach ($categorias as $categoria)
                    
                    <tr>
                        <td class="id">{{$categoria->id}}</td>
                        <td class="name">{{$categoria->name}}</td>
                        <td>{{$categoria->user->name}}</td>
                        <td>{{$categoria->created_at->subMinutes(2)->diffForHumans()}}</td>
                        <td>{{$categoria->updated_at->subMinutes(2)->diffForHumans()}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.categorias.edit', $categoria) }}" class="btn btn-warning"><i class="fas fa-wrench"></i></a>

                            {!! Form::open(['route' => ['admin.categorias.destroy', $categoria], 'method' => 'delete']) !!}

                                   <button type="submit" class="btn btn-danger ml-2" onclick="confirm('Quiere eliminar la categoría: {{$categoria->name}}')"><i class="fas fa-trash-alt"></i></button>

                              {!! Form::close() !!}


                           
                        </td>
                    </tr>

                @endforeach
          
            </tbody>
    </table>
   </div>
   <div class="card-footer">
     {{ $categorias->links() }}
   </div>
 </div>

 
  
@stop

@section('css')
    
@stop

@section('js')

    <script>

 


     $(document).ready(function () {
        
     
    
       $('btn-eliminar').click(function (e) { 
           e.preventDefault();
           
           $('#myModal').modal('toggle');
       });

     
           
          
           
     });
    
     </script>
@stop
