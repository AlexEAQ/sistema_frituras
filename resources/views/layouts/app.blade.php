<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">


    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
 
    {{-- DATATABLES --}}
    <link rel="stylesheet" href="{{ asset('css/DatatableBoostrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/DatatableButtons.css') }}">
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <main>

        @extends('adminlte::page')

    </main>

<!-- jQuery -->


    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/ajax.js') }}"></script>
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/sweetalert.js') }}"></script>
    {{-- DATATABLES --}}
    <script src="{{ asset('js/cdnDatatables.js') }}"></script>
    <script src="{{ asset('js/datatablesSelect.js') }}"></script>
    <script src="{{ asset('js/DatatablePrint.js') }}"></script>
    <script src="{{ asset('js/DatatableButtons.js') }}"></script>
    <script src="{{ asset('js/DatatableDateTime.js') }}"></script>
    <script src="{{ asset('js/DatatableBoostrap.js') }}"></script>
    <script src="{{ asset('js/datatables.js?v=125675dfhj676') }}" defer></script>

    <!-- Para usar los botones -->
    <script src="{{ asset('js/Jszip.js') }}"></script>
    <script src="{{ asset('js/Buttons.js') }}"></script>

    <!-- Para los estilos en Excel     -->
    <script src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.min.js">
    </script>
    <script
        src="https://cdn.jsdelivr.net/npm/datatables-buttons-excel-styles@1.1.1/js/buttons.html5.styles.templates.min.js">
    </script>
    <!-- Datepicker -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript"
        src="https://cdn.datatables.net/v/bs4/jszip-2.5.0/dt-1.10.20/b-1.6.1/b-flash-1.6.1/b-html5-1.6.1/b-print-1.6.1/r-2.2.3/datatables.min.js">
    </script>
    {{-- ajax --}}
    <script src="{{ asset('js/accionesImportantes.js') }}"></script>
    <!-- Momentjs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    {{-- SELECT2 --}}

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- borbujas --}}
    <script src="https://kit.fontawesome.com/b2e058effd.js" crossorigin="anonymous"></script>

    {{-- SWEETALERT2 --}}
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.1/sweetalert2.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('js/tailwind.js') }}"></script>

</body>
</html>

</body>

</html>