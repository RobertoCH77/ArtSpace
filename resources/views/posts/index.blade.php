<x-app-layout>
    <div class="container py-8 bg-gray-200">
        <div class="m-8">
            @livewire('buscador-post') 
        </div>

        <div class="py-8 rounded-lg mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 
                    grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-1 gap-6">
            
            @foreach ($posts as $post)
                {{-- <a href="{{route('posts.show', $post)}}" 
                    class="w-full h-80 bg-cover bg-center rounded-lg" 
                    style=" background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2023/11/01/11/15/mountains-8357180_1280.jpg @endif)">
                </a> --}}

                <a href="{{ route('posts.show', $post) }}" class=" shadow-lg w-full h-80 bg-cover bg-center rounded-lg wrappers" style="position: relative;">
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
                            {{-- No se deforme la imagen: object-cover, Centrar imagen: object-center --}}
                            <img class="w-full h-full object-cover object-center rounded-lg" src="{{ Storage::url($post->image->url) }}" alt="imagen del post">
                        @endif
                    @else
                        {{-- Si no hay media, mostrar una imagen de respaldo --}}
                        <img class="w-full h-80 object-cover object-center rounded-lg" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="imagen de respaldo">
                    @endif
                </a>

                
                
                {{-- <div class="w-full h-full px-8 flex flex-col justify-center">
                        <div>
                            @foreach ($post->tags as $tag)
                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">
                                    {{$tag->name}}
                                </a>
                            @endforeach
                        </div> 
    
                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                            <a href="{{route('posts.show', $post)}}">
                                {{$post->name}}
                            </a>
                        </h1>
                </div>     --}}
            @endforeach
        </div>

        {{-- link de paginacion --}}
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mt-4">
            {{$posts->links()}}
        </div>
    </div>   
</x-app-layout>
