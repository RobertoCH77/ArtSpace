<div>
    <button wire:click="toggleLike" class="text-gray-600 hover:text-red-500 focus:outline-none {{ $post->likedBy(auth()->user()) ? 'liked' : '' }}" style="{{ $post->likedBy(auth()->user()) ? 'color: red;' : '' }}">
        <i class="fas fa-heart fa-lg"></i>
    </button>
    <span class="ml-2 text-gray-600">{{ $post->likes_count }} Me gusta</span>

    @if(session('message'))
        <div class="text-red-500">{{ session('message') }}</div>
    @endif
</div>


