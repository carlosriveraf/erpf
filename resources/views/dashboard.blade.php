@extends('layouts.dashboard')

@section('title', 'Inicio')

@section('main_content')
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
@endsection