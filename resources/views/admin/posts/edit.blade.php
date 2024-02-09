@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header') 
    <div class="text-left mb-3">
        <a class="btn btn-outline-primary" href="{{route('admin.posts.index')}}">Regresar</a>
    </div>
    <h1 class="text-center m-4 font-weight-bold">EDITAR POST</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            {!! Form::model($post, ['route' => ['admin.posts.update', $post], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

                {!! Form::hidden('user_id', auth()->user()->id) !!}
                
                @include('admin.posts.partials.form')

                <div class="text-center">
                    {!! Form::submit('Actualizar Post', ['class' => 'btn btn-outline-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>  
@stop
    
