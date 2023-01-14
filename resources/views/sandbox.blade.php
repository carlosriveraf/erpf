@extends('layouts.dashboard')

@section('head')
@endsection

@section('title', 'Sandbox')

@section('main_content')
<div class="px-5 py-3">
    <div class="mb-3 text-lg font-semibold">
        Crear Módulo
    </div>
    <div class="mb-3">
        <div class="grid grid-cols-2 gap-x-4 gap-y-4">
            <div>
                <div class="w-full">
                    <div class="h-8 relative">
                        <input type="text" id="CM_nombre_input_text" class="
            h-full w-full
            px-2 py-1.5
            text-sm
            rounded
            border border-[#00000052]
            focus:border focus:border-[#00000052]
            focus:ring-1 focus:ring-[#00000052]
        ">
                        <div id="CM_nombre_label" class="
            bg-white
            px-1.5
            text-sm text-[#5f6368]
            absolute top-1.5 left-1
        ">Nombre</div>
                    </div>
                    <div>
                        <span id="CM_nombre_error_message" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
                    </div>
                </div>



                <script>
                    document.getElementById('CM_nombre' + '_input_text').addEventListener('focus', (event) => {
                        focusInputText('CM_nombre');
                    });

                    document.getElementById('CM_nombre' + '_input_text').addEventListener('blur', (event) => {
                        blurInputText('CM_nombre');
                    });

                    document.getElementById('CM_nombre' + '_label').addEventListener('click', (event) => {
                        document.getElementById('CM_nombre' + '_input_text').focus();
                    });

                    document.getElementById('CM_nombre' + '_input_text').addEventListener('input', (event) => {
                        clearInputTextError('CM_nombre');
                        focusInputText('CM_nombre');
                    });
                </script>
            </div>
            <div>
                <div class="w-full">
                    <div class="h-8 relative">
                        <input type="text" id="CM_url_input_text" class="
            h-full w-full
            px-2 py-1.5
            text-sm
            rounded
            border border-[#00000052]
            focus:border focus:border-[#00000052]
            focus:ring-1 focus:ring-[#00000052]
        ">
                        <div id="CM_url_label" class="
            bg-white
            px-1.5
            text-sm text-[#5f6368]
            absolute top-1.5 left-1
        ">URL</div>
                    </div>
                    <div>
                        <span id="CM_url_error_message" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
                    </div>
                </div>



                <script>
                    document.getElementById('CM_url' + '_input_text').addEventListener('focus', (event) => {
                        focusInputText('CM_url');
                    });

                    document.getElementById('CM_url' + '_input_text').addEventListener('blur', (event) => {
                        blurInputText('CM_url');
                    });

                    document.getElementById('CM_url' + '_label').addEventListener('click', (event) => {
                        document.getElementById('CM_url' + '_input_text').focus();
                    });

                    document.getElementById('CM_url' + '_input_text').addEventListener('input', (event) => {
                        clearInputTextError('CM_url');
                        focusInputText('CM_url');
                    });
                </script>
            </div>
            <div class="col-span-2">
                <div class="w-full">
                    <div class="relative">
                        <textarea rows="2" cols="20" id="CM_descripcion_textarea" class="
            h-full w-full
            px-2 py-1.5
            text-sm
            rounded
            border border-[#00000052]
            focus:border focus:border-[#00000052]
            focus:ring-1 focus:ring-[#00000052]
        "></textarea>
                        <div id="CM_descripcion_label" class="
            bg-white
            px-1.5
            text-sm text-[#5f6368]
            absolute top-1.5 left-1
        ">
                            Descripción
                        </div>
                    </div>
                    <div>
                        <span id="CM_descripcion_error_message" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
                    </div>
                </div>

                <script>
                    document.getElementById('CM_descripcion' + '_textarea').addEventListener('focus', (event) => {
                        focusTextArea('CM_descripcion');
                    });

                    document.getElementById('CM_descripcion' + '_textarea').addEventListener('blur', (event) => {
                        blurTextArea('CM_descripcion');
                    });

                    document.getElementById('CM_descripcion' + '_label').addEventListener('click', (event) => {
                        document.getElementById('CM_descripcion' + '_textarea').focus();
                    });

                    document.getElementById('CM_descripcion' + '_textarea').addEventListener('input', (event) => {
                        clearTextAreaError('CM_descripcion');
                        focusTextArea('CM_descripcion');
                    });
                </script>
            </div>
            <div>
                <div class="w-full pl-2">
                    <div class="h-8 flex items-center relative w-full">
                        <input type="checkbox" id="CM_esprincipal_input_checkbox" value="1" class="
            w-4 h-4
            text-[#2F8BC7] bg-white
            border border-[#00000052] 
            rounded
            outline-8 focus:outline-8
            focus:border focus:ring-0 focus:ring-offset-0
        ">
                        <label for="CM_esprincipal_input_checkbox" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Es principal</label>
                    </div>
                    <div>
                        <span id="CM_esprincipal_error_message" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
                    </div>
                </div>
            </div>
            <div>
                <div x-init="init()" x-data="Components.listbox({ modelName: 'selected', open: false, id: 'CM_modulopadre', selectedIndex: 0, activeIndex: 0, items: [{&quot;id&quot;:-1,&quot;descripcion&quot;:&quot;--Seleccione--&quot;},{&quot;id&quot;:1,&quot;descripcion&quot;:&quot;Sistema&quot;,&quot;codigo&quot;:&quot;00001&quot;}] })">
                    <div class="relative h-8 w-full">
                        <button id="CM_modulopadre_select_native" type="button" x-ref="button" @click="onButtonClick()" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @keydown.escape="onEscape()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="false" class="relative flex items-center w-full h-8 cursor-default rounded border border-[#00000052] bg-white py-1.5 px-2 text-sm">
                            <span class="flex items-center">
                                <span x-ref="textSelect" x-text="selected.descripcion" class="block truncate">--Seleccione--</span>
                            </span>
                            <span x-ref="icon" class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2 text-[#00000052]">
                                <i class="fa-solid fa-chevron-down"></i>
                            </span>
                        </button>
                        <div x-ref="labelText" class="bg-white px-1.5 absolute text-xxs -top-2 left-1.5 text-[#5f6368]">
                            Padre
                        </div>
                        <div>
                            <ul x-show="open" class="absolute mt-1 max-h-56 w-full overflow-auto bg-white border border-[#00000052] text-sm" x-max="1" @click.away="onClickAway()" x-description="Select popover, show/hide based on select state." @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" style="display: none;">
                                <template x-for="(item, index) in items">
                                    <li x-bind:id="'listbox-option-' + index" role="option" x-on:click="choose(index)" @mouseenter="onMouseEnter($event)" x-on:mousemove="onMouseMove($event, index)" @mouseleave="onMouseLeave($event)" class="relative cursor-default select-none pl-3 pr-9 text-black" :class="{ 'text-white bg-[#2F8BC7]': activeIndex === index, 'text-black': !(activeIndex === index) }">
                                        <div class="flex items-center">
                                            <span x-text="item.descripcion" class="font-normal block truncate"></span>
                                        </div>
                                    </li>
                                </template>
                                <li x-bind:id="'listbox-option-' + index" role="option" x-on:click="choose(index)" @mouseenter="onMouseEnter($event)" x-on:mousemove="onMouseMove($event, index)" @mouseleave="onMouseLeave($event)" class="relative cursor-default select-none pl-3 pr-9 text-white bg-[#2F8BC7]" :class="{ 'text-white bg-[#2F8BC7]': activeIndex === index, 'text-black': !(activeIndex === index) }" id="listbox-option-0">
                                    <div class="flex items-center">
                                        <span x-text="item.descripcion" class="font-normal block truncate">--Seleccione--</span>
                                    </div>
                                </li>
                                <li x-bind:id="'listbox-option-' + index" role="option" x-on:click="choose(index)" @mouseenter="onMouseEnter($event)" x-on:mousemove="onMouseMove($event, index)" @mouseleave="onMouseLeave($event)" class="relative cursor-default select-none pl-3 pr-9 text-black" :class="{ 'text-white bg-[#2F8BC7]': activeIndex === index, 'text-black': !(activeIndex === index) }" id="listbox-option-1">
                                    <div class="flex items-center">
                                        <span x-text="item.descripcion" class="font-normal block truncate">Sistema</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <span x-ref="error" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="flex flex-row-reverse space-x-2 space-x-reverse">
        <div>
            <button type="button" onclick="crearModulo()" class="btn-accept">
                Aceptar
            </button>
        </div>
        <div>
            <button type="button" wire:click="$emit('closeModal')" class="btn-cancel">
                Cancelar
            </button>
        </div>
    </div>
</div>
<div class="grid grid-cols-3 gap-x-4 gap-y-4">
    <div>a</div>
    <div>b</div>
</div>
<input type="text" autofocus class="h-2 border-2 border-[#2F8BC7] ring-[#2F8BC7] gap-x-4 gap-y-4">
<input type="text" autofocus class="ring-[#d50000] w-4 h-4 text-[#2F8BC7] bg-white border border-[#00000052] rounded focus:ring-0 focus:ring-offset-0 ring-offset-0">

<div class="mt-8">a</div>

<div class="w-64 ml-8">
    {{--@include('layouts.style.input_checkbox',[
    'id'=>'CM_esprincipal',
    'labelText'=>'Es principal',
    ])--}}
</div>

<div class="w-64 hidden">
    @include('layouts.style.select_native',[
    'id'=>'CM_padre_modulo',
    'labelText'=>'Label',
    'data'=>$modulos
    ])
</div>



<br><br><br><br><br><br><br><br><br>
<!-- <div x-init="init()" x-data="Components.listbox({ modelName: 'selected', open: false, selectedIndex: 0, activeIndex: 0, items: [{'id':1,'name':'Wade Cooper','avatar':'https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'}] })">
    <label id="listbox-label" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">Assigned to</label>
    <div class="relative">
        <button type="button" class="relative w-full cursor-default rounded border border-gray-300 bg-white py-1.5 px-2 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
            <span class="flex items-center">
                <span x-text="selected.name" class="ml-3 block truncate">Tom Cook</span>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                <i class="fa-solid fa-chevron-down"></i>
            </span>
        </button>


        <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" x-max="1" @click.away="open = false" x-description="Select popover, show/hide based on select state." @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">

            <template x-for="(item, index) in items">

                <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-bind:id="'listbox-option-' + index" role="option" x-on:click="choose(index)" @mouseenter="onMouseEnter($event)" x-on:mousemove="onMouseMove($event, index)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === index, 'text-gray-900': !(activeIndex === index) }">
                    <div class="flex items-center">
                        <span x-text="item.name" x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === index, 'font-normal': !(selectedIndex === index) }"></span>
                    </div>
                </li>
            </template>

        </ul>

    </div>
</div>

<div x-init="init()" x-data="Components.listbox({ modelName: 'selected', open: false, selectedIndex: 3, activeIndex: 3, items: [{'id':1,'name':'Wade Cooper','avatar':'https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':2,'name':'Arlene Mccoy','avatar':'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':3,'name':'Devon Webb','avatar':'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.25&amp;w=256&amp;h=256&amp;q=80'},{'id':4,'name':'Tom Cook','avatar':'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':5,'name':'Tanya Fox','avatar':'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':6,'name':'Hellen Schmidt','avatar':'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':7,'name':'Caroline Schultz','avatar':'https://images.unsplash.com/photo-1568409938619-12e139227838?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':8,'name':'Mason Heaney','avatar':'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':9,'name':'Claudie Smitham','avatar':'https://images.unsplash.com/photo-1584486520270-19eca1efcce5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':10,'name':'Emil Schaefer','avatar':'https://images.unsplash.com/photo-1561505457-3bcad021f8ee?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'}] })">
    <label id="listbox-label" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">Assigned to</label>
    <div class="relative">
        <button type="button" class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
            <span class="flex items-center">
                <span x-text="selected.name" class="ml-3 block truncate">Tom Cook</span>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                <i class="fa-solid fa-chevron-down"></i>
            </span>
        </button>


        <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" x-max="1" @click.away="open = false" x-description="Select popover, show/hide based on select state." @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">

            <template x-for="(item, index) in items">

                <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-bind:id="'listbox-option-' + index" role="option" x-on:click="choose(index)" @mouseenter="onMouseEnter($event)" x-on:mousemove="onMouseMove($event, index)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === index, 'text-gray-900': !(activeIndex === index) }">
                    <div class="flex items-center">
                        <span x-text="item.name" x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === index, 'font-normal': !(selectedIndex === index) }"></span>
                    </div>
                </li>
            </template>

        </ul>

    </div>
</div> -->



<!-- <script>
    function useTrackedPointer() {
        let e = [-1, -1];
        return {
            wasMoved(t) {
                let n = [t.screenX, t.screenY];
                return (e[0] !== n[0] || e[1] !== n[1]) && (e = n, true)
            },
            update(t) {
                e = [t.screenX, t.screenY]
            }
        }
    }
    window.Components = {};
    window.Components.listbox = function(e) {
        let t = e.modelName || "selected",
            n = useTrackedPointer();
        return {
            init() {
                this.optionCount = this.$refs.listbox.children.length;
                this.$watch("activeIndex", (e => {
                    this.open && (
                        null !== this.activeIndex ? this.activeDescendant = this.$refs.listbox.children[this.activeIndex + 1 /*+1 para no tomar a la etiqueta template como primer hijo*/ ].id : this.activeDescendant = ""
                    )
                }))
                console.log(this.activeIndex);
            },
            activeDescendant: null,
            optionCount: null,
            open: false,
            activeIndex: null,
            selectedIndex: 0,
            get active() {
                return this.items[this.activeIndex];
            },
            get [t]() {
                return this.items[this.selectedIndex];
            },
            choose(e) {
                this.selectedIndex = e;
                this.open = false;
            },
            onButtonClick() {
                this.open || (
                    this.activeIndex = this.selectedIndex,
                    this.open = true,
                    this.$nextTick((() => {
                        this.$refs.listbox.focus();
                        this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                            block: "nearest"
                        });
                    }))
                )
            },
            onOptionSelect() {
                null !== this.activeIndex && (this.selectedIndex = this.activeIndex);
                this.open = false;
                this.$refs.button.focus();
            },
            onEscape() {
                this.open = false;
                this.$refs.button.focus();
            },
            onArrowUp() {
                this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1;
                this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                    block: "nearest"
                });
            },
            onArrowDown() {
                this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1;
                this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                    block: "nearest"
                });
            },
            onMouseEnter(e) {
                n.update(e);
            },
            onMouseMove(e, t) {
                n.wasMoved(e) && (this.activeIndex = t);
            },
            onMouseLeave(e) {
                n.wasMoved(e) && (this.activeIndex = null);
            },
            ...e
        }
    }
</script> -->

<br><br><br>
<!-- <div x-data="Components.listbox({ modelName: 'selected', open: false, selectedIndex: 3, activeIndex: 3, items: [{'id':1,'name':'Wade Cooper','avatar':'https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':2,'name':'Arlene Mccoy','avatar':'https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':3,'name':'Devon Webb','avatar':'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.25&amp;w=256&amp;h=256&amp;q=80'},{'id':4,'name':'Tom Cook','avatar':'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':5,'name':'Tanya Fox','avatar':'https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':6,'name':'Hellen Schmidt','avatar':'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':7,'name':'Caroline Schultz','avatar':'https://images.unsplash.com/photo-1568409938619-12e139227838?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':8,'name':'Mason Heaney','avatar':'https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':9,'name':'Claudie Smitham','avatar':'https://images.unsplash.com/photo-1584486520270-19eca1efcce5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'},{'id':10,'name':'Emil Schaefer','avatar':'https://images.unsplash.com/photo-1561505457-3bcad021f8ee?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'}] })" x-init="init()">
    <label id="listbox-label" class="block text-sm font-medium text-gray-700" @click="$refs.button.focus()">Assigned to</label>
    <div class="relative mt-1">
        <button type="button" class="relative w-full cursor-default rounded-md border border-gray-300 bg-white py-2 pl-3 pr-10 text-left shadow-sm focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 sm:text-sm" x-ref="button" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @click="onButtonClick()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true">
            <span class="flex items-center">
                <img :src="selected.avatar" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                <span x-text="selected.name" class="ml-3 block truncate">Tom Cook</span>
            </span>
            <span class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2">
                <svg class="h-5 w-5 text-gray-400" x-description="Heroicon name: mini/chevron-up-down" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                    <path fill-rule="evenodd" d="M10 3a.75.75 0 01.55.24l3.25 3.5a.75.75 0 11-1.1 1.02L10 4.852 7.3 7.76a.75.75 0 01-1.1-1.02l3.25-3.5A.75.75 0 0110 3zm-3.76 9.2a.75.75 0 011.06.04l2.7 2.908 2.7-2.908a.75.75 0 111.1 1.02l-3.25 3.5a.75.75 0 01-1.1 0l-3.25-3.5a.75.75 0 01.04-1.06z" clip-rule="evenodd"></path>
                </svg>
            </span>
        </button>


        <ul x-show="open" x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute z-10 mt-1 max-h-56 w-full overflow-auto rounded-md bg-white py-1 text-base shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none sm:text-sm" x-max="1" @click.away="open = false" x-description="Select popover, show/hide based on select state." @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">


            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-0" role="option" @click="choose(0)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 0)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 0, 'text-gray-900': !(activeIndex === 0) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 0, 'font-normal': !(selectedIndex === 0) }">Wade Cooper</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 0, 'text-indigo-600': !(activeIndex === 0) }" x-show="selectedIndex === 0" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-1" role="option" @click="choose(1)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 1)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 1, 'text-gray-900': !(activeIndex === 1) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 1, 'font-normal': !(selectedIndex === 1) }">Arlene Mccoy</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 1, 'text-indigo-600': !(activeIndex === 1) }" x-show="selectedIndex === 1" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-2" role="option" @click="choose(2)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 2)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 2, 'text-gray-900': !(activeIndex === 2) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.25&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 2, 'font-normal': !(selectedIndex === 2) }">Devon Webb</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 2, 'text-indigo-600': !(activeIndex === 2) }" x-show="selectedIndex === 2" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-3" role="option" @click="choose(3)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 3)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 3, 'text-gray-900': !(activeIndex === 3) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="ml-3 block truncate font-semibold" :class="{ 'font-semibold': selectedIndex === 3, 'font-normal': !(selectedIndex === 3) }">Tom Cook</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 3, 'text-indigo-600': !(activeIndex === 3) }" x-show="selectedIndex === 3">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-4" role="option" @click="choose(4)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 4)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 4, 'text-gray-900': !(activeIndex === 4) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 4, 'font-normal': !(selectedIndex === 4) }">Tanya Fox</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 4, 'text-indigo-600': !(activeIndex === 4) }" x-show="selectedIndex === 4" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-5" role="option" @click="choose(5)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 5)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 5, 'text-gray-900': !(activeIndex === 5) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 5, 'font-normal': !(selectedIndex === 5) }">Hellen Schmidt</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 5, 'text-indigo-600': !(activeIndex === 5) }" x-show="selectedIndex === 5" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-6" role="option" @click="choose(6)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 6)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 6, 'text-gray-900': !(activeIndex === 6) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1568409938619-12e139227838?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 6, 'font-normal': !(selectedIndex === 6) }">Caroline Schultz</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 6, 'text-indigo-600': !(activeIndex === 6) }" x-show="selectedIndex === 6" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="relative cursor-default select-none py-2 pl-3 pr-9 text-gray-900" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-7" role="option" @click="choose(7)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 7)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 7, 'text-gray-900': !(activeIndex === 7) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 7, 'font-normal': !(selectedIndex === 7) }">Mason Heaney</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" :class="{ 'text-white': activeIndex === 7, 'text-indigo-600': !(activeIndex === 7) }" x-show="selectedIndex === 7" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-8" role="option" @click="choose(8)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 8)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 8, 'text-gray-900': !(activeIndex === 8) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1584486520270-19eca1efcce5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 8, 'font-normal': !(selectedIndex === 8) }">Claudie Smitham</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4" :class="{ 'text-white': activeIndex === 8, 'text-indigo-600': !(activeIndex === 8) }" x-show="selectedIndex === 8" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

            <li x-state:on="Highlighted" x-state:off="Not Highlighted" class="text-gray-900 relative cursor-default select-none py-2 pl-3 pr-9" x-description="Select option, manage highlight styles based on mouseenter/mouseleave and keyboard navigation." id="listbox-option-9" role="option" @click="choose(9)" @mouseenter="onMouseEnter($event)" @mousemove="onMouseMove($event, 9)" @mouseleave="onMouseLeave($event)" :class="{ 'text-white bg-indigo-600': activeIndex === 9, 'text-gray-900': !(activeIndex === 9) }">
                <div class="flex items-center">
                    <img src="https://images.unsplash.com/photo-1561505457-3bcad021f8ee?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="h-6 w-6 flex-shrink-0 rounded-full">
                    <span x-state:on="Selected" x-state:off="Not Selected" class="font-normal ml-3 block truncate" :class="{ 'font-semibold': selectedIndex === 9, 'font-normal': !(selectedIndex === 9) }">Emil Schaefer</span>
                </div>

                <span x-description="Checkmark, only display for selected option." x-state:on="Highlighted" x-state:off="Not Highlighted" class="text-indigo-600 absolute inset-y-0 right-0 flex items-center pr-4" :class="{ 'text-white': activeIndex === 9, 'text-indigo-600': !(activeIndex === 9) }" x-show="selectedIndex === 9" style="display: none;">
                    <svg class="h-5 w-5" x-description="Heroicon name: mini/check" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M16.704 4.153a.75.75 0 01.143 1.052l-8 10.5a.75.75 0 01-1.127.075l-4.5-4.5a.75.75 0 011.06-1.06l3.894 3.893 7.48-9.817a.75.75 0 011.05-.143z" clip-rule="evenodd"></path>
                    </svg>
                </span>
            </li>

        </ul>

    </div>
</div>

<script>
    function useTrackedPointer() {
        let e = [-1, -1];
        return {
            wasMoved(t) {
                let n = [t.screenX, t.screenY];
                return (e[0] !== n[0] || e[1] !== n[1]) && (e = n, true)
            },
            update(t) {
                e = [t.screenX, t.screenY]
            }
        }
    }
    window.Components = {};
    window.Components.listbox = function(e) {
        let t = e.modelName || "selected",
            n = useTrackedPointer();
        return {
            init() {
                this.optionCount = this.$refs.listbox.children.length;
                this.$watch("activeIndex", (e => {
                    this.open && (
                        null !== this.activeIndex ? this.activeDescendant = this.$refs.listbox.children[this.activeIndex].id : this.activeDescendant = ""
                    )
                }))
            },
            activeDescendant: null,
            optionCount: null,
            open: false,
            activeIndex: null,
            selectedIndex: 0,
            get active() {
                return this.items[this.activeIndex];
            },
            get [t]() {
                return this.items[this.selectedIndex];
            },
            choose(e) {
                this.selectedIndex = e;
                this.open = false;
            },
            onButtonClick() {
                this.open || (
                    this.activeIndex = this.selectedIndex,
                    this.open = true,
                    this.$nextTick((() => {
                        this.$refs.listbox.focus();
                        this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                            block: "nearest"
                        });
                    }))
                )
            },
            onOptionSelect() {
                null !== this.activeIndex && (this.selectedIndex = this.activeIndex);
                this.open = false;
                this.$refs.button.focus();
            },
            onEscape() {
                this.open = false;
                this.$refs.button.focus();
            },
            onArrowUp() {
                this.activeIndex = this.activeIndex - 1 < 0 ? this.optionCount - 1 : this.activeIndex - 1;
                this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                    block: "nearest"
                });
            },
            onArrowDown() {
                this.activeIndex = this.activeIndex + 1 > this.optionCount - 1 ? 0 : this.activeIndex + 1;
                this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                    block: "nearest"
                });
            },
            onMouseEnter(e) {
                n.update(e);
            },
            onMouseMove(e, t) {
                n.wasMoved(e) && (this.activeIndex = t);
            },
            onMouseLeave(e) {
                n.wasMoved(e) && (this.activeIndex = null);
            },
            ...e
        }
    }
</script> -->

<br><br><br>

<!-- <div class="bg-gray-100 text-gray-900 antialiased font-sans">
    <div class="px-8 py-16 flex justify-center bg-gray-100" style="min-height: 600px;">
        <div class="w-full max-w-xs mx-auto">
            <div class="space-y-1" x-data="Components.customSelect({ open: true, value: 4, selected: 4 })" x-init="init()">
                <label id="assigned-to-label" class="block text-sm leading-5 font-medium text-gray-700">Assigned to</label>
                <div class="relative">
                    <span class="inline-block w-full rounded-md shadow-sm">
                        <button x-ref="button" @click="onButtonClick()" type="button" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="assigned-to-label" class="cursor-default relative w-full rounded-md border border-gray-300 bg-white pl-3 pr-10 py-2 text-left focus:outline-none focus:shadow-outline-blue focus:border-blue-300 transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                            <div class="flex items-center space-x-3">
                                <img :src="['https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.25&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1568409938619-12e139227838?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1584486520270-19eca1efcce5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80','https://images.unsplash.com/photo-1561505457-3bcad021f8ee?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80'][value - 1]" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                <span x-text="['Wade Cooper', 'Arlene Mccoy', 'Devon Webb', 'Tom Cook', 'Tanya Fox','Hellen Schmidt','Caroline Schultz','Mason Heaney','Claudie Smitham','Emil Schaefer'][value - 1]" class="block truncate">Tom Cook</span>
                            </div>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-2 pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M10 3a1 1 0 01.707.293l3 3a1 1 0 01-1.414 1.414L10 5.414 7.707 7.707a1 1 0 01-1.414-1.414l3-3A1 1 0 0110 3zm-3.707 9.293a1 1 0 011.414 0L10 14.586l2.293-2.293a1 1 0 011.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                </svg>
                            </span>
                        </button>
                    </span>
                    <div x-show="open" @focusout="onEscape()" @click.away="open = false" x-description="Select popover, show/hide based on select state." x-transition:leave="transition ease-in duration-100" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="absolute mt-1 w-full rounded-md bg-white shadow-lg" style="display: none;">
                        <ul @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="assigned-to-label" :aria-activedescendant="activeDescendant" class="max-h-56 rounded-md py-1 text-base leading-6 shadow-xs overflow-auto focus:outline-none sm:text-sm sm:leading-5">
                            <li id="assigned-to-option-1" role="option" @click="choose(1)" @mouseenter="selected = 1" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 1, 'text-gray-900': !(selected === 1) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 1, 'font-normal': !(value === 1) }" class="font-normal block truncate">
                                        Wade Cooper
                                    </span>
                                </div>
                                <span x-show="value === 1" :class="{ 'text-white': selected === 1, 'text-indigo-600': !(selected === 1) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-2" role="option" @click="choose(2)" @mouseenter="selected = 2" @mouseleave="selected = null" aria-selected="true" :class="{ 'text-white bg-indigo-600': selected === 2, 'text-gray-900': !(selected === 2) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 2, 'font-normal': !(value === 2) }" class="font-normal block truncate">
                                        Arlene Mccoy
                                    </span>
                                </div>
                                <span x-show="value === 2" :class="{ 'text-white': selected === 2, 'text-indigo-600': !(selected === 2) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-3" role="option" @click="choose(3)" @mouseenter="selected = 3" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 3, 'text-gray-900': !(selected === 3) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2.25&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 3, 'font-normal': !(value === 3) }" class="font-normal block truncate">
                                        Devon Webb
                                    </span>
                                </div>
                                <span x-show="value === 3" :class="{ 'text-white': selected === 3, 'text-indigo-600': !(selected === 3) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-4" role="option" @click="choose(4)" @mouseenter="selected = 4" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 4, 'text-gray-900': !(selected === 4) }" class="bg-indigo-600 text-white cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 4, 'font-normal': !(value === 4) }" class="font-semibold block truncate">
                                        Tom Cook
                                    </span>
                                </div>
                                <span x-show="value === 4" :class="{ 'text-white': selected === 4, 'text-indigo-600': !(selected === 4) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-white">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-5" role="option" @click="choose(5)" @mouseenter="selected = 5" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 5, 'text-gray-900': !(selected === 5) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 5, 'font-normal': !(value === 5) }" class="font-normal block truncate">
                                        Tanya Fox
                                    </span>
                                </div>
                                <span x-show="value === 5" :class="{ 'text-white': selected === 5, 'text-indigo-600': !(selected === 5) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-6" role="option" @click="choose(6)" @mouseenter="selected = 6" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 6, 'text-gray-900': !(selected === 6) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 6, 'font-normal': !(value === 6) }" class="font-normal block truncate">
                                        Hellen Schmidt
                                    </span>
                                </div>
                                <span x-show="value === 6" :class="{ 'text-white': selected === 6, 'text-indigo-600': !(selected === 6) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-7" role="option" @click="choose(7)" @mouseenter="selected = 7" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 7, 'text-gray-900': !(selected === 7) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1568409938619-12e139227838?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 7, 'font-normal': !(value === 7) }" class="font-normal block truncate">
                                        Caroline Schultz
                                    </span>
                                </div>
                                <span x-show="value === 7" :class="{ 'text-white': selected === 7, 'text-indigo-600': !(selected === 7) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-8" role="option" @click="choose(8)" @mouseenter="selected = 8" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 8, 'text-gray-900': !(selected === 8) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1531427186611-ecfd6d936c79?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 8, 'font-normal': !(value === 8) }" class="font-normal block truncate">
                                        Mason Heaney
                                    </span>
                                </div>
                                <span x-show="value === 8" :class="{ 'text-white': selected === 8, 'text-indigo-600': !(selected === 8) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-9" role="option" @click="choose(9)" @mouseenter="selected = 9" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 9, 'text-gray-900': !(selected === 9) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1584486520270-19eca1efcce5?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 9, 'font-normal': !(value === 9) }" class="font-normal block truncate">
                                        Claudie Smitham
                                    </span>
                                </div>
                                <span x-show="value === 9" :class="{ 'text-white': selected === 9, 'text-indigo-600': !(selected === 9) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                            <li id="assigned-to-option-10" role="option" @click="choose(10)" @mouseenter="selected = 10" @mouseleave="selected = null" :class="{ 'text-white bg-indigo-600': selected === 10, 'text-gray-900': !(selected === 10) }" class="text-gray-900 cursor-default select-none relative py-2 pl-4 pr-9">
                                <div class="flex items-center space-x-3">
                                    <img src="https://images.unsplash.com/photo-1561505457-3bcad021f8ee?ixlib=rb-1.2.1&amp;ixid=eyJhcHBfaWQiOjEyMDd9&amp;auto=format&amp;fit=facearea&amp;facepad=2&amp;w=256&amp;h=256&amp;q=80" alt="" class="flex-shrink-0 h-6 w-6 rounded-full">
                                    <span :class="{ 'font-semibold': value === 10, 'font-normal': !(value === 10) }" class="font-normal block truncate">
                                        Emil Schaefer
                                    </span>
                                </div>
                                <span x-show="value === 10" :class="{ 'text-white': selected === 10, 'text-indigo-600': !(selected === 10) }" class="absolute inset-y-0 right-0 flex items-center pr-4 text-indigo-600" style="display: none;">
                                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    window.Components = {
        customSelect(options) {
            return {
                init() {
                    this.$refs.listbox.focus();
                    this.optionCount = this.$refs.listbox.children.length;
                    this.$watch('selected', value => {
                        if (!this.open) return;

                        if (this.selected === null) {
                            this.activeDescendant = ''
                            return;
                        }

                        this.activeDescendant = this.$refs.listbox.children[this.selected - 1].id;
                    });
                },
                activeDescendant: null,
                optionCount: null,
                open: false,
                selected: null,
                value: 1,
                choose(option) {
                    this.value = option
                    this.open = false
                },
                onButtonClick() {
                    if (this.open) return
                    this.selected = this.value
                    this.open = true
                    this.$nextTick(() => {
                        this.$refs.listbox.focus()
                        this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                            block: 'nearest'
                        })
                    })
                },
                onOptionSelect() {
                    if (this.selected !== null) {
                        this.value = this.selected
                    }
                    this.open = false
                    this.$refs.button.focus()
                },
                onEscape() {
                    this.open = false
                    this.$refs.button.focus()
                },
                onArrowUp() {
                    this.selected = this.selected - 1 < 1 ? this.optionCount : this.selected - 1
                    this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                        block: 'nearest'
                    })
                },
                onArrowDown() {
                    this.selected = this.selected + 1 > this.optionCount ? 1 : this.selected + 1
                    this.$refs.listbox.children[this.selected - 1].scrollIntoView({
                        block: 'nearest'
                    })
                },
                ...options,
            }
        },
    }
</script> -->

<br><br><br>


<br><br><br>


<div id="gara" class="pl-8">
    <select>
        <option value="1">Sistema</option>
        <option value="2">Módulo</option>
        <option value="3">Usuario</option>
        <option value="4">Artículos</option>
    </select>
</div>

<script>
    /* setSelectStyle({
        id: 'gara',
        width: 'w-full',
        labelText: 'Padre',
    }); */
</script>

<!-- <div id="idtest" class="pl-8">
    <div class="w-44 ">
        <div class="h-8 relative">
            <select id="selectid" class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#00000052] focus:border-1 focus:border-[#2F8BC7] focus:ring-1 focus:ring-[#2F8BC7]">
                <option disabled></option>
                <option value="1" selected>Sistema</option>
                <option value="2">Módulo</option>
                <option value="3">Usuario</option>
                <option value="4">Artículos</option>
            </select>
            <div id="" class="absolute bg-white text-xxs text-[#2F8BC7] px-1.5 -top-2 left-1.5">Padre</div>
        </div>
        <div><span id="" class=" text-[#d50000] text-xs pl-2">erqrqrwq</span></div>
    </div>
</div> -->

<!-- <div id="CM_padre_modulo" class="pl-8">
    <div class="w-44 relative">
        <div class="h-8">
            <select class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#00000052] focus:border-1 focus:border-[#2F8BC7] focus:ring-1 focus:ring-[#2F8BC7]">
                <option disabled selected></option>
                <option value="1">Sistema</option>
                <option value="2">Módulo</option>
                <option value="3">Usuario</option>
                <option value="4">Artículos</option>
            </select>
            <div id="" class="absolute bg-white text-sm text-[#2F8BC7] px-1.5 top-1.5 left-1">Padre</div>
        </div>
        <div><span id="" class="hidden text-[#d50000] text-xs pl-2"></span></div>
    </div>
</div> -->

<!-- <div class="pl-8">
    <div id="CM_padre_modulo">

        <div>
            <select class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#00000052] focus:border-1 focus:border-[#2F8BC7] focus:ring-1 focus:ring-[#2F8BC7]">
                <option selected>-- Seleccione --</option>
                <option value="1">Sistema</option>
                <option value="2">Módulo</option>
                <option value="3">Usuario</option>
                <option value="4">Artículos</option>
            </select>
        </div>

        <div id="" class="bg-white text-sm px-1.5 absolute top-1.5 left-1 text-[#5f6368]">Padre</div>

    </div>
</div> -->


<br><br><br><br><br><br><br>

<div>
    <textarea name="" id="" cols="30" rows="10">a</textarea>
</div>

<div id="textareaid"></div>

<script>
    setTextAreaStyle({
        id: 'textareaid',
        width: 'w-full',
        labelText: 'Nombre',
        rows: 2,
        cols: 20,
    });
</script>

<br><br><br><br><br><br><br>

<textarea name="" id="" cols="20" rows="10">q</textarea>

<br><br><br><br><br><br><br>

<button type="button" class="bg-[#d54e0c] py-2 text-sm text-white font-semibold h-9 px-4 rounded-lg flex items-center pointer-events-auto">
    <i class="fa-solid fa-plus"></i>&nbsp;NUEVO MÓDULO
</button>

<br><br><br><br><br><br><br>

<div class="pl-8">
    <div>
        STYLE INPUT TEXT DEFAULT
    </div>
    <div id="input_default">
        <div class="w-44">
            <div class="h-8 relative">
                <input type="text" id="" class="h-full w-full px-2 py-1.5  text-sm rounded border-1 focus:border-1 border-[#00000052] focus:border-[#00000052] focus:ring-0 focus:ring-[#00000052]">
                <div id="" class="bg-white text-sm px-1.5 absolute top-1.5 left-1 text-[#5f6368]">Nombre</div>
            </div>
            <div><span id="" class="hidden text-[#d50000] text-xs pl-2"></span></div>
        </div>
    </div>
</div>

<div class="pl-8">
    <div>
        STYLE INPUT TEXT FOCUS
    </div>
    <div id="input_default">
        <div class="w-44">
            <div class="h-8 relative">
                <input autofocus value="Hola amigo mío" type="text" id="" class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#00000052] focus:border-1 focus:border-[#2F8BC7] focus:ring-1 focus:ring-[#2F8BC7]">
                <div id="" class=" bg-white text-sm text-[#2F8BC7] px-1.5 absolute top-1.5 left-1 scale-75 -translate-y-4 -translate-x-2">Nombre</div>
            </div>
            <div><span id="" class="hidden text-[#d50000] text-xs pl-2"></span></div>
        </div>
    </div>
</div>

<div class="pl-8">
    <div>
        STYLE INPUT ERROR DEFAULT
    </div>
    <div id="input_default">
        <div class="w-44">
            <div class="h-8 relative">
                <input type="text" id="" class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#d50000] focus:border-1 focus:border-[#d50000] focus:ring-0">
                <div id="" class="bg-white text-sm text-[#d50000] px-1.5 absolute top-1.5 left-1 ">Nombre</div>
            </div>
            <div><span id="" class="text-[#d50000] text-xs pl-2">error message</span></div>
        </div>
    </div>
</div>

<div class="pl-8">
    <div>
        STYLE INPUT ERROR FOCUS
    </div>
    <div id="input_default">
        <div class="w-44">
            <div class="h-8 relative">
                <input value="Hola amigo mío" type="text" id="" class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#d50000] focus:border-1 focus:border-[#d50000] focus:ring-1 focus:ring-[#d50000]">
                <div id="" class="bg-white text-sm text-[#d50000] px-1.5 absolute top-1.5 left-1 scale-75 -translate-y-4 -translate-x-2">Nombre</div>
            </div>
            <div><span id="" class="text-[#d50000] text-xs pl-2">error message</span></div>
        </div>
    </div>
</div>

<div class="pl-8">
    <div>
        STYLE INPUT TEXT FOCUS
    </div>
    <div id="input_default">
        <div class="w-44 relative">
            <div class="h-8">
                <input autofocus value="Hola amigo mío" type="text" id="" class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#00000052] focus:border-1 focus:border-[#2F8BC7] focus:ring-1 focus:ring-[#2F8BC7]">
                <div id="" class="absolute bg-white text-xxs text-[#2F8BC7] px-1.5 -top-2 left-1.5">URL</div>
            </div>
            <div><span id="" class="hidden text-[#d50000] text-xs pl-2"></span></div>
        </div>
    </div>
</div>
<div class="-top-1.5"></div>
<div class="pl-8">
    <div>
        STYLE INPUT TEXT FOCUS
    </div>
    <div id="input_default">
        <div class="w-44 relative">
            <div class="h-8">
                <input type="text" id="" class="h-full w-full px-2 py-1.5 text-sm rounded border-1 border-[#00000052] focus:border-1 focus:border-[#2F8BC7] focus:ring-1 focus:ring-[#2F8BC7]">
                <div id="" class="absolute bg-white text-sm text-[#2F8BC7] px-1.5 top-1.5 left-1">URL</div>
            </div>
            <div><span id="" class="hidden text-[#d50000] text-xs pl-2"></span></div>
        </div>
    </div>
</div>


<!-- <script>
    function setInputStyle(object) {
        if (object.type === undefined) {
            object.type = 'text';
        }

        if (object.type !== 'text') {
            console.log(object.id + ' (type="' + object.type + '") no soportado');
            return;
        }

        document.getElementById(object.id).replaceChildren();

        var div1 = document.createElement('div');
        div1.classList.add(object.width);

        var div11 = document.createElement('div');
        div11.classList.add('h-8', 'relative');

        var input = document.createElement('input');
        input.setAttribute('type', object.type);
        input.setAttribute('id', object.id + '_input');
        input.classList.add('h-full', 'w-full', 'px-2', 'py-1.5', 'border-1', 'border-[#202124]', 'text-sm', 'rounded', 'focus:border-[#2F8BC7]', 'focus:ring-[#2F8BC7]');

        var label = document.createElement('div');
        label.setAttribute('id', object.id + '_label');
        label.classList.add('bg-white', 'text-sm', 'px-1.5', 'absolute', 'top-1.5', 'left-1', 'scale-75', '-translate-y-4', '-translate-x-2', 'transform-none');
        label.innerHTML = object.labelText;

        div11.appendChild(input);
        div11.appendChild(label);

        var div12 = document.createElement('div');

        var error_message = document.createElement('span');
        error_message.setAttribute('id', object.id + '_error_message');
        error_message.classList.add('hidden', 'text-[#d50000]', 'text-xs', 'pl-2');

        div12.appendChild(error_message);

        div1.appendChild(div11);
        div1.appendChild(div12);

        document.getElementById(object.id).appendChild(div1);

        input.addEventListener('focus', (event) => {
            if (!input.classList.contains('error')) {
                label.classList.add('text-[#2F8BC7]');
            }
            label.classList.remove('transform-none');
        });

        input.addEventListener('blur', (event) => {
            label.classList.remove('text-[#2F8BC7]');
            var text = input.value;
            if (text === '') {
                label.classList.add('transform-none');
            }
        });

        label.addEventListener('click', (event) => {
            input.focus();
        });

        input.addEventListener('input', (event) => {
            clearInputError(object.id);
            label.classList.add('text-[#2F8BC7]');
        });
    }

    function setInputError(id, text) {
        document.getElementById(id + '_input').classList.add('error', 'border-[#d50000]', 'focus:border-[#d50000]', 'focus:ring-[#d50000]');
        document.getElementById(id + '_label').classList.add('text-[#d50000]');

        document.getElementById(id + '_error_message').innerHTML = text;
        document.getElementById(id + '_error_message').classList.remove('hidden');
    }

    function clearInputError(id) {
        document.getElementById(id + '_input').classList.remove('error', 'border-[#d50000]', 'focus:border-[#d50000]', 'focus:ring-[#d50000]');
        document.getElementById(id + '_label').classList.remove('text-[#d50000]');

        document.getElementById(id + '_error_message').innerHTML = ''
        document.getElementById(id + '_error_message').classList.add('hidden');
    }

    function getInputValue(id) {
        return document.getElementById(id + '_input').value
    }

    function setInputValue(id, text = '') {
        var input = document.getElementById(id + '_input');
        input.value = text;
    }
</script>

<script>
    setInputStyle({
        id: 'input1',
        width: 'w-44',
        labelText: 'Nombre',
    });
</script> -->
@endsection