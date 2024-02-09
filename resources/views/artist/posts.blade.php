{{-- <x-app-layout>
    <div class="bg-gray-200 mt-8 rounded-lg mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 py-8">
        <h1 class="text-4xl font-bold text-gray-600 text-center mb-8 mt-5">
            Posts de {{ $user->name }}
        </h1>

            <div class="grid lg:grid-cols-3 sm:grid-cols-1 gap-6">
                @foreach ($posts as $post)
                    <div class="mb-4">
                        <a href="{{ route('posts.show', $post) }}">
                            @if ($post->image)
                                <!-- Mostrar imagen o video del post -->
                            @else
                                <!-- Si no hay media, mostrar una imagen de respaldo -->
                                <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="">
                            @endif
                            <span class="ml-2 text-gray-600">{{ $post->name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
    </div>
</x-app-layout> --}}

<!-- user.posts.blade.php -->

<x-app-layout>
    <div class="container py-8 bg-gray-200">
        {{-- <h1 class="text-4xl font-bold text-gray-600 text-center mb-8 mt-5">
            Posts de {{ $user->name }}
        </h1> --}}
        <a class="btn btn-secondary mb-8" href="{{ route('posts.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <div class="text-center lg:text-4xl m-8">
            <p class="text-gray-600 d-inline sm:text-3xl">Posts de </p>
            <strong class="fw-bold text-uppercase d-inline sm:text-3xl">{{$user->name}}</strong>
        </div>
        

        <div class="py-8 rounded-lg mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 
                    grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-1 gap-6" >
            @foreach ($posts as $post)
                {{-- Verifica si el post está publicado --}}
                @if ($post->status == 2)
                    <a href="{{ route('posts.show', $post) }}" class="w-full h-80 bg-cover bg-center rounded-lg wrappers"  style="position: relative;">
                        @if ($post->image)
                            @if (pathinfo(Storage::url($post->image->url), PATHINFO_EXTENSION) === 'mp4')
                                
                                <div class="video-indicator">
                                    <i class="fa-solid fa-circle-play"></i>
                                </div>
                                <video class="w-full h-full object-cover object-center rounded-lg">
                                    <source src="{{ Storage::url($post->image->url) }}" type="video/mp4">
                                    Tu navegador no soporta el elemento de video.
                                </video>

                            @else
                                <img class="w-full h-full object-cover object-center rounded-lg" src="{{ Storage::url($post->image->url) }}" alt="imagen del post">
                            @endif
                        @else
                            <img class="w-full h-80 object-cover object-center rounded-lg" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="imagen de respaldo">
                        @endif
                        {{-- <span class="ml-2 text-gray-600">{{ $post->name }}</span> --}}
                    </a>
                @endif
            @endforeach 
        </div>
        {{-- Crear la paginación --}}
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mt-4">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>



