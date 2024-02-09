<div>
    {{-- class="bg-indigo-950" --}}
    <nav class="bg-gray-800" x-data="{open:false}">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">

                {{-- icono del menu movil --}}
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button" x-on:click="open = true"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>

                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>

                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                {{-- logo tipo + menu (encabezados) --}}
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <a href="/" class="flex flex-shrink-0 items-center">
                        <img class="h-8 w-auto" src="{{ asset('imagenes/artspace-logo-claro.svg') }}" alt="artSpace">
                    </a>
                    
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            {{-- <a href="#" class="bg-gray-900 text-white rounded-md px-3 py-2 text-sm font-medium"
                                aria-current="page">Dashboard</a> --}}

                            <a href="{{ route('artist_category.artist') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Artistas
                            </a>

                            <a href="{{ route('artist_category.category') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                Categorías
                            </a>

                            <a href="{{ route('artist_category.tag') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                                Etiquetas
                            </a>

                            <a href="{{ route('acerca.acercaDe') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                                Acerca de
                            </a>

                            {{-- href="{{ route('terminos.condiciones') }}" --}}

                            {{-- @foreach ($categories as $category)
                                <a href="{{route('posts.category', $category)}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                                    {{$category->name}}
                                </a>
                            @endforeach --}}
                        </div>
                    </div>
                </div>

                {{-- boton notificacion --}}
                @auth
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
                    {{-- <button type="button"
                        class="relative rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
                        <span class="absolute -inset-1.5"></span>
                        <span class="sr-only">View notifications</span>
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                        </svg>
                    </button> --}}

                    <!-- Profile dropdown -->
                    <div class="relative ml-3" x-data="{open: false}">
                        <div>
                            <button x-on:click="open=true" type="button"
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full"
                                    src="{{ auth()->user()->profile_photo_url }}" alt="">
                            </button>
                        </div>

                        <div x-on:click.away="open=false" x-show="open" 
                                class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <!-- Active: "bg-gray-100", Not Active: "" -->
                            <a href="{{route('profile.show')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-0">Tu Perfil</a>
                            @can('admin.home')
                                <a href="{{route('admin.home')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-1">Dashboard</a>
                            @endcan
                            

                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf 
                                <a href="{{ route('logout')}}" class="block px-4 py-2 text-sm text-gray-700" role="menuitem"
                                tabindex="-1" id="user-menu-item-2" @click.prevent="$root.submit();">Cerrar sesión</a>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                    {{-- <div>
                        <a href="{{route('login')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Iniciar sesión
                        </a>
                        <a href="{{route('register')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">
                            Registrar
                        </a>
                    </div> --}}
                    <div x-data="{ open: false }" class="relative inline-block text-left">
                        <div>
                          <button @click="open = !open" type="button" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium" id="menu-button" aria-expanded="false" aria-haspopup="true">
                            
                            {{-- <svg class="-mr-1 h-5 w-5 text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                              <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg> --}}
                            <img class="h-8 w-auto" src="{{ asset('imagenes/user-circle.svg') }}" alt="users">
                          </button>
                        </div>
                      
                        <!-- Dropdown menu -->
                        <div x-show="open" @click.away="open = false" class="absolute right-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                          <div class="py-1" role="none">
                            <a href="{{route('login')}}" class="text-gray-700 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 block text-sm font-medium">
                                Iniciar sesión
                            </a>
                            <a href="{{route('register')}}" class="text-gray-700 hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 block text-sm font-medium">
                                Registrar
                            </a>
                            
                          </div>
                        </div>
                      </div>
                @endauth

            </div>
        </div>

        {{-- menu movil --}}
        <div class="sm:hidden" id="mobile-menu"  x-show="open" x-on:click.away="open=false">
            <div class="space-y-1 px-2 pb-3 pt-2">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                {{-- <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                    aria-current="page">Dashboard</a> --}}

                <a href="{{ route('artist_category.artist') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    Artistas
                </a>

                <a href="{{ route('artist_category.category') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    Categorías
                </a>

                <a href="{{ route('artist_category.tag') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    Etiquetas
                </a>

                <a href="{{ route('acerca.acercaDe') }}" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                    Acerca de
                </a>

                {{-- @foreach ($categories as $category)
                    <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">
                        {{$category->name}}
                    </a>
                @endforeach --}}

            </div>
        </div>
    </nav>

</div>
