<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('vendor/fontawesome-free-6.0.0-web/css/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    @yield('dashboard-css')
    <link href="{{ asset('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sb-admin/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin-css/custom.css') }}" rel="stylesheet">
    <title>Document</title>
</head>

<body>
    {{ $text }}
</body>

</html>
