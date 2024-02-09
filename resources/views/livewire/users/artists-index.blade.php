<div class="card">
    <h1 class="lg:text-3xl sm:text-2xl font-bold text-gray-600 text-center m-8">
        ARTISTAS
    </h1>

    <div class="card-body">
        <input wire:model.live="search" class="form-control" placeholder="Ingrese el nombre de un artista">     
    </div>

    {{-- si existe un registro  --}}
    @if($artists->count())
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
                    @foreach ($artists as $index => $artist) 
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            {{-- <td>{{ $artist->name }}</td> --}}
                            <td>
                                {{-- class="text-dark font-weight-bold no-underline" --}}
                                <a href="{{ route('artist.posts', $artist) }}" class="text-decoration-none">
                                    {{ $artist->name }}
                                </a>
                            </td>
                            <td>{{ $artist->posts->count() }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- Crear la paginacion --}}
        <div class=" pagination justify-content-center">
            {{$artists->links()}}
        </div>

    {{-- si no existe un registro --}}
    @else
        <div class="card-body">
            <strong class="text-danger">No hay ningún registro</strong>
        </div>     
    @endif
</div>
