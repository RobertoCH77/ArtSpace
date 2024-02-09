@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <div class="text-left mb-3">
        <a class="btn btn-outline-primary" href="{{route('admin.posts.index')}}">Regresar</a>
    </div>
    <h1 class="text-center m-4 font-weight-bold">CREAR NUEVO POST</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'admin.posts.store', 'autocomplete' => 'off', 'files' => true]) !!}

                {{-- {!! Form::hidden('user_id', auth()->user()->id) !!} --}}
            
                @include('admin.posts.partials.form')

                <div class="text-center">
                    {!! Form::submit('Crear Post', ['class' => 'btn btn-outline-success']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>  
@stop

@section('css')
    <style>
        .image-wrapper{
            position: relative;
            padding-bottom: 56.25%;
        }

        .image-wrapper img{
            position: absolute;
            object-fit: cover;
            width: 100%;
            height: 100%;
        }

    </style>
@stop

@section('js')
    <script src="{{asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script>
        $(document).ready( function() {
            $("#name").stringToSlug({
                setEvents: 'keyup keydown blur',
                getPut: '#slug',
                space: '-'
            });
        });

        // CKEditor
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );

        ClassicEditor
        .create( document.querySelector( '#body' ) )
        .catch( error => {
            console.error( error );
        } );

        //Cambiar imagen
        document.getElementById("file").addEventListener('change', cambiarImagen);

        function cambiarImagen(event){
            var file = event.target.files[0];

            var reader = new FileReader();
            reader.onload = (event) => {
                document.getElementById("picture").setAttribute('src', event.target.result);
            };
            reader.readAsDataURL(file);
        }      
    </script>
@endsection