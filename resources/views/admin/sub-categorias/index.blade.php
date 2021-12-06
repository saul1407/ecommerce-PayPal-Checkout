@extends('adminlte::page')

@section('title', 'Categoria')

@section('content_header')
    <h1>Listado Categorias</h1>
@stop

@section('content')
    
@if (session('alert'))
  
<div class="alert alert-danger" role="alert">
  <strong>{{session('alert')}}</strong>
</div>

@endif
 <div class="card text-left">
    <div class="card-header">
      
     <div class="d-flex justify-content-between">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.sub-categorias.create') }}">Crear</a></li>
            <li class="breadcrumb-item active" aria-current="page">Listador de categoria</li>
          </ol>
        </nav>

        <a href="{{ route('admin.sub-categorias.create') }}" class="btn btn-secondary" style="max-height: 42px">Crear Sub-Categoria</a>
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

                @foreach ($subCategorias as $subCategoria)
                    
                    <tr>
                        <td class="id">{{$subCategoria->id}}</td>
                        <td class="name">{{$subCategoria->name}}</td>
                        <td>{{$subCategoria->user->name}}</td>
                        <td>{{$subCategoria->created_at->subMinutes(2)->diffForHumans()}}</td>
                        <td>{{$subCategoria->updated_at->subMinutes(2)->diffForHumans()}}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.sub-categorias.edit', $subCategoria->id) }}" class="btn btn-warning"><i class="fas fa-wrench"></i></a>

                            {!! Form::open(['route' => ['admin.sub-categorias.destroy', $subCategoria], 'method' => 'delete']) !!}

                                   <button type="submit" class="btn btn-danger ml-2" onclick="confirm('Quiere eliminar la categoría: {{$subCategoria->name}}')"><i class="fas fa-trash-alt"></i></button>

                              {!! Form::close() !!}


                           
                        </td>
                    </tr>

                @endforeach
          
            </tbody>
    </table>
   </div>
   <div class="card-footer">
     {{ $subCategorias->links() }}
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
