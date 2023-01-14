<div class="w-full pl-2">
    <div class="h-8 flex items-center relative w-full">
        <input type="checkbox" id="{{ $id . '_input_checkbox' }}" value="{{ $value }}" class="
            w-4 h-4
            text-[#2F8BC7] bg-white
            border border-[#00000052] 
            rounded
            outline-8 focus:outline-8
            focus:border focus:ring-0 focus:ring-offset-0
        ">
        <label for="{{ $id . '_input_checkbox' }}" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $labelText }}</label>
    </div>
    <div>
        <span id="{{ $id . '_error_message' }}" class="hidden text-[#d50000] text-xs pl-2"></span>
    </div>
</div>
