{{-- recimos al componente --}}
@props(['post'])

{{--    Separacion entre imagenes: mb-8
                Para tema claro: shadow-lg
                Para redondear esquinas: rounded-lg overflow-hidden --}}

<article class="mb-8 bg-white rounded-lg overflow-hidden">
        @if ($post->image)
            <a href="{{ route('posts.show', $post) }}" class="w-full h-80 bg-cover bg-center rounded-lg relative block wrappers">
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
            </a>
        @else
            <a href="{{ route('posts.show', $post) }}" class="w-full h-64 bg-cover bg-center rounded-lg relative block">
                <img class="w-full h-full object-cover object-center rounded-lg" src="https://cdn.pixabay.com/photo/2017/03/24/06/03/folder-2170316_1280.png" alt="imagen de respaldo">
            </a>
        @endif
</article>
                
