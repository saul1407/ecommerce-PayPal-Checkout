@extends('adminlte::page')

@section('title', 'Crear Categoria')

@section('content_header')
    <h1>Crear Categoria</h1>
@stop

@section('content')
  
    <div class="card">
        <div class="card-header">
      
            <div class="d-flex justify-content-between">
               <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                   <li class="breadcrumb-item"><a href="{{ route('admin.categorias.index') }}">Listador de categoria</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Crear</li>
                   
                 </ol>
               </nav>
       
               
            </div>
       
           </div>
      <div class="card-body">
       
        {!! Form::open(['route' => 'admin.categorias.store']) !!}

            @include('admin.categorias.part.form')

        <div class="form-group text-center">
            <button class="btn btn-primary" type="submit">Crear</button>
        </div>

        {!! Form::close() !!}
      </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="{{ asset('plugin/jQuery-Plugin-stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script>
    $(document).ready( function() {
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });
        });
</script>
@stop
