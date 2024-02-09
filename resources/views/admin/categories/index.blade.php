@extends('adminlte::page')

@section('title', 'ArtSpace')

@section('content_header')
    <h1 class="text-center m-4 font-weight-bold">CATEGORÍAS</h1>
@stop

@section('content')

    <div class="text-center mb-3">
        <a class="btn btn-outline-primary" href="{{route('admin.categories.create')}}">Agregar Categoría</a>
    </div>

    @if (session('info'))
        <div class="alert alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive rounded">           
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th colspan="2">Acciones</th>
                        </tr>
                    </thead>
                        
                    <tbody>
                        {{-- registro de las categorias --}}
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>{{$category->name}}</td>
                                <td class="text-center" width="10px">
                                    <a class="btn btn-outline-warning btn-sm" href="{{route('admin.categories.edit', $category)}}">Editar</a>
                                </td>
                                <td class="thead-dark" width="10px">
                                    <form action="{{route('admin.categories.destroy', $category)}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-outline-danger btn-sm btn-delete">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@stop

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


