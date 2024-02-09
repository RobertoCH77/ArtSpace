<div class="my-2">
    <h2 class="text-2xl font-bold mb-4">Comentarios</h2>
    <ul class="flex flex-col gap-4">
        @forelse ($comments as $comment)
            <li class="bg-gray-100 p-4 rounded">
                <div class="flex items-start mb-2">
                    @if ($comment->user)
                        <img
                            src="{{ $comment->user->profile_photo_url }}"
                            alt="{{ $comment->user->name }}"
                            class="inline-block h-10 w-10 rounded-full mr-4"
                        >
                        <div>
                            <span class="font-bold">{{ $comment->user->name }}</span>
                            <span class="text-sm text-gray-500">{{ $comment->created_at->diffForHumans() }}</span>
                        </div>
                    @else
                        <span class="text-gray-500">Usuario desconocido</span>
                    @endif
                </div>
                <span>{{ $comment->message }}</span>

                <!-- Botones de modificar y eliminar -->
                <div class="flex items-center mt-2">
                    <button wire:click="editComment({{ $comment->id }})" class="text-blue-500 hover:underline mr-4">Editar</button>
                    <button wire:click="deleteComment({{ $comment->id }})" class="text-red-500 hover:underline">Eliminar</button>
                </div>

                <!-- Formulario de edición (mostrar si está en edición) -->
                @if($editingCommentId === $comment->id)
                    <div class="mt-2">
                        <textarea wire:model="message" class="resize-none w-full p-2 border rounded focus:outline-none focus:ring focus:border-blue-300"></textarea>
                        <div class="flex flex-col mt-2 md:flex-row md:justify-end">
                            <button wire:click="updateComment" class="w-full md:w-auto mt-2 md:mt-0 bg-green-500 text-white py-2 px-4 rounded md:mr-2">Guardar</button>
                            <button wire:click="cancelEdit" class="w-full md:w-auto mt-2 md:mt-0 bg-gray-500 text-white py-2 px-4 rounded">Cancelar</button>
                        </div>
                    </div>
                @endif
            </li>
        @empty
            <li class="text-gray-500">No hay comentarios aún.</li>
        @endforelse
        
    </ul>

    <!-- Muestra el mensaje de error si existe -->
    @if (session()->has('error'))
        <div class="bg-red-500 text-white p-2 mb-4 rounded">
            {{ session('error') }}
        </div>
    @endif

    <div class="flex flex-col mt-4">
        <textarea wire:model="message" name="" id="" cols="30" rows="2" class="resize-none border rounded p-2 focus:outline-none focus:ring focus:border-blue-300"></textarea>
        @error('message') 
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        
    </div>
    <div class="mt-4 flex justify-center">
        <button class="mx-auto w-max md:w-36 bg-blue-500 text-white py-2 px-4 rounded focus:outline-none hover:bg-blue-600 transition" wire:click="storeComment">Comentar</button>
    </div>
</div>


