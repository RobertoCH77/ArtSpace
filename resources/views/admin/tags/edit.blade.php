@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <div class="text-left mb-3">
        <a class="btn btn-outline-primary" href="{{route('admin.tags.index')}}">Regresar</a>
    </div>
    <h1 class="text-center m-4 font-weight-bold">EDITAR ETIQUETA</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!! Form::model($tag, ['route' => ['admin.tags.update', $tag], 'method' => 'put']) !!}

                @include('admin.tags.partials.form')

                <div class="text-center">
                    {!! Form::submit('Actualizar etiqueta', ['class' => 'btn btn-outline-success']) !!}
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