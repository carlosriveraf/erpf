@extends('layouts.dashboard')

@section('head')
{{--@vite('resources/js/kendoui/jquery.min.js')
@vite('resources/js/kendoui/kendo.all.min.js')--}}
<!-- <script src="https://kendo.cdn.telerik.com/2022.3.1109/js/jquery.min.js"></script>
<script src="https://kendo.cdn.telerik.com/2022.3.1109/js/kendo.all.min.js"></script> -->
<link rel="stylesheet" href="{{asset('/kendoui/styles/kendo.default-v2.min.css')}}">
<script src="{{asset('/kendoui/js/jquery.min.js')}}"></script>
<script src="{{asset('kendoui/js/kendo.all.min.js')}}"></script>
@endsection

@section('title', 'Módulos')

@section('main_content')
<h2 class="text-slate-900 text-xl tracking-tight font-bold mb-3 dark:text-slate-200">
    Módulos
</h2>

<div id="gridListadoModulos"></div>

<script>
    let mainDataSourceListadoModulos = new kendo.data.DataSource({
        transport: {
            read: {
                url: '/api/listado-modulos',
                //url: 'https://demos.telerik.com/kendo-ui/service/products',
                dataType: 'jsonp',
                type: 'post',
            },
            /* parameterMap: function(options) {
                var object = {};
                object.params = JSON.stringify($.makeArray(options));
                _parameterMap = object;
                return object;
            }, */
        },
        pageSize: 100,
        serverPaging: true,
        serverFiltering: true,
        serverSorting: true,
        schema: {
            data: 'data',
            total: 'count',
        },
        page: 1,
        sort: '',
        filter: '',
    });

    let grid = $('#gridListadoModulos').kendoGrid({
        dataSource: mainDataSourceListadoModulos,
        width: 'auto',
        height: 400,
        pageable: {
            refresh: true,
            buttonCount: 5,
            messages: {
                display: "Listando {0}-{1} de {2} registros"
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
        }, ],
    }).data('kendogrid');
    /* let myDataArray = [{
            ID: 1,
            Name: "Tom",
            Date: "10/15/2022"
        },
        {
            ID: 2,
            Name: "John",
            Date: "11/25/2022"
        },
        {
            ID: 3,
            Name: "Annie",
            Date: "05/09/2022"
        },
        {
            ID: 4,
            Name: "Rachel",
            Date: "08/06/2022"
        },
        {
            ID: 5,
            Name: "Klemens",
            Date: "10/07/2022"
        },
        {
            ID: 6,
            Name: "Micah",
            Date: "05/19/2022"
        },
        {
            ID: 7,
            Name: "Junie",
            Date: "04/04/2022"
        },
        {
            ID: 8,
            Name: "Krishnah",
            Date: "07/19/2022"
        },
        {
            ID: 9,
            Name: "Enrichetta",
            Date: "01/11/2022"
        },
        {
            ID: 10,
            Name: "Marten",
            Date: "02/13/2022"
        },
        {
            ID: 11,
            Name: "Rosmunda",
            Date: "08/15/2022"
        },
    ]; */

    /* $("#gridListadoModulos").kendoGrid({
        width: 'auto',
        height: 400,
        columns: [{
                field: "ID",
                title: "Personal Id",
                width: "70px"
            },
            {
                field: "Name",
                title: "First Name",
                width: "150px"
            },
            {
                field: "Date",
                title: "Hire Date",
                width: "200px",
                format: "{0:dd-MM-yyyy}"
            }
        ],
        dataSource: {
            data: myDataArray,
            schema: {
                model: {
                    id: "ID",
                    fields: {
                        ID: {
                            type: "number",
                            editable: false
                        },
                        Name: {
                            type: "string",
                            editable: false
                        },
                        Date: {
                            type: "date",
                            editable: false
                        }
                    }
                }
            }
        }
    }); */
</script>
@endsection