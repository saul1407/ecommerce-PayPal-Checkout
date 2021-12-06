<div class="form-group">
    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'agregar el nombre de la sub-categoria']) !!}

    @error('name')
        <span class="text-danger">{{$message}}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('categoria', 'Categoria') !!}

    @isset($subcategoria)
        
    {!! Form::select('categoria', $categorias, $subcategoria->categoria_id, ['class' => 'form-control', 'placeholder' => 'Seleciona una categoria']) !!}

    @else

    {!! Form::select('categoria', $categorias, null, ['class' => 'form-control', 'placeholder' => 'Seleciona una categoria']) !!}

    @endisset
  
 
    @error('categoria')
       <span class="text-danger">{{$message}}</span>
    @enderror

</div>

<div class="form-group">
    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'agregar el slug de la sub-categoria', 'readonly']) !!}

    @error('slug')
       <span class="text-danger">{{$message}}</span>
    @enderror

</div>