@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <div class="text-center mt-4 mb-4">
        <img style="height: 50px; width: auto;" src="{{ asset('imagenes/artspace-logo-obscuro.svg') }}" alt="artSpace">
    </div>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-body">
                <div style="font-size: 22px; text-align: center; margin-bottom:1rem;">Bienvenido al panel de administración</div>
                <div class="lg:text-lg text-gray-600 text-justify sm:text-2xl">Antes de empezar lee nuestros <a href="{{ route('terminos.condiciones') }}">términos y condiciones</a>.
                    Esto te ayudará a comprender nuestras políticas y garantizará una experiencia positiva en la plataforma. 
                    Si tienes alguna pregunta o sugerencia, no dudes en ponerte en contacto con nuestro equipo de soporte.
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center mt-4">
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">
                ¡Comienza a crear tus posts!
            </a>
        </div>
        
        <div class="d-flex justify-content-center align-items-center mt-4">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}">
                <i class="fa-solid fa-house"></i> Regresar a la página principal 
            </a>
        </div> 
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .box {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .box-body {
            padding: 20px;
        }
    </style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
    <script src="https://kit.fontawesome.com/4b8e039d18.js" crossorigin="anonymous"></script>
@stop