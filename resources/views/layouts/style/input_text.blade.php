<div class="w-full">
    <div class="h-8 relative">
        <input type="text" id="{{$id.'_input_text'}}" class="
            h-full w-full
            px-2 py-1.5
            text-sm
            rounded
            border border-[#00000052]
            focus:border focus:border-[#00000052]
            focus:ring-1 focus:ring-[#00000052]
        ">
        <div id="{{$id.'_label'}}" class="
            bg-white
            px-1.5
            text-sm text-[#5f6368]
            absolute top-1.5 left-1
        ">{{$labelText}}</div>
    </div>
    <div>
        <span id="{{$id.'_error_message'}}" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
    </div>
</div>

{{--
<button onclick="setInputTextError('{{$id}}','test message')">|error</button>
<button onclick="clearInputTextError('{{$id}}')">|no error</button>
<button onclick="console.log(getInputTextValue('{{$id}}'))">|get value</button>
<button onclick="setInputTextValue('{{$id}}','setting value')">|set value</button>
--}}

<script>
    document.getElementById('{{$id}}' + '_input_text').addEventListener('focus', (event) => {
        focusInputText('{{$id}}');
    });

    document.getElementById('{{$id}}' + '_input_text').addEventListener('blur', (event) => {
        blurInputText('{{$id}}');
    });

    document.getElementById('{{$id}}' + '_label').addEventListener('click', (event) => {
        document.getElementById('{{$id}}' + '_input_text').focus();
    });

    document.getElementById('{{$id}}' + '_input_text').addEventListener('input', (event) => {
        clearInputTextError('{{$id}}');
        focusInputText('{{$id}}');
    });
</script>