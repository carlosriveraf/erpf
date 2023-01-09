function spinner() {

}

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

window.Components.listbox = function (e) {
    let t = e.modelName || "selected";
    let n = useTrackedPointer();
    config = {
        init() {
            this.optionCount = this.$refs.listbox.children.length;
            this.id = e.id;
            this.$watch("activeIndex", (e => {
                this.open && (
                    null !== this.activeIndex ? this.activeDescendant = this.$refs.listbox.children[this.activeIndex + 1 /*+1 para no tomar a la etiqueta template como primer hijo*/].id : this.activeDescendant = ""
                )
            }));
        },
        activeDescendant: null,
        optionCount: null,
        open: false,
        activeIndex: null,
        selectedIndex: 0,
        id: null,
        get active() {
            return this.items[this.activeIndex];
        },
        get [t]() {
            return this.items[this.selectedIndex];
        },
        choose(e) {
            this.selectedIndex = e;
            this.open = false;
            blurSelectNative(this.id);
        },
        onButtonClick() {
            if (this.open === false) {
                this.activeIndex = this.selectedIndex;
                this.open = true;
                this.$nextTick((() => {
                    this.$refs.listbox.children[this.activeIndex].scrollIntoView({
                        block: "nearest"
                    });
                }));
                focusSelectNative(this.id);
            } else if (this.open === true) {
                this.open = false;
                blurSelectNative(this.id);
            }
        },
        onOptionSelect() {
            null !== this.activeIndex && (this.selectedIndex = this.activeIndex);
            this.open = false;
            this.$refs.button.focus();
        },
        onEscape() {
            this.open = false;
            blurSelectNative(this.id);
        },
        onClickAway() {
            this.open = false;
            blurSelectNative(this.id);
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
    window[e.id] = config;
    return config;
}

/* Input Text */
function focusInputText(id) {
    let input = document.getElementById(id + '_input_text');
    let label = document.getElementById(id + '_label');

    if (!input.classList.contains('error')) {
        input.classList.remove('border-[#00000052]');
        input.classList.remove('focus:border-[#00000052]');
        input.classList.remove('focus:ring-[#00000052]');
        input.classList.add('border-[#2F8BC7]');
        input.classList.add('focus:border-[#2F8BC7]');
        input.classList.add('focus:ring-[#2F8BC7]');

        label.classList.add('text-[#2F8BC7]');
    }

    label.classList.remove('text-sm');
    label.classList.remove('text-[#5f6368]');
    label.classList.remove('top-1.5', 'left-1');
    label.classList.add('text-xxs');
    label.classList.add('-top-2', 'left-1.5');
}

function blurInputText(id) {
    let input = document.getElementById(id + '_input_text');
    let label = document.getElementById(id + '_label');

    if (!input.classList.contains('error')) {
        input.classList.remove('border-[#2F8BC7]');
        input.classList.remove('focus:border-[#2F8BC7]');
        input.classList.remove('focus:ring-[#2F8BC7]');
        input.classList.add('border-[#00000052]');
        input.classList.add('focus:border-[#00000052]');
        input.classList.add('focus:ring-[#00000052]');

        label.classList.remove('text-[#2F8BC7]');
        label.classList.add('text-[#5f6368]');
    }

    if (input.value === '') {
        label.classList.remove('text-xxs');
        label.classList.remove('-top-2', 'left-1.5');
        label.classList.add('text-sm');
        label.classList.add('top-1.5', 'left-1');
    }
}

function setInputTextError(id, value = 'error') {
    let input = document.getElementById(id + '_input_text');
    let label = document.getElementById(id + '_label');
    let span = document.getElementById(id + '_error_message');

    input.classList.add('error');

    input.classList.remove('border-[#00000052]');
    input.classList.remove('border-[#2F8BC7]');
    input.classList.remove('focus:border-[#00000052]');
    input.classList.remove('focus:border-[#2F8BC7]');
    input.classList.remove('focus:ring-[#00000052]');
    input.classList.remove('focus:ring-[#2F8BC7]');

    input.classList.add('border-[#d50000]');
    input.classList.add('focus:border-[#d50000]');
    input.classList.add('focus:ring-[#d50000]');

    label.classList.remove('text-[#2F8BC7]');
    label.classList.remove('text-[#5f6368]');
    label.classList.add('text-[#d50000]');

    span.classList.remove('hidden');
    span.innerHTML = value;
}

function clearInputTextError(id) {
    let input = document.getElementById(id + '_input_text');
    let label = document.getElementById(id + '_label');
    let span = document.getElementById(id + '_error_message');

    input.classList.remove('error');

    input.classList.remove('border-[#d50000]');
    input.classList.remove('focus:border-[#d50000]');
    input.classList.remove('focus:ring-[#d50000]');
    input.classList.add('border-[#00000052]');
    input.classList.add('focus:border-[#00000052]');
    input.classList.add('focus:ring-[#00000052]');

    label.classList.remove('text-[#d50000]');
    label.classList.add('text-[#5f6368]');

    span.classList.add('hidden');
    span.innerHTML = '';
}

function getInputTextValue(id) {
    return document.getElementById(id + '_input_text').value;
}

function setInputTextValue(id, value = '') {
    document.getElementById(id + '_input_text').value = value;
    document.getElementById(id + '_input_text').focus();
}

/* Select Native */
function focusSelectNative(id) {
    window[id].$refs.button.focus();
    window[id].$refs.button.classList.remove('border-[#00000052]');
    window[id].$refs.button.classList.add('border-[#2F8BC7]', 'ring-1', 'ring-[#2F8BC7]');
    window[id].$refs.icon.classList.remove('text-[#00000052]');
    window[id].$refs.icon.classList.add('text-[#2F8BC7]');
    window[id].$refs.labelText.classList.remove('text-[#5f6368]');
    window[id].$refs.labelText.classList.add('text-[#2F8BC7]');
}

function blurSelectNative(id) {
    window[id].$refs.button.blur();
    window[id].$refs.button.classList.remove('border-[#2F8BC7]', 'ring-1', 'ring-[#2F8BC7]');
    window[id].$refs.button.classList.add('border-[#00000052]');
    window[id].$refs.icon.classList.remove('text-[#2F8BC7]');
    window[id].$refs.icon.classList.add('text-[#00000052]');
    window[id].$refs.labelText.classList.remove('text-[#2F8BC7]');
    window[id].$refs.labelText.classList.add('text-[#5f6368]');
}

function setSelectNativeError(id, value = 'error') {
    /* window[id].$refs.button.classList.remove('border-[#00000052]');
    window[id].$refs.button.classList.remove('border-[#2F8BC7]', 'ring-1', 'ring-[#2F8BC7]');
    window[id].$refs.button.classList.add('border-[#d50000]', 'ring-1', 'ring-[#d50000]');
    window[id].$refs.labelText.classList.remove('text-[#5f6368]');
    window[id].$refs.labelText.classList.remove('text-[#5f6368]'); */
    window[id].$refs.error.classList.remove('hidden');
    window[id].$refs.error.innerHTML = value;
}

function clearSelectNativeError(id) {
    window[id].$refs.error.classList.add('hidden');
}

function getSelectNativeValue(id) {
    return window[id].selected;
}

function setSelectNativeValue(id, value = '-1') {
    let index = window[id].items.findIndex(el => el.id == value);
    window[id].choose(index);
    window[id].$refs.textSelect.innerText = window[id].items[index].descripcion;
}

/* Textarea */
function focusTextArea(id) {
    let textarea = document.getElementById(id + '_textarea');
    let label = document.getElementById(id + '_label');

    if (!textarea.classList.contains('error')) {
        textarea.classList.remove('border-[#00000052]');
        textarea.classList.remove('focus:border-[#00000052]');
        textarea.classList.remove('focus:ring-[#00000052]');
        textarea.classList.add('border-[#2F8BC7]');
        textarea.classList.add('focus:border-[#2F8BC7]');
        textarea.classList.add('focus:ring-[#2F8BC7]');

        label.classList.add('text-[#2F8BC7]');
    }

    label.classList.remove('text-sm');
    label.classList.remove('text-[#5f6368]');
    label.classList.remove('top-1.5', 'left-1');
    label.classList.add('text-xxs');
    label.classList.add('-top-2', 'left-1.5');
}

function blurTextArea(id) {
    let textarea = document.getElementById(id + '_textarea');
    let label = document.getElementById(id + '_label');

    if (!textarea.classList.contains('error')) {
        textarea.classList.remove('border-[#2F8BC7]');
        textarea.classList.remove('focus:border-[#2F8BC7]');
        textarea.classList.remove('focus:ring-[#2F8BC7]');
        textarea.classList.add('border-[#00000052]');
        textarea.classList.add('focus:border-[#00000052]');
        textarea.classList.add('focus:ring-[#00000052]');

        label.classList.remove('text-[#2F8BC7]');
        label.classList.add('text-[#5f6368]');
    }

    if (textarea.value === '') {
        label.classList.remove('text-xxs');
        label.classList.remove('-top-2', 'left-1.5');
        label.classList.add('text-sm');
        label.classList.add('top-1.5', 'left-1');
    }
}

function setTextAreaError(id, value = 'error') {
    let textarea = document.getElementById(id + '_textarea');
    let label = document.getElementById(id + '_label');
    let span = document.getElementById(id + '_error_message');

    textarea.classList.add('error');

    textarea.classList.remove('border-[#00000052]');
    textarea.classList.remove('border-[#2F8BC7]');
    textarea.classList.remove('focus:border-[#00000052]');
    textarea.classList.remove('focus:border-[#2F8BC7]');
    textarea.classList.remove('focus:ring-[#00000052]');
    textarea.classList.remove('focus:ring-[#2F8BC7]');

    textarea.classList.add('border-[#d50000]');
    textarea.classList.add('focus:border-[#d50000]');
    textarea.classList.add('focus:ring-[#d50000]');

    label.classList.remove('text-[#2F8BC7]');
    label.classList.remove('text-[#5f6368]');
    label.classList.add('text-[#d50000]');

    span.classList.remove('hidden');
    span.innerHTML = value;
}

function clearTextAreaError(id) {
    let textarea = document.getElementById(id + '_textarea');
    let label = document.getElementById(id + '_label');
    let span = document.getElementById(id + '_error_message');

    textarea.classList.remove('error');

    textarea.classList.remove('border-[#d50000]');
    textarea.classList.remove('focus:border-[#d50000]');
    textarea.classList.remove('focus:ring-[#d50000]');
    textarea.classList.add('border-[#00000052]');
    textarea.classList.add('focus:border-[#00000052]');
    textarea.classList.add('focus:ring-[#00000052]');

    label.classList.remove('text-[#d50000]');
    label.classList.add('text-[#5f6368]');

    span.classList.add('hidden');
    span.innerHTML = '';
}

function getTextAreaValue(id) {
    return document.getElementById(id + '_textarea').value;
}

function setTextAreaValue(id, value = '') {
    document.getElementById(id + '_textarea').value = value;
    document.getElementById(id + '_textarea').focus();
}

/* Input Checkbox */
function isChecked(id) {
    return document.getElementById(id + '_input_checkbox').checked;
}

function setInputCheckboxError(id, value = 'error') {
    let span = document.getElementById(id + '_error_message');
    span.classList.remove('hidden');
    span.innerHTML = value;
}

function setErrorValue(id, value = 'error') {
    if (document.getElementById(id + '_input_text') !== null) {
        setInputTextError(id, value);
    } else if (document.getElementById(id + '_select_native') !== null) {
        setSelectNativeError(id, value);
    } else if (document.getElementById(id + '_textarea') !== null) {
        setTextAreaError(id, value);
    } else if (document.getElementById(id + '_input_checkbox') !== null) {
        setInputCheckboxError(id, value);
    }
}