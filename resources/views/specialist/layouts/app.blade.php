<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Fullfy</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://kit.fontawesome.com/edad74fd5f.js" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/fontsource-cairo@4.0.0/index.min.css" rel="stylesheet">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- CSS CDN -->
        <link rel="stylesheet" href= "https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.min.css" />

        <!-- datetimepicker jQuery CDN -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js"></script>
        <!-- Scripts -->
        @vite(['resources/css/app.css',
                'resources/css/main.css',
                'resources/css/fontawesome-free.min.css',
                'resources/css/dataTables.bootstrap4.min.css',
                'resources/css/datatables-responsive-bootstrap4.min.css',
                'resources/css/datatables-buttons-bootstrap4.min.css',
                'resources/css/adminlte.min.css',
                'resources/js/app.js',
                'resources/js/main.js',
             ])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <div class="wrapper">


                @include('specialist.layouts.navbar')
                @include('specialist.layouts.aside')

                <!-- Page Content -->
                <main>
                    {{ $slot }}
                </main>
                <!-- Control Sidebar -->
                <aside class="control-sidebar control-sidebar-dark">
                    <!-- Control sidebar content goes here -->
                </aside>
                <!-- /.control-sidebar -->
            </div>

        </div>
    </body>
</html>
