@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <h1 class="text-center m-4 font-weight-bold">CREAR NUEVA CATEGORÍA</h1>
@stop

@section('content')
    <div class="text-left mb-3">
        <a class="btn btn-outline-primary" href="{{route('admin.categories.index')}}">Regresar</a>
    </div>

    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.categories.store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre') !!}
                    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre de la categoría']) !!}
                    
                    @error('name')
                        <span class="text-danger">{{$message}}</span>                   
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el slug de la categoría', 'readonly']) !!}

                    @error('slug')
                        <span class="text-danger">{{$message}}</span>                   
                    @enderror
                </div>

                <div class="text-center">
                    {!! Form::submit('Crear Categoría', ['class' => 'btn btn-outline-success']) !!}
                </div>

            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });
    </script>
@endsection
