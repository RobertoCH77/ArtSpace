<x-app-layout>
    <div class="container py-8 bg-gray-200">
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>

        <div class="m-8">
            @livewire('buscador-post') 
        </div>
    
        {{-- <p class="text-center text-3xl m-8">
            Etiqueta: <strong class="fw-bold text-uppercase">{{$tag->name}}</strong> 
        </p> --}}

        <div class="text-center lg:text-3xl sm:text-2xl mb-4">
            <p class="text-gray-600 d-inline">Posts con etiqueta:</p>
            <p class="fw-bold text-uppercase d-inline">{{$tag->name}}</p>
        </div>
    
        <div class="py-8 rounded-lg mx-auto max-w-7xl px-2 sm:px-6 lg:px-8
                        grid lg:grid-cols-5 md:grid-cols-3 sm:grid-cols-1 gap-6">
            
            {{--    todo mayuscula: uppercase
                    tamano de la latra: text-3xl --}}
            
    
            {{-- intera la coleccion post --}}
            {{-- @foreach ($posts as $post)
                <x-card-post :post="$post">
    
                </x-card-post>
            @endforeach --}}
    
            @foreach ($posts as $post)
                    <x-card-post :post="$post">
                    </x-card-post>
            @endforeach    
        </div>  
        {{-- paginacion --}}
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8 mt-4">
            {{$posts->links()}}
        </div>
    </div> 
</x-app-layout>