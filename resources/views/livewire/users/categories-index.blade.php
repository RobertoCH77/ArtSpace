<div class="card">
    <h1 class="lg:text-3xl sm:text-2xl font-bold text-gray-600 text-center m-8">
        CATEGORÍAS
    </h1>

    <div class="card-body">
        <input wire:model.live="search" class="form-control" placeholder="Ingrese el nombre de una categorías">     
    </div>

    {{-- si existe un registro  --}}
    @if($categoriesAll->count())
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
                    @foreach ($categoriesAll as $index => $category) 
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                <a href="{{route('posts.category', $category)}}" class="text-decoration-none">
                                    {{ $category->name }}
                                </a>
                            </td>
                            <td>{{ $this->getCategoryCount($category->id) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Crear la paginacion --}}
        <div class=" pagination justify-content-center">
            {{$categoriesAll->links()}}
        </div>

    {{-- si no existe un registro --}}
    @else
        <div class="card-body">
            <strong class="text-danger">No hay ningún registro</strong>
        </div>     
    @endif
</div>

