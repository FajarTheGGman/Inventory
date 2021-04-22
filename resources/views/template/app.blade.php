<html>
    <head>
        <link href='{{ env("IMG") }}/icons/box.png' rel='icon' />
        <link href={{ asset('css/app.css') }} rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="/pathto/css/sweetalert.css">
        @include('sweet::alert')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
        <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>
        <title>Aplikasi Sistem Inventory</title>
    </head>

    <body class="flex flex-col bg-gray-300 justify-between">
            <div class="flex-row bg-white items-center shadow-md duration-700 rounded-xl p-5">
                <a href="{{ url('/dashboard') }}" class='ml-5 hover:opacity-60'><img src='{{ env('IMG') }}/icons/box.png' class='w-10 ml-5' /></a>
            </div>
        @section('body')
        @show
    </body>
</html>
