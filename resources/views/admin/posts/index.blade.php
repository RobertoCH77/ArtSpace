@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')

    {{-- <h1 class="text-center m-4 font-weight-bold">POSTS</h1> 
    <a class="btn btn-outline-primary float-right" href="{{route('admin.posts.create')}}">Nuevo Post</a> --}}

    <div class="container mt-4">
        <h1 class="text-center m-4 font-weight-bold">POSTS</h1>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <a class="btn btn-outline-primary" href="{{ route('admin.posts.create') }}">Nuevo Post</a>
            </div>
        </div>
    </div>
    
@stop

@section('content')

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    @livewire('admin.posts-index')
    
@stop