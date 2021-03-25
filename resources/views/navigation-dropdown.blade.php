<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex" style="width: 30%">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center" style="background-color: white">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{url('/')}}/img/logo.png" class="card-img-top" alt="..." style="width: 120px; height: 70px;margin-left: 50%">
                    </a>
                </div>

                <!-- Navigation Links -->
                
            </div>
            <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex" style="width: 40%;">
                    <nav class="navbar navbar-light bg">
                      <div class="container-fluid">
                        <form class="d-flex">
                          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                          <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                      </div>
                    </nav>
                </div>

            <!-- Settings Dropdown -->
           
            <div class="hidden sm:flex sm:items-center sm:ml-6" style="width: 30%;">
                <div style="width: 70%">
                    <div style="float: right;" >
                        <a class="navbar-brand" href="#">
                        <img src="{{url('/')}}/img/gps.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                        </a>
                    </div>
                    <div style="float: right;" >
                        <a class="navbar-brand" href="#">
                        <img src="{{url('/')}}/img/cora.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                        </a>
                    </div>
                    <div style="float: right;" >
                        <a class="navbar-brand" href="#">
                        <img src="{{url('/')}}/img/messenger.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                        </a>
                    </div>
                    <div style="float: right;"  >
                        <a class="navbar-brand" href="#">
                        <img src="{{url('/')}}/img/mas.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                        </a>
                    </div>
                    <div style="float: right;" >
                        <a class="navbar-brand" href="#">
                        <img src="{{url('/')}}/img/home.png" class="card-img-top" alt="..." style="width: 20px; height: 20px; margin-top: 50%">
                        </a>
                    </div>     
                </div> 
                <div style="float: left;" >
                    <x-jet-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition duration-150 ease-in-out">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <button class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out">
                                    <div style="float: right;" >
                                        <a class="navbar-brand" href="#">
                                        <img src="{{url('/')}}/img/user.png" class="card-img-top" alt="..." style="width: 23px; height: 23px; margin-top: 50%; float: right;">
                                        </a>
                                    </div>
                                </button>
                            @endif
                        </x-slot>
                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Opciones') }}
                            </div>
                            <x-jet-responsive-nav-link  href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-responsive-nav-link>
                            
                            <x-jet-responsive-nav-link href="{{ route('movies')}}">
                                {{ __('Guardado') }}
                            </x-jet-responsive-nav-link>

                            @if(Auth::user()->hasRole('Admin'))
                            <x-jet-responsive-nav-link href="{{ route('categories')}}">
                                {{ __('Categorias') }}
                            </x-jet-responsive-nav-link>

                            <x-jet-responsive-nav-link href="{{ route('users')}}">
                                {{ __('Usuarios') }}
                            </x-jet-responsive-nav-link>
                            @endif

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                                <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                    {{ __('API Tokens') }}
                                </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Team Management -->
                            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Manage Team') }}
                                </div>

                                <!-- Team Settings -->
                                <x-jet-dropdown-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                                    {{ __('Team Settings') }}
                                </x-jet-dropdown-link>

                                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                                    <x-jet-dropdown-link href="{{ route('teams.create') }}">
                                        {{ __('Create New Team') }}
                                    </x-jet-dropdown-link>
                                @endcan

                                <div class="border-t border-gray-100"></div>

                                <!-- Team Switcher -->
                                <div class="block px-4 py-2 text-xs text-gray-400">
                                    {{ __('Switch Teams') }}
                                </div>

                                @foreach (Auth::user()->allTeams() as $team)
                                    <x-jet-switchable-team :team="$team" />
                                @endforeach

                                <div class="border-t border-gray-100"></div>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                                                this.closest('form').submit();">
                                    {{ __('Cerrar Sesion') }}
                                </x-jet-dropdown-link>
                            </form>
                        </x-slot>
                    </x-jet-dropdown>
                </div>     
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-jet-responsive-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Inicio') }}
            </x-jet-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                <div class="flex-shrink-0">
                    <img class="h-10 w-10 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div>

                <div class="ml-3">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1">
                <!-- Account Management -->
                <x-jet-responsive-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Perfil') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('movies')}}">
                    {{ __('Peliculas') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('loans')}}">
                    {{ __('Prestamos') }}
                </x-jet-responsive-nav-link>
                        
                @if(Auth::user()->hasRole('Admin'))
                <x-jet-responsive-nav-link href="{{ route('categories')}}">
                    {{ __('Categorias') }}
                </x-jet-responsive-nav-link>

                <x-jet-responsive-nav-link href="{{ route('users')}}">
                    {{ __('Usuarios') }}
                </x-jet-responsive-nav-link>
                @endif

                @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                    <x-jet-responsive-nav-link href="{{ route('api-tokens.index') }}" :active="request()->routeIs('api-tokens.index')">
                        {{ __('API Tokens') }}
                    </x-jet-responsive-nav-link>
                @endif

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        this.closest('form').submit();">
                        {{ __('Cerrar Sesion') }}
                    </x-jet-responsive-nav-link>
                </form>

                <!-- Team Management -->
                @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
                    <div class="border-t border-gray-200"></div>

                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Manage Team') }}
                    </div>

                    <!-- Team Settings -->
                    <x-jet-responsive-nav-link href="{{ route('teams.show', Auth::user()->currentTeam->id) }}" :active="request()->routeIs('teams.show')">
                        {{ __('Team Settings') }}
                    </x-jet-responsive-nav-link>

                    <x-jet-responsive-nav-link href="{{ route('teams.create') }}" :active="request()->routeIs('teams.create')">
                        {{ __('Create New Team') }}
                    </x-jet-responsive-nav-link>

                    <div class="border-t border-gray-200"></div>

                    <!-- Team Switcher -->
                    <div class="block px-4 py-2 text-xs text-gray-400">
                        {{ __('Switch Teams') }}
                    </div>

                    @foreach (Auth::user()->allTeams() as $team)
                        <x-jet-switchable-team :team="$team" component="jet-responsive-nav-link" />
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</nav>
