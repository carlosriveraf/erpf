<div x-init="init()" x-data="Components.listbox({ modelName: 'selected', open: false, id: '{{ $id }}', selectedIndex: 0, activeIndex: 0, items: {{ $data }} })">
    <div class="relative h-8 w-full">
        <button id="{{ $id . '_select_native' }}" type="button" x-ref="button" @click="onButtonClick()" @keydown.arrow-up.stop.prevent="onButtonClick()" @keydown.arrow-down.stop.prevent="onButtonClick()" @keydown.escape="onEscape()" aria-haspopup="listbox" :aria-expanded="open" aria-labelledby="listbox-label" aria-expanded="true" class="relative flex items-center w-full h-8 cursor-default rounded border border-[#00000052] bg-white py-1.5 px-2 text-sm">
            <span class="flex items-center">
                <span x-ref="textSelect" x-text="selected.descripcion" class="block truncate"></span>
            </span>
            <span x-ref="icon" class="pointer-events-none absolute inset-y-0 right-0 ml-3 flex items-center pr-2 text-[#00000052]">
                <i class="fa-solid fa-chevron-down"></i>
            </span>
        </button>
        <div x-ref="labelText" class="bg-white px-1.5 absolute text-xxs -top-2 left-1.5 text-[#5f6368]">
            {{ $labelText }}
        </div>
        <div>
            <ul x-show="open" class="absolute mt-1 max-h-56 w-full overflow-auto bg-white border border-[#00000052] text-sm" x-max="1" @click.away="onClickAway()" x-description="Select popover, show/hide based on select state." @keydown.enter.stop.prevent="onOptionSelect()" @keydown.space.stop.prevent="onOptionSelect()" @keydown.escape="onEscape()" @keydown.arrow-up.prevent="onArrowUp()" @keydown.arrow-down.prevent="onArrowDown()" x-ref="listbox" tabindex="-1" role="listbox" aria-labelledby="listbox-label" :aria-activedescendant="activeDescendant" aria-activedescendant="">
                <template x-for="(item, index) in items">
                    <li x-bind:id="'listbox-option-' + index" role="option" x-on:click="choose(index)" @mouseenter="onMouseEnter($event)" x-on:mousemove="onMouseMove($event, index)" @mouseleave="onMouseLeave($event)" class="relative cursor-default select-none pl-3 pr-9 text-black" :class="{ 'text-white bg-[#2F8BC7]': activeIndex === index, 'text-black': !(activeIndex === index) }">
                        <div class="flex items-center">
                            <span x-text="item.descripcion" class="font-normal block truncate"></span>
                        </div>
                    </li>
                </template>
            </ul>
        </div>
    </div>
    <div>
        <span x-ref="error" class="hidden text-[#d50000] text-xs pl-2"></span>
    </div>
</div>
