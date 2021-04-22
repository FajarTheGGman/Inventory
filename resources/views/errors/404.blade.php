<html>

    <head>
        <title>Mau Kemana ?</title>
        <link href={{ asset('css/app.css') }} rel='stylesheet' />
    </head>

    <body class='flex flex-col bg-gray-300'>
        <div class='flex flex-col items-center mt-20 duration-700 '>
            <img src='{{ env("IMG") }}/icons/404.png' class='bg-white p-4 w-40 shadow-xl rounded-xl mt-20 duration-700'/>
            <h1 class='text-center mt-5 text-xl text-red-700 bg-white p-3 rounded-xl shadow-xl duration-700'>Oops, Tidak ada halaman lagi disini</h1>
        </div>
    </body>

</html>
