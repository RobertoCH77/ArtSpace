@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <div class="text-left mb-3">
        <a class="btn btn-outline-primary" href="{{route('admin.users.index')}}">Regresar</a>
    </div>
    <h1 class="text-center m-4 font-weight-bold">ASIGNACIÓN DE ROLES</h1>
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    
    <div class="card">
        <div class="card-body">
            <p class="h5">Nombre</p>
            <p class="form-control">{{$user->name}}</p>

            <h2 class="h5">Listado de roles</h2>

            {!! Form::model($user, ['route' => ['admin.users.update', $user], 'method' => 'put']) !!}
                @foreach ($roles as $role)
                    <div>
                        <label for="">
                            {!! Form::checkbox('roles[]', $role->id, null, ['class' => 'mr-1']) !!}
                            {{$role->name}}
                        </label>
                    </div>    
                @endforeach

                {!! Form::submit('Asignar Rol', ['class' => 'btn btn-outline-primary mt-2']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
