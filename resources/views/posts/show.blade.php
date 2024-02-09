<x-app-layout>
    <div class="container py-8 bg-gray-200">
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <div class="mt-8 rounded-lg mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
            
            {{-- dark theme:  text-gray-300 --}}
            {{-- <h1 class="text-4xl font-bold text-gray-600 text-center mb-8">
                {{$post->name}}
            </h1> --}}

            <div class="font-bold text-gray-600 text-center lg:text-4xl sm:text-3xl mb-8">
                {{$post->name}}
            </div>
    
            {{-- dark theme: text-gray-200, separacion para abajo: mb-2 --}}
            <div class="lg:text-lg text-gray-500 text-justify sm:text-2xl">
                {{-- {{$post->extract}} --}}
                {!!$post->extract!!}
            </div>
    
            <!-- Añade esta sección para mostrar el nombre del usuario -->
            <div class="lg:text-lg text-gray-500 mb-8 mt-8 text-justify sm:text-2xl flex flex-col sm:flex-row justify-between">
                {{-- Publicado por: {{ $post->user->name }} --}}
                <div class="mb-2 sm:mb-0">
                    Publicado por: <a href="{{ route('artist.posts', $post->user) }}" class="text-decoration-none">{{ $post->user->name }}</a>
                </div>
                <div>
                    {{ $post->created_at->format('d M Y  H:i') }}
                </div>
            </div>
    
            {{-- espacios entre columnas: gab-6 --}}
            {{-- pantalla pequena: grid-cols-1, pantalla grande: lg:grid-cols-3 --}}
            {{-- grid lg:grid-cols-3 sm:grid-cols-1 gap-6 --}}
            <div class="grid gap-6"> 
                {{-- Contenido principal --}}
                {{-- <div class="lg:col-span-2"> --}}
                    {{-- <figure>
                        @if ($post->image)
                            <img class="w-full h-full object-cover object-center rounded-lg" src="{{Storage::url($post->image->url)}}" alt="">
                        @else
                            <img class="w-full h-full object-cover object-center rounded-lg" src="https://cdn.pixabay.com/photo/2020/12/02/10/30/hike-5796976_1280.jpg" alt="">
                        @endif
                    </figure> --}}
                    <figure class="flex justify-center items-center">
                        @if ($post->image)
                            @if (pathinfo(Storage::url($post->image->url), PATHINFO_EXTENSION) === 'mp4')
                                <video id="myVideo" class="w-90 h-full object-cover object-center rounded-lg" controls>
                                    <source src="{{ Storage::url($post->image->url) }}" type="video/mp4">
                                    Tu navegador no soporta el elemento de video.
                                </video>
                            @else
                                {{-- No se deforme la imagen: object-cover, Centrar imagen: object-center --}}
                                <img class="w-full h-full object-cover object-center rounded-lg" src="{{ Storage::url($post->image->url) }}" alt="imagen del post">
                            @endif
                        @else
                            {{-- Si no hay media, mostrar una imagen de respaldo --}}
                            <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="imagen de respaldo">
                        @endif
                    </figure>

                    <!-- sección de megustas-->
                    {{-- <div class="flex items-center justify-end mt-4">
                        <form method="POST" action="{{ route('posts.like', $post) }}">
                            @csrf
                            <button type="submit" class="btn btn-primary {{ $post->likedBy(auth()->user()) ? 'liked' : '' }}">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                        </form>
                        <span class="ml-2">{{ $post->likes_count }} Me gusta</span>
                    </div> --}}

                    <!-- sección de megustas-->
                    {{-- justify-end -> contenedor solo megustas cambiar por justify-between--}}
                    <div class="flex items-center justify-between">
                        <!-- Sección de Compartir -->
                        <div class="flex items-center space-x-4 mb-2 sm:mb-0">
                            <span class="text-gray-600">Compartir:</span>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('posts.show', $post) }}" target="_blank" class="text-blue-600 hover:text-blue-800 transition duration-300 text-lg sm:text-2xl">
                                <i class="fab fa-facebook"></i>
                            </a>
                            <a href="https://twitter.com/intent/tweet?url={{ route('posts.show', $post) }}" target="_blank" class="text-blue-500 hover:text-blue-700 transition duration-300 text-lg sm:text-2xl">
                                <i class="fab fa-twitter"></i>
                            </a>
                            <a href="https://www.reddit.com/submit?url={{ route('posts.show', $post) }}" target="_blank" class="text-orange-500 hover:text-orange-700 transition duration-300 text-lg sm:text-2xl">
                                <i class="fab fa-reddit"></i>
                            </a>
                            <a href="https://www.tiktok.com/@yourusername/video/1234567890" target="_blank" class="text-black hover:text-gray-700 transition duration-300 text-lg sm:text-2xl">
                                <i class="fab fa-tiktok"></i>
                            </a>
                        </div>

                        <!-- Sección de Me gusta a la derecha -->
                        <div class="flex items-center">
                            @livewire('like-button', ['post' => $post])
                        </div>
                    </div>

                    <div class="lg:text-base text-gray-500 text-justify sm:text-2xl">
                        {{-- {{$post->body}} --}}
                        {!!$post->body!!}
                    </div>
            </div>

            {{-- Contenido relacionado --}}
            <aside class=" mt-4 lg:mt-0">
                <div class="lg:text-2xl sm:text-1xl mb-4">
                    <p class="text-gray-600 d-inline">Más sobre categoría: </p>
                    <strong class="fw-bold text-uppercase d-inline">{{$post->category->name}}</strong>
                </div>

                <div class="grid grid-cols-2 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-4 gap-4">
                    @foreach ($similares as $similar)
                        <div class="mb-4">
                            <a class="d-block " href="{{ route('posts.show', $similar) }}">
                                @if ($similar->image)
                                    @if (pathinfo(Storage::url($similar->image->url), PATHINFO_EXTENSION) === 'mp4')
                                        <div class="position-relative">
                                            <video class="w-full h-40 object-cover object-center rounded-lg max-h-60">
                                                <source src="{{ Storage::url($similar->image->url) }}" type="video/mp4">
                                                Tu navegador no soporta el elemento de video.
                                            </video>
                                            <span style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: rgba(255, 255, 255, 0.993); padding: 3px; border-radius: 50%; font-size: 36px; color: black; cursor: pointer; transition: background-color 0.3s ease; z-index: 1;"><i class="fas fa-circle-play" style="display: block;"></i></span>
                                        </div>
                                    @else
                                        <img class="w-full h-40 object-cover object-center rounded-lg" src="{{ Storage::url($similar->image->url) }}" alt="imagen del post similar">
                                    @endif
                                @else
                                    <img class="w-full h-40 object-cover object-center rounded-lg" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="imagen de respaldo">
                                @endif
                                {{-- <span class="ml-2 text-gray-600">{{ $similar->name }}</span> --}}
                            </a>
                        </div>
                    @endforeach
                </div>
            </aside>
            
            {{-- Contenido de comentarios --}}
            <div class="form-group mt-5">
                @livewire('comments', ['post' => $post])
            </div>

            {{-- artista del post --}}
            <div class="form-group card mt-10">
                <div class="card-header">
                    <p class="card-text">Artista</p>
                </div>
                <div class="card-body d-flex flex-wrap">
                    <a href="{{ route('artist.posts', $post->user) }}" class="btn-info btn-sm text-white"><strong>{{ $post->user->name }}</strong></a>
                </div>
            </div>
            
            {{-- Categoria del post --}}
            {{-- <div class="form-group card mt-8">
                <div class="card-header">
                    <p class="card-text">Categoría del post</p>
                </div>
                <div class="card-body d-flex flex-wrap">
                    <a href="{{route('artist_category.category')}}" class="btn btn-dark btn-sm">
                        <strong>{{$post->category->name}}</strong>
                    </a>
                </div>
            </div> --}}

            {{-- Categoria del post --}}
            <div class="form-group card mt-8">
                <div class="card-header">
                    <p class="card-text">Categoría del post</p>
                </div>
                <div class="card-body d-flex flex-wrap">
                    @if ($post->count() > 0)
                        {{-- Solo muestra la categoría si hay posts --}}
                        <a href="{{ route('posts.category', $post->category) }}" class="btn btn-warning btn-sm text-white">
                            <strong>{{ $post->category->name }}</strong>
                        </a>
                    @endif
                </div>
            </div>

            {{-- etiquetas del post --}}
            <div class="form-group card mt-8">
                <div class="card-header">
                    <p class="card-text">Etiquetas del post</p>
                </div>
                <div class="card-body d-flex flex-wrap">
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('posts.tag', $tag) }}" class="btn btn-dark btn-sm m-2" style="background-color: {{ $tag->color }};">
                            <strong>{{ $tag->name }}</strong>
                        </a>
                    @endforeach
                </div>
            </div>
            
        </div>
    </div> 
</x-app-layout>

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var video = document.getElementById('myVideo');

            // Establece el volumen inicial al 0
            video.volume = 0;

            // Habilita o deshabilita el mute cuando el usuario hace clic en el video
            video.addEventListener('click', function() {
                video.muted = !video.muted;
            });
        });
    </script>
@endpush


