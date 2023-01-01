<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    @vite('resources/css/app.css')
    @livewireStyles
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script>

    </script>
    <script>
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>

    <link rel="stylesheet" href="{{asset('/kendoui/styles/kendo.default-v2.min.css')}}">
    <script src="{{asset('/kendoui/js/jquery.min.js')}}"></script>
    <script src="{{asset('kendoui/js/kendo.all.min.js')}}"></script>
    <script src="{{asset('kendoui/js/messages/kendo.messages.es-PE.min.js')}}"></script>

    <script src="https://kit.fontawesome.com/4f91a515f0.js" crossorigin="anonymous"></script>
    @yield('head')
</head>

<body x-data="dropdown" class="bg-black/20">
    @include('layouts.header')

    <div class="overflow-hidden">
        <div class="max-w-8xl mx-auto">
            <!-- <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8"> -->
            {{--@include('layouts.sidebar')--}}
            @livewire('layouts.sidebar')

            <div id="dashboard_main">
                <main class="mx-auto relative z-20 pt-3 xl:max-w-none">
                    @yield('main_content')
                </main>
                @include('layouts.footer')
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dropdown', () => ({
                showsidebar: false,
                toggle() {
                    this.showsidebar = !this.showsidebar;
                    if (this.showsidebar === true) {
                        //document.getElementById('dashboard_main').classList.add('lg:pl-[19.5rem]');
                        document.getElementById('dashboard_main').classList.add('pl-[19.5rem]');
                    } else {
                        //document.getElementById('dashboard_main').classList.remove('lg:pl-[19.5rem]');
                        document.getElementById('dashboard_main').classList.remove('pl-[19.5rem]');
                    }
                },
            }));
        });
    </script>
    @livewireScripts
</body>

</html>