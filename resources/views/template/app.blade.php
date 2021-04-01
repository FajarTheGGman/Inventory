<html>
    <head>
        <link href='/icons/box.png' rel='icon' />
        <link href={{ asset('css/app.css') }} rel="stylesheet" />
        <title>Aplikasi Sistem Inventory</title>
    </head>

    <body class="flex flex-col bg-gray-300 justify-between">
            <div class="flex-row bg-white items-center shadow-md duration-700 rounded-xl p-5">
                <a href="/dashboard" class='ml-5 hover:opacity-60'><img src='/icons/box.png' class='w-10 ml-5' /></a>
            </div>
        @section('body')
        @show
    </body>
</html>
