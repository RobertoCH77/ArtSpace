<div class="card">
    <h1 class="lg:text-3xl sm:text-2xl font-bold text-gray-600 text-center m-8">
        ETIQUETAS
    </h1>

    <div class="card-body">
        <input wire:model.live="search" class="form-control" placeholder="Ingrese el nombre de una etiqueta">     
    </div>

    {{-- si existe un registro  --}}
    @if($tagAll->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th></th>
                        <th>Nombre</th>
                        <th>Cantidad de Posts</th>
                    </tr>
                </thead>
                
                <tbody>
                    @foreach ($tagAll as $index => $tag) 
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{route('posts.tag', $tag)}}" class="text-decoration-none">
                                    {{ $tag->name }}
                                </a>
                            </td>
                            <td>{{ $this->getPostCount($tag->id) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Crear la paginacion --}}
        <div class=" pagination justify-content-center">
            {{$tagAll->links()}}
        </div>

    {{-- si no existe un registro --}}
    @else
        <div class="card-body">
            <strong class="text-danger">No hay ningún registro</strong>
        </div>     
    @endif
</div>

