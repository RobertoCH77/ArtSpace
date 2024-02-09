@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <h1 class="text-center m-4 font-weight-bold">POST DE USUARIOS</h1>  
@stop

@section('content')
    @livewire('admin.verify-post')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
