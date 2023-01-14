<div id="dashboard_sidebar" x-show="showsidebar" class="fixed z-20 inset-0 top-[3.8125rem] right-auto w-[19.5rem] pb-10 px-8 overflow-y-auto">
    <nav id="nav" class="lg:text-sm lg:leading-6">
        <ul>
            <li class="mt-12 lg:mt-8">
                <h5 class="mb-8 lg:mb-3 font-semibold 
                    @if(Request::url() === route('dashboard'))
                    text-sky-500 dark:text-sky-400
                    @else
                    text-slate-900 dark:text-slate-200
                    @endif
                "><a href="{{route('dashboard')}}">Inicio</a></h5>
            </li>
            @foreach($modulos as $modulo)
            <li class="mt-12 lg:mt-8">
                <h5 class="mb-8 lg:mb-3 font-semibold text-slate-900 dark:text-slate-200">{{$modulo->mod_nombre}}</h5>
                <ul class="space-y-6 lg:space-y-2 border-l border-slate-100 dark:border-slate-800">
                    @foreach($modulo->modulosHijos as $submodulo)
                    @if($submodulo->mod_estado == \App\Models\Modulo::ESTADO_ACTIVO && $submodulo->mod_eliminado == \App\Models\Define::NO_ELIMINADO)
                    <li>
                        <a class="block border-l pl-4 -ml-px
                        @if('/'.Request::path() === $modulo->mod_url.$submodulo->mod_url)
                        text-sky-500 border-current font-semibold dark:text-sky-400
                        @else
                        border-transparent hover:border-slate-400 dark:hover:border-slate-500 text-slate-700 hover:text-slate-900 dark:text-slate-400 dark:hover:text-slate-300
                        @endif
                        " href="{{$modulo->mod_url.$submodulo->mod_url}}">
                            {{$submodulo->mod_nombre}}
                        </a>
                    </li>
                    @endif
                    @endforeach
                </ul>
            </li>
            @endforeach
        </ul>
    </nav>
</div>