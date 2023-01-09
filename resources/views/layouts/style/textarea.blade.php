<div class="w-full">
    <div class="relative">
        <textarea rows="2" cols="20" id="{{$id.'_textarea'}}" class="
            h-full w-full
            px-2 py-1.5
            text-sm
            rounded
            border border-[#00000052]
            focus:border focus:border-[#00000052]
            focus:ring-1 focus:ring-[#00000052]
        "></textarea>
        <div id="{{$id.'_label'}}" class="
            bg-white
            px-1.5
            text-sm text-[#5f6368]
            absolute top-1.5 left-1
        ">
            {{$labelText}}
        </div>
    </div>
    <div>
        <span id="{{$id.'_error_message'}}" class="
            hidden
            text-[#d50000] text-xs
            pl-2
        "></span>
    </div>
</div>

<script>
    document.getElementById('{{$id}}' + '_textarea').addEventListener('focus', (event) => {
        focusTextArea('{{$id}}');
    });

    document.getElementById('{{$id}}' + '_textarea').addEventListener('blur', (event) => {
        blurTextArea('{{$id}}');
    });

    document.getElementById('{{$id}}' + '_label').addEventListener('click', (event) => {
        document.getElementById('{{$id}}' + '_textarea').focus();
    });

    document.getElementById('{{$id}}' + '_textarea').addEventListener('input', (event) => {
        clearTextAreaError('{{$id}}');
        focusTextArea('{{$id}}');
    });
</script>