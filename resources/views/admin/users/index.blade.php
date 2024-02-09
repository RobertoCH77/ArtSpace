@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <h1 class="text-center m-4 font-weight-bold">USUARIOS</h1>
    
@stop

@section('content')
    @livewire('admin.users-index')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
