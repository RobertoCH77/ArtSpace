{{-- nombre del posts --}}
<p class="text-info">Si vas a publicar un post, todos los campos son obligatorios.</p>

<div class="form-group card">
    <div class="card-body">    
        {!! Form::label('name', 'TÍTULO DEL POST') !!}
        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el título del post']) !!} 
    @error('name')
        <small class="text-danger">{{$message}}</small>                   
    @enderror
    <small class="form-text text-success">Máximo 20 caracteres.</small>
    </div>
</div>
<div class="form-group card">
    <div class="card-body">
        {!! Form::label('slug', 'SLUG') !!}
        {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder' => 'Slug del post', 'readonly']) !!}
    @error('slug')
        <small class="text-danger">{{$message}}</small>                   
    @enderror
    </div>
</div>

{{-- selecion de categorías --}}
<div class="form-group card">
    <div class="card-body">
        {!! Form::label('category_id', 'CATEGORÍA DEL POST') !!}
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}
    @error('category_id')
        <small class="text-danger">{{$message}}</small>                   
    @enderror
    </div>
</div>

{{-- listado de etiquetas --}}
<div class="form-group card">
    <div class="card-header">
        <strong>ETIQUETAS DEL POST</strong>
    </div>
    <div class="card-body">
        @foreach ($tags as $tag)
            <div class="form-check form-check-inline m-2">
                <label class="form-check-label">
                    {!! Form::checkbox('tags[]', $tag->id, null, ['class' => 'form-check-input']) !!}
                    {{$tag->name}}
                </label>
            </div>
        @endforeach

        @error('tags')
            <br>
            <small class="text-danger">{{$message}}</small>                   
        @enderror
        <small class="form-text text-success">Elige al menos 5 etiquetas.</small>
    </div>
</div>

{{-- seleccionar si es un borrador o publicacion del posts --}}
<div class="form-group card">  
    <div class="card-header">
        <strong>ESTADO DEL POST</strong>
    </div>
    <div class="card-body">
        <div class="form-check form-check-inline m-2">
            {{-- si le usuario selecciona estado = borrador, se le permite las etiquetas, campo extracto y cuerpo puedan estar vacios, solo el campo del nombre es obligatorio  --}}
            <label class="form-check-label mr-4">
                {!! Form::radio('status', 1, true) !!}
                Guardar borrador
            </label>

            {{-- si le usuario selecciona estado = publicado, todos los campos son obligatorios --}}
            <label class="form-check-label">
                {!! Form::radio('status', 2) !!}
                Publicar post
            </label>
        </div>
        @error('status')
            <br>
            <small class="text-danger">{{$message}}</small>                   
        @enderror
    </div>
</div>

{{-- subir imagenes --}}
<div class="form-group card mb-3">
    <div class="row g-0 m-3">
        <div class="col-md-4">
            <div class="image-wrapper">
                {{-- @isset ($post->image)
                    <img id="picture" class="img-fluid rounded-start" src="{{Storage::url($post->image->url)}}">
                @else
                    <img id="picture" class="img-fluid rounded-start" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png">
                @endisset  --}}
                
                @isset ($post->image)
                    @if (pathinfo(Storage::url($post->image->url), PATHINFO_EXTENSION) === 'mp4')
                        <video id="videoPreview" class="img-fluid rounded-start rounded-lg" controls>
                            <source src="{{ Storage::url($post->image->url) }}" type="video/mp4">
                            Tu navegador no soporta el elemento de video.
                        </video>
                    @else
                        <img id="picture" class="img-fluid rounded-start rounded-lg" src="{{ Storage::url($post->image->url) }}" alt="">
                    @endif
                @else
                    <img id="picture" class="img-fluid rounded-start" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="">
                @endisset
                <img id="videoThumbnail" class="img-fluid rounded-start rounded-lg" src="https://cdn.pixabay.com/photo/2017/05/09/10/03/play-2297762_1280.png" style="display: none;">
            </div>    
            @error('file')
                <small class="text-danger">{{$message}}</small>                   
            @enderror
        </div>
        <div class="col-md-8">
            <div class="card-body">
                {{-- <div class="form-group">
                    {!! Form::label('file', 'SUBIR IMAGEN O VIDEO DEL POST') !!}
                    {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*,video/*', 'onchange' => 'updatePreview()']) !!}
                </div> --}}
                <div class="form-group">
                    {!! Form::label('file', 'SUBIR IMAGEN, VIDEO O GIF DEL POST') !!}
                    <div class="input-group">
                        <div class="custom-file">
                            {!! Form::file('file', ['class' => 'custom-file-input', 'accept' => 'image/*,video/*', 'onchange' => 'updatePreview()']) !!}
                            <label class="custom-file-label" for="file" data-browse="Navegar">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>
                
                <p class="card-text fs-1 text-justify">Puedes cargar imágenes en formato 
                    <strong>GIF</strong>, 
                    <strong>JPG</strong> y
                    <strong>PNG</strong>, o videos en formato 
                    <strong>MP4</strong> y
                    <strong>AVI</strong>.
                </p>
                <p class="card-text fs-2 text-success text-justify">
                    ⚠️Se aceptan imágenes menor a 
                    <strong>5MB</strong> (5120 kilobytes) y videos menor a 
                    <strong>10BM</strong> (10240 kilobytes).
                </p>
                <p class="card-text fs-2 text-success text-justify">
                    ⚠️No subas multimedia real.
                </p>
                <p class="card-text fs-2 text-success text-justify">
                    ⚠️No subas contenido pornográfico real o serás baneado.
                </p>
            </div>
        </div>
    </div>
</div>

{{-- EXTRACTO DEL POST --}}
<div class="form-group card">
    <div class="card-body">
        {!! Form::label('extract', 'AÑADE UN BREVE RESUME DEL POST') !!}
        {!! Form::textarea('extract', null, ['class' => 'form-control']) !!}
    @error('extract')
        <small class="text-danger">{{$message}}</small>                   
    @enderror
    </div>
</div>

{{-- CUERPO DEL POST --}}
<div class="form-group card">
    <div class="card-body">
        {!! Form::label('body', 'AÑADE UNA DESCRIPCIÓN DEL POST') !!}
        {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
    @error('body')
        <small class="text-danger">{{$message}}</small>                   
    @enderror
    </div>
</div>

{{-- ACEPTAR TERMINOS Y CONDICONES --}}
<div class="form-group card">
    <div class="row g-0 m-3">
        <div class="col-md-4">
            <div class="form-check">
                {!! Form::checkbox('accept_terms', 1, null, ['class' => 'form-check-input']) !!}
                {!! Form::label('accept_terms', 'Acepto los términos y condiciones', ['class' => 'form-check-label']) !!}
            </div>
            <div class="col-md-8">
                <p><a href="{{ route('terminos.condiciones') }}" target="_blank">Ver términos y condiciones</a></p>
            </div>
            @error('accept_terms')
                <small class="text-danger">{{$message}}</small>                   
            @enderror 
        </div>
    </div>
</div>

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
    <script src="{{ asset('vendor/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>

    <script>
        // SLUG
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

        // anadir imagen previa cuando se cargue un video
        function updatePreview() {
            var fileInput = document.querySelector('input[name="file"]');
            var picture = document.getElementById('picture');
            var videoPreview = document.getElementById('videoPreview');
            var videoThumbnail = document.getElementById('videoThumbnail');

            if (fileInput && fileInput.files && fileInput.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    console.log(videoPreview);  // Agrega este log para verificar si videoPreview existe
                    console.log(videoThumbnail);  // Agrega este log para verificar si videoThumbnail existe

                    if (fileInput.accept.includes('video') && (e.target.result.startsWith('data:video') || e.target.result.includes('data:video'))) {
                        // Es un video, muestra la imagen de previsualización y oculta la imagen principal
                        if (videoPreview) {
                            videoPreview.style.display = 'none';
                        }
                        if (videoThumbnail) {
                            videoThumbnail.style.display = 'block';
                        }
                    } else {
                        // No es un video, muestra la imagen principal y oculta la imagen de previsualización
                        if (picture) {
                            picture.style.display = 'block';
                        }
                        if (videoPreview) {
                            videoPreview.style.display = 'none';
                        }
                        if (videoThumbnail) {
                            videoThumbnail.style.display = 'none';
                        }
                        if (picture) {
                            picture.src = e.target.result;
                        }
                    }
                };
                reader.readAsDataURL(fileInput.files[0]);
            }
        }
    </script>
@endsection
