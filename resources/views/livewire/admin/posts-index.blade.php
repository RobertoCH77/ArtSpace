<div class="card">

    <div class="card-body">
        <input wire:model.live="search" class="form-control" placeholder="Ingrese el nombre de un post">     
    </div>

    {{-- si existe un registro  --}}
    @if($posts->count())

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Título del Post</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($posts as $post)
                            {{-- <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td with="10px">
                                    <a class="btn btn-outline-warning btn-sm" href="{{route('admin.posts.edit', $post)}}">Editar</a>
                                </td>
                                <td with="10px">
                                    <form action="{{route('admin.posts.destroy', $post)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn btn-outline-danger btn-sm btn-delete" type="submit">Eliminar</button>              
                                    </form>
                                </td>
                            </tr> --}}
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->name}}</td>
                                <td class="text-center">
                                    <div class="btn-group" role="group">
                                        <a class="btn btn-outline-warning btn-sm" href="{{ route('admin.posts.edit', $post) }}">Editar</a>
                            
                                        <!-- Agrega más separación con clases de Bootstrap -->
                                        <div class="mx-2"></div>
                            
                                        <form action="{{ route('admin.posts.destroy', $post) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-outline-danger btn-sm btn-delete" type="submit">Eliminar</button>              
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            
                        @endforeach
                    </tbody>
                </table>
            </div>       
        </div>

        {{-- Crear la paginacion --}}
        <div class="pagination justify-content-center">
            {{$posts->links()}}
        </div>

    {{-- si no existe un registro --}}
    @else
        <div class="card-body">
            <strong class="text-danger">No hay ningún registro.</strong>
        </div>     
    @endif
</div>


@section('js')
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10/dist/sweetalert2.min.css">

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        $(document).ready(function () {
            // Selector para los botones de eliminar
            $('.btn-delete').on('click', function (e) {
                e.preventDefault(); // Evita el comportamiento predeterminado del botón

                // Guarda el formulario en una variable
                var form = $(this).closest('form');

                // Muestra la ventana de confirmación personalizada con SweetAlert2
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Esta acción no se puede deshacer',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Sí, eliminar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Si el usuario hace clic en "Aceptar", envía el formulario
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
