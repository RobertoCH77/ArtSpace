<div>
    <div class="card">
        {{-- Seccion de usuarios --}}
        <div class="text-center m-4 text-lg lg:text-4xl md:text-3xl sm:text-2xl text-success font-weight-bold">
            Lista de Usuarios
        </div>
        <div class="card-body">
            <input wire:model.live="searchUser" class="form-control" placeholder="Ingrese el nombre de un usuario.">
        </div>

        @if(count($users) > 0)
            <div class="table-responsive card-body">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre del usuario</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td class="text-center">
                                    <button class=" btn btn-outline-primary btn-sm" wire:click="loadUserPosts({{ $user->id }})">
                                        Ver Posts
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            {{-- Si no existe un registro --}}
            <div class="card-body">
                <strong class="text-danger">No hay ningún registro.</strong>
            </div>
        @endif
        
        {{-- Crear la paginación --}}
        <div class="pagination justify-content-center">
            {{ $users->links() }}
        </div>
    </div>

    <div class="card">
        {{-- Seccion de posts de los usuarios --}}
        <div class="text-center m-4 text-lg lg:text-4xl md:text-3xl sm:text-2xl text-success font-weight-bold">
            @if($selectedUserName)
                Lista de Posts de: 
                <div>
                    <span style="color: #ff0000;">{{ $selectedUserName }}</span>
                </div>
            @else
                Lista de Posts
            @endif
        </div>
        @if (session('info'))
            <div class="alert alert-success">
                <strong>{{ session('info') }}</strong>
            </div>
        @endif
        <div class="card-body">
            <input wire:model.live="searchPost" class="form-control" placeholder="Ingrese el nombre de un post.">
        </div>

        @if(count($posts) > 0)
            <div class="table-responsive card-body rounded">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Título del Post</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{ $post->name }}</td>
                                <td class="text-center">
                                    <button class="btn btn-outline-danger btn-sm" wire:click="deletePost({{ $post->id }})">
                                        Eliminar
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>             
            </div>
        @else
        {{-- Si no existe un registro --}}
        <div class="card-body">
            <strong class="text-danger">No hay ningún registro.</strong>
        </div>
        @endif

        {{-- Crear la paginación --}}
        <div class="pagination justify-content-center d-sm-flex">
            {{ $posts->links() }}
        </div>
    </div>
</div>

