<x-app-layout>
    <div class="container py-8 bg-gray-200">
        <a class="btn btn-secondary mb-8" href="{{ route('posts.index') }}">
            <i class="fa-solid fa-arrow-left"></i>
        </a>
        @livewire('users.artists-index')
    </div>
</x-app-layout>



