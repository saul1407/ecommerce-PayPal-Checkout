@extends('adminlte::page')

@section('title', 'Editar Categoria')

@section('content_header')
    <h1>Editar Categoria</h1>
@stop

@section('content')

@if (session('alert'))
  
<div class="alert alert-success" role="alert">
  <strong>{{session('alert')}}</strong>
</div>

@endif

  
    <div class="card">
        <div class="card-header">
      
            <div class="d-flex justify-content-between">
               <nav aria-label="breadcrumb">
                 <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.categorias.index') }}">Listador de categoria</a></li>
                   <li class="breadcrumb-item"><a href="{{ route('admin.categorias.create') }}">Crear</a></li>
                   <li class="breadcrumb-item active" aria-current="page">Editar</li>
                 </ol>
               </nav>
       
               <a href="{{ route('admin.categorias.create') }}" class="btn btn-secondary" style="max-height: 42px">Crear Categoria</a>
            </div>
       
        </div>
      <div class="card-body">
       
        {!! Form::model($subcategoria, ['route' => ['admin.sub-categorias.update', $subcategoria], 'method' => 'put']) !!}

            @include('admin.sub-categorias.part.form')

        <div class="form-group text-center">
            <button class="btn btn-primary" type="submit">Actulizar</button>
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