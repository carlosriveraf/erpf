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
        if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>

<body x-data="dropdown" class="bg-white text-slate-500 dark:bg-slate-900 dark:text-slate-400">
    @include('layouts.header')

    <div class="overflow-hidden">
        <div class="max-w-8xl mx-auto px-4 sm:px-6 md:px-8">
            @include('layouts.sidebar')

            <div id="dashboard_main">
                <!-- <div id="dashboard_main" class="lg:pl-[19.5rem]"> -->
                <!-- <main class="bg-green-400 h-screen">main</main> -->
                <main class="mx-auto relative z-20 pt-10 xl:max-w-none">
                    <header id="header" class="mb-10 md:flex md:items-start">
                        <div class="flex-auto max-w-4xl">
                            <p class="mb-4 text-sm leading-6 font-semibold text-sky-500 dark:text-sky-400">Installation</p>
                            <h1 class="text-3xl sm:text-4xl font-extrabold text-slate-900 tracking-tight dark:text-slate-200">Get started with Tailwind CSS</h1>
                            <p class="mt-4 text-lg text-slate-700 dark:text-slate-400">Tailwind CSS works by scanning all of your HTML files, JavaScript components, and any other templates for class names, generating the corresponding styles and then writing them to a static CSS file.</p>
                            <p class="mt-4 text-lg text-slate-700 dark:text-slate-400">It's fast, flexible, and reliable — with zero-runtime.</p>
                        </div>
                    </header>
                    <section class="mb-16 relative">
                        <div class="relative z-10">
                            <h2 data-docsearch-ignore="true" class="text-slate-900 text-xl tracking-tight font-bold mb-3 dark:text-slate-200">Installation</h2>
                            <div class="flex overflow-auto mb-6 -mx-4 sm:-mx-6">
                                <div class="flex-none min-w-full px-4 sm:px-6">
                                    <ul class="border-b border-slate-200 space-x-6 flex whitespace-nowrap dark:border-slate-200/5">
                                        <li>
                                            <h2><a class="flex text-sm leading-6 font-semibold pt-3 pb-2.5 border-b-2 -mb-px text-sky-500 border-current" href="/docs/installation">Tailwind CLI</a></h2>
                                        </li>
                                        <li>
                                            <h2><a class="flex text-sm leading-6 font-semibold pt-3 pb-2.5 border-b-2 -mb-px text-slate-900 border-transparent hover:border-slate-300 dark:text-slate-200 dark:hover:border-slate-700" href="/docs/installation/using-postcss">Using PostCSS</a></h2>
                                        </li>
                                        <li>
                                            <h2><a class="flex text-sm leading-6 font-semibold pt-3 pb-2.5 border-b-2 -mb-px text-slate-900 border-transparent hover:border-slate-300 dark:text-slate-200 dark:hover:border-slate-700" href="/docs/installation/framework-guides">Framework Guides</a></h2>
                                        </li>
                                        <li>
                                            <h2><a class="flex text-sm leading-6 font-semibold pt-3 pb-2.5 border-b-2 -mb-px text-slate-900 border-transparent hover:border-slate-300 dark:text-slate-200 dark:hover:border-slate-700" href="/docs/installation/play-cdn">Play CDN</a></h2>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div id="content-wrapper" class="relative z-10 max-w-3xl mb-16 prose prose-slate dark:prose-dark">
                            <h3 class="sr-only">Installing Tailwind CLI</h3>
                            <p>The simplest and fastest way to get up and running with Tailwind CSS from scratch is with the Tailwind CLI tool. The CLI is also available as a <a href="/blog/standalone-cli">standalone executable</a> if you want to use it without installing Node.js.</p>
                        </div>
                        <div class="hidden sm:block absolute -z-10 top-0 left-[15%] pt-[40%] 2xl:left-[40%] 2xl:pt-[8%] dark:hidden"><img src="" alt="" class="w-[52.6875rem] max-w-none" decoding="async"></div>
                        <ol class="relative space-y-2 mb-16" style="counter-reset: step 0;">
                            <li class="relative pl-10 xl:grid grid-cols-5 gap-16 before:content-[counter(step)] before:absolute before:left-0 before:flex before:items-center before:justify-center before:w-[calc(1.375rem+1px)] before:h-[calc(1.375rem+1px)] before:text-[0.625rem] before:font-bold before:text-slate-700 before:rounded-md before:shadow-sm before:ring-1 before:ring-slate-900/5 dark:before:bg-slate-700 dark:before:text-slate-200 dark:before:ring-0 dark:before:shadow-none dark:before:highlight-white/5 pb-8 after:absolute after:top-[calc(1.875rem+1px)] after:bottom-0 after:left-[0.6875rem] after:w-px after:bg-slate-200 dark:after:bg-slate-200/5" style="counter-increment: step 1;">
                                <div class="mb-6 col-span-2 xl:mb-0">
                                    <h4 class="text-sm leading-6 text-slate-900 font-semibold mb-2 dark:text-slate-200">Install Tailwind CSS</h4>
                                    <div class="prose prose-slate prose-sm dark:prose-dark">
                                        <p>Install <code>tailwindcss</code> via npm, and create your <code>tailwind.config.js</code> file.</p>
                                    </div>
                                </div>
                                <div class="relative z-10 -ml-10 col-span-3 bg-slate-800 rounded-xl shadow-lg xl:ml-0 dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/10">
                                    <div class="relative flex text-slate-400 text-xs leading-6">
                                        <div class="mt-2 flex-none text-sky-300 border-t border-b border-t-transparent border-b-sky-300 px-4 py-1 flex items-center">Terminal</div>
                                        <div class="flex-auto flex pt-2 rounded-tr-xl overflow-hidden">
                                            <div class="flex-auto -mr-px bg-slate-700/50 border border-slate-500/30 rounded-tl"></div>
                                        </div>
                                        <div class="absolute top-2 right-0 h-8 flex items-center pr-4">
                                            <div class="relative flex -mr-2"><button type="button" class="text-slate-500 hover:text-slate-400"><svg fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="w-8 h-8">
                                                        <path d="M13 10.75h-1.25a2 2 0 0 0-2 2v8.5a2 2 0 0 0 2 2h8.5a2 2 0 0 0 2-2v-8.5a2 2 0 0 0-2-2H19"></path>
                                                        <path d="M18 12.25h-4a1 1 0 0 1-1-1v-1.5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1.5a1 1 0 0 1-1 1ZM13.75 16.25h4.5M13.75 19.25h4.5"></path>
                                                    </svg></button></div>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <pre class="text-sm leading-6 text-slate-50 flex ligatures-none overflow-auto"><code class="flex-none min-w-full p-5"><span class="flex"><svg viewBox="0 -9 3 24" aria-hidden="true" class="flex-none overflow-visible text-pink-400 w-auto h-6 mr-3"><path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg><span class="flex-auto">npm install -D tailwindcss</span></span><span class="flex"><svg viewBox="0 -9 3 24" aria-hidden="true" class="flex-none overflow-visible text-pink-400 w-auto h-6 mr-3"><path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg><span class="flex-auto">npx tailwindcss init</span></span></code></pre>
                                    </div>
                                </div>
                            </li>
                            <li class="relative pl-10 xl:grid grid-cols-5 gap-16 before:content-[counter(step)] before:absolute before:left-0 before:flex before:items-center before:justify-center before:w-[calc(1.375rem+1px)] before:h-[calc(1.375rem+1px)] before:text-[0.625rem] before:font-bold before:text-slate-700 before:rounded-md before:shadow-sm before:ring-1 before:ring-slate-900/5 dark:before:bg-slate-700 dark:before:text-slate-200 dark:before:ring-0 dark:before:shadow-none dark:before:highlight-white/5 pb-8 after:absolute after:top-[calc(1.875rem+1px)] after:bottom-0 after:left-[0.6875rem] after:w-px after:bg-slate-200 dark:after:bg-slate-200/5" style="counter-increment: step 1;">
                                <div class="mb-6 col-span-2 xl:mb-0">
                                    <h4 class="text-sm leading-6 text-slate-900 font-semibold mb-2 dark:text-slate-200">Configure your template paths</h4>
                                    <div class="prose prose-slate prose-sm dark:prose-dark">
                                        <p>Add the paths to all of your template files in your <code>tailwind.config.js</code> file.</p>
                                    </div>
                                </div>
                                <div class="relative z-10 -ml-10 col-span-3 bg-slate-800 rounded-xl shadow-lg xl:ml-0 dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/10">
                                    <div class="relative flex text-slate-400 text-xs leading-6">
                                        <div class="mt-2 flex-none text-sky-300 border-t border-b border-t-transparent border-b-sky-300 px-4 py-1 flex items-center">tailwind.config.js</div>
                                        <div class="flex-auto flex pt-2 rounded-tr-xl overflow-hidden">
                                            <div class="flex-auto -mr-px bg-slate-700/50 border border-slate-500/30 rounded-tl"></div>
                                        </div>
                                        <div class="absolute top-2 right-0 h-8 flex items-center pr-4">
                                            <div class="relative flex -mr-2"><button type="button" class="text-slate-500 hover:text-slate-400"><svg fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="w-8 h-8">
                                                        <path d="M13 10.75h-1.25a2 2 0 0 0-2 2v8.5a2 2 0 0 0 2 2h8.5a2 2 0 0 0 2-2v-8.5a2 2 0 0 0-2-2H19"></path>
                                                        <path d="M18 12.25h-4a1 1 0 0 1-1-1v-1.5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1.5a1 1 0 0 1-1 1ZM13.75 16.25h4.5M13.75 19.25h4.5"></path>
                                                    </svg></button></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="relative pl-10 xl:grid grid-cols-5 gap-16 before:content-[counter(step)] before:absolute before:left-0 before:flex before:items-center before:justify-center before:w-[calc(1.375rem+1px)] before:h-[calc(1.375rem+1px)] before:text-[0.625rem] before:font-bold before:text-slate-700 before:rounded-md before:shadow-sm before:ring-1 before:ring-slate-900/5 dark:before:bg-slate-700 dark:before:text-slate-200 dark:before:ring-0 dark:before:shadow-none dark:before:highlight-white/5 pb-8 after:absolute after:top-[calc(1.875rem+1px)] after:bottom-0 after:left-[0.6875rem] after:w-px after:bg-slate-200 dark:after:bg-slate-200/5" style="counter-increment: step 1;">
                                <div class="mb-6 col-span-2 xl:mb-0">
                                    <h4 class="text-sm leading-6 text-slate-900 font-semibold mb-2 dark:text-slate-200">Start the Tailwind CLI build process</h4>
                                    <div class="prose prose-slate prose-sm dark:prose-dark">
                                        <p>Run the CLI tool to scan your template files for classes and build your CSS.</p>
                                    </div>
                                </div>
                                <div class="relative z-10 -ml-10 col-span-3 bg-slate-800 rounded-xl shadow-lg xl:ml-0 dark:shadow-none dark:ring-1 dark:ring-inset dark:ring-white/10">
                                    <div class="relative flex text-slate-400 text-xs leading-6">
                                        <div class="mt-2 flex-none text-sky-300 border-t border-b border-t-transparent border-b-sky-300 px-4 py-1 flex items-center">Terminal</div>
                                        <div class="flex-auto flex pt-2 rounded-tr-xl overflow-hidden">
                                            <div class="flex-auto -mr-px bg-slate-700/50 border border-slate-500/30 rounded-tl"></div>
                                        </div>
                                        <div class="absolute top-2 right-0 h-8 flex items-center pr-4">
                                            <div class="relative flex -mr-2"><button type="button" class="text-slate-500 hover:text-slate-400"><svg fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" class="w-8 h-8">
                                                        <path d="M13 10.75h-1.25a2 2 0 0 0-2 2v8.5a2 2 0 0 0 2 2h8.5a2 2 0 0 0 2-2v-8.5a2 2 0 0 0-2-2H19"></path>
                                                        <path d="M18 12.25h-4a1 1 0 0 1-1-1v-1.5a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1.5a1 1 0 0 1-1 1ZM13.75 16.25h4.5M13.75 19.25h4.5"></path>
                                                    </svg></button></div>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <pre class="text-sm leading-6 text-slate-50 flex ligatures-none overflow-auto"><code class="flex-none min-w-full p-5"><span class="flex"><svg viewBox="0 -9 3 24" aria-hidden="true" class="flex-none overflow-visible text-pink-400 w-auto h-6 mr-3"><path d="M0 0L3 3L0 6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg><span class="flex-auto">npx tailwindcss -i ./src/input.css -o ./dist/output.css --watch</span></span></code></pre>
                                    </div>
                                </div>
                            </li>
                        </ol>
                    </section>
                </main>
                <footer class="text-sm leading-6 mt-16">
                    <div class="pt-10 pb-28 border-t border-slate-200 sm:flex justify-between text-slate-500 dark:border-slate-200/5">
                        <div class="mb-6 sm:mb-0 sm:flex">
                            <p>Copyright © 2022 Tailwind Labs Inc.</p>
                            <p class="sm:ml-4 sm:pl-4 sm:border-l sm:border-slate-200 dark:sm:border-slate-200/5"><a class="hover:text-slate-900 dark:hover:text-slate-400" href="/brand">Trademark Policy</a></p>
                        </div>
                        <div class="flex space-x-10 text-slate-400 dark:text-slate-500"><a href="https://github.com/tailwindlabs/tailwindcss" class="hover:text-slate-500 dark:hover:text-slate-400"><span class="sr-only">GitHub</span><svg width="25" height="24" fill="currentColor">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M12.846 0c-6.63 0-12 5.506-12 12.303 0 5.445 3.435 10.043 8.205 11.674.6.107.825-.262.825-.585 0-.292-.015-1.261-.015-2.291-3.015.569-3.795-.754-4.035-1.446-.135-.354-.72-1.446-1.23-1.738-.42-.23-1.02-.8-.015-.815.945-.015 1.62.892 1.845 1.261 1.08 1.86 2.805 1.338 3.495 1.015.105-.8.42-1.338.765-1.645-2.67-.308-5.46-1.37-5.46-6.075 0-1.338.465-2.446 1.23-3.307-.12-.308-.54-1.569.12-3.26 0 0 1.005-.323 3.3 1.26.96-.276 1.98-.415 3-.415s2.04.139 3 .416c2.295-1.6 3.3-1.261 3.3-1.261.66 1.691.24 2.952.12 3.26.765.861 1.23 1.953 1.23 3.307 0 4.721-2.805 5.767-5.475 6.075.435.384.81 1.122.81 2.276 0 1.645-.015 2.968-.015 3.383 0 .323.225.707.825.585a12.047 12.047 0 0 0 5.919-4.489 12.537 12.537 0 0 0 2.256-7.184c0-6.798-5.37-12.304-12-12.304Z"></path>
                                </svg></a><a href="/discord" class="hover:text-slate-500 dark:hover:text-slate-400"><span class="sr-only">Discord</span><svg width="23" height="24" fill="currentColor">
                                    <path d="M9.555 9.23c-.74 0-1.324.624-1.324 1.385S8.827 12 9.555 12c.739 0 1.323-.624 1.323-1.385.013-.761-.584-1.385-1.323-1.385Zm4.737 0c-.74 0-1.324.624-1.324 1.385S13.564 12 14.292 12c.74 0 1.324-.624 1.324-1.385s-.584-1.385-1.324-1.385Z"></path>
                                    <path d="M20.404 0H3.442c-.342 0-.68.065-.995.19a2.614 2.614 0 0 0-.843.536 2.46 2.46 0 0 0-.562.801c-.13.3-.197.62-.196.944v16.225c0 .324.066.645.196.944.13.3.321.572.562.801.241.23.527.412.843.537.315.124.653.189.995.19h14.354l-.67-2.22 1.62 1.428 1.532 1.344L23 24V2.472c0-.324-.066-.644-.196-.944a2.46 2.46 0 0 0-.562-.8A2.614 2.614 0 0 0 21.4.19a2.726 2.726 0 0 0-.995-.19V0Zm-4.886 15.672s-.456-.516-.836-.972c1.659-.444 2.292-1.428 2.292-1.428a7.38 7.38 0 0 1-1.456.707 8.67 8.67 0 0 1-1.836.517 9.347 9.347 0 0 1-3.279-.012 11.074 11.074 0 0 1-1.86-.516 7.621 7.621 0 0 1-.924-.409c-.039-.023-.076-.035-.113-.06-.027-.011-.04-.023-.052-.035-.228-.12-.354-.204-.354-.204s.608.96 2.215 1.416c-.38.456-.848.996-.848.996-2.797-.084-3.86-1.824-3.86-1.824 0-3.864 1.822-6.996 1.822-6.996 1.823-1.296 3.557-1.26 3.557-1.26l.127.145c-2.278.623-3.33 1.57-3.33 1.57s.279-.143.747-.347c1.355-.564 2.43-.72 2.873-.756.077-.012.14-.024.216-.024a10.804 10.804 0 0 1 6.368 1.129s-1.001-.9-3.153-1.526l.178-.19s1.735-.037 3.557 1.259c0 0 1.823 3.133 1.823 6.996 0 0-1.076 1.74-3.874 1.824Z"></path>
                                </svg></a></div>
                    </div>
                </footer>
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
                        document.getElementById('dashboard_main').classList.add('lg:pl-[19.5rem]');
                    } else {
                        document.getElementById('dashboard_main').classList.remove('lg:pl-[19.5rem]');
                    }
                }
            }))
        })
    </script>
    @livewireScripts
</body>

</html>