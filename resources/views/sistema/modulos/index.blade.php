@extends('layouts.dashboard')

@section('head')
@endsection

@section('title', 'Módulos')

@section('main_content')
<h2 class="text-slate-900 text-xl tracking-tight font-bold mb-3 px-4">
    Módulos
</h2>

<script type="x-kendo/template" id="tplTools">
    <button type="button" onclick='nuevoModulo()' class="bg-[\#d54e0c] text-sm text-white font-semibold h-9 px-4 rounded-lg flex items-center pointer-events-auto">
        <i class="fa-solid fa-plus"></i>&nbsp;NUEVO MÓDULO
    </button>
</script>

<div class="bg-white py-4 px-6 h-max">
    <div id="gridListadoModulos"></div>
</div>

<script>
    let mainDataSourceListadoModulos = new kendo.data.DataSource({
        transport: {
            read: {
                url: '{{route("sistema.modulos.listado_modulos")}}',
                dataType: 'jsonp',
                type: 'post',
            },
            parameterMap: function(options) {
                let object = {};
                object.params = JSON.stringify($.makeArray(options));
                object._token = '{{csrf_token()}}';
                _parameterMap = object;
                return object;
            },
        },
        serverPaging: true,
        pageSize: 50,
        serverSorting: true,
        serverFiltering: true,
        @if($params != '')
        @if($params['page'] != '')
        page: <?php echo $params['page'] ?>,
        @endif
        @if($params['sort'] != '')
        sort: <?php echo $params['sort'] ?>,
        @endif
        @if($params['filter'] != '')
        filter: <?php echo $params['filter'] ?>,
        @endif
        @endif
        schema: {
            data: 'data',
            total: 'count',
            model: {
                id: 'mod_id',
                fields: {
                    codigo: {
                        type: 'string',
                    },
                    nombre: {
                        type: 'string',
                    },
                    url: {
                        type: 'string',
                    },
                    descripcion: {
                        type: 'string',
                    },
                    estado: {
                        type: 'enums',
                    },
                    ip_registro: {
                        type: 'string',
                    },
                    ip_modificado: {
                        type: 'string',
                    },
                    usuario_registro: {
                        type: 'string',
                    },
                    usuario_modificado: {
                        type: 'string',
                    },
                    fecha_registro: {
                        type: 'date',
                    },
                    fecha_modificado: {
                        type: 'date',
                    },
                },
            },
        },
    });

    let grid = $('#gridListadoModulos').kendoGrid({
        toolbar: kendo.template($('#tplTools').html()),
        dataSource: mainDataSourceListadoModulos,
        width: 'auto',
        height: 'full',
        sortable: {
            mode: 'multiple'
        },
        filterable: {
            /* messages: {
                info: "Filtrar Lista:", // sets the text on top of the Filter menu
                filter: "Filtrar", // sets the text for the "Filter" button
                clear: "Limpiar", // sets the text for the "Clear" button
                // when filtering boolean numbers
                isTrue: "custom is true", // sets the text for "isTrue" radio button
                isFalse: "custom is false", // sets the text for "isFalse" radio button
                //changes the text of the "And" and "Or" of the Filter menu
                and: "Y",
                or: "O"
            }, */
            /* operators: {
                string: {
                    eq: 'Igual',
                    neq: 'No es igual a',
                    isnull: 'Es nulo',
                    isnotnull: 'No es nulo',
                    lt: 'menor que',
                    lte: 'menor e igual que',
                    gt: 'mayor que',
                    gte: 'mayor e igual que',
                    startswith: 'inicia con',
                    endswith: 'termina con',
                    contains: 'contiene',
                    doesnotcontain: 'no contiene',
                    isempty: 'es vacío',
                    isnotempty: 'no es vacío',
                },
            } */
        },
        pageable: {
            refresh: true,
            buttonCount: 5,
            messages: {
                display: "Listando {0}-{1} de {2} registros"
            }
        },
        resizable: true,
        dataBound: function() {
            for (var i = 0; i < this.columns.length; i++) {
                this.autoFitColumn(i);
            }
        },
        columns: [{
            field: 'codigo',
            title: 'Codigo',
        }, {
            field: 'nombre',
            title: 'Nombre',
        }, {
            field: 'url',
            title: 'URL',
        }, {
            field: 'descripcion',
            title: 'Descripción',
        }, {
            field: 'estado',
            template: '#= tpl_estado #',
            title: 'Estado',
            filterable: {
                ui: estadoFiltro
            },
        }, {
            field: 'ip_registro',
            title: 'IP Registro',
        }, {
            field: 'ip_modificado',
            title: 'IP Modificado',
        }, {
            field: 'usuario_registro',
            title: 'Registrado por',
        }, {
            field: 'usuario_modificado',
            title: 'Modificado por',
        }, {
            field: 'fecha_registro',
            title: 'Registro',
            format: '{0:dd/MM/yyyy}',
        }, {
            field: 'fecha_modificado',
            title: 'Modificado',
            format: '{0:dd/MM/yyyy}',
        }, ],
    }).data('kendogrid');

    function estadoFiltro(element) {
        element.kendoDropDownList({
            dataSource: {
                transport: {
                    read: {
                        dataType: 'json',
                        type: 'post',
                        url: '{{route("sistema.modulos.listado_modulos.json_estados")}}',
                        data: {
                            _token: '{{csrf_token()}}',
                        },
                    }
                }
            },
            dataTextField: 'name',
            dataValueField: 'id',
        });
    }

    function nuevoModulo() {
        Livewire.emit('openModal', 'modal.sistema.modulos.crear-modulo-modal');
    }

    function crearModulo() {
        let nombre = getInputTextValue('CM_nombre');
        let url = getInputTextValue('CM_url');
        let descripcion = getTextAreaValue('CM_descripcion');
        let esprincipal = isChecked('CM_esprincipal');

        let padre_codigo = '';
        if (!esprincipal) {
            esprincipal = 0;
            padre_codigo = getSelectNativeValue('CM_modulopadre').codigo;
        } else {
            esprincipal = 1;
        }
        if (padre_codigo == undefined) {
            padre_codigo = '';
        }

        fetch('{{route("sistema.modulos.store")}}', {
            method: 'post',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded; charset=UTF-8',
            },
            body: new URLSearchParams({
                _token: '{{csrf_token()}}',
                CM_nombre: nombre,
                CM_url: url,
                CM_descripcion: descripcion,
                CM_esprincipal: esprincipal,
                CM_modulopadre: padre_codigo,
            }),
        }).then(response => response.json()).then(data => {
            if (data.status == '{{\App\Models\Define::STATUS_ERROR}}') {
                for (const [key, value] of Object.entries(data.error)) {
                    setErrorValue(key, value);
                }
            } else if (data.status == '{{\App\Models\Define::STATUS_OK}}') {
                alert(data.message);
                Livewire.emit('closeModal', 'modal.sistema.modulos.crear-modulo-modal');
                mainDataSourceListadoModulos.read();
            }
        });
    }

    /*
        let header = document.getElementById('dashboard_header');

        let heightWindow = window.innerHeight;
        let heightHeader = header.offsetHeight + parseInt(getComputedStyle(header).getPropertyValue('margin-top')) + parseInt(getComputedStyle(header).getPropertyValue('margin-bottom'));

        header.offsetHeight; //content + padding + border

        parseInt(getComputedStyle(header).getPropertyValue('margin-top'));
        parseInt(getComputedStyle(header).getPropertyValue('margin-bottom'));
    */
</script>
@endsection