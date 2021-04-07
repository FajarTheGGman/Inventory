<html>

<head>
    <title>Inventory | Login Page</title>
    <link href={{ asset('css/app.css') }} rel='stylesheet'/>
</head>

<body class='flex flex-col bg-gray-300 justify-between'>

    <div class='flex flex-col place-self-center justify-center bg-white p-5 mt-5 rounded-xl shadow-xl'>
        <img src='{{ url('/icons/box.png') }}' class='flex flex-center items-center w-12'/>
    </div>
    <h1 class='text-center mt-5 text-xl'>Aplikasi Sistem Inventory</h1>

    <div class='flex place-self-center justify-center mt-4 items-center'>
        <form action='{{ url('/') }}' method='post' class='flex flex-col place-self-center bg-white p-5 mt-5 shadow-xl rounded-xl'>
            @csrf
            <div class='flex flex-col items-center'>
                <img src='{{ url('/icons/box.png') }}' class='w-14'/>
                <h1 class='text-center mt-5 mb-5 text-xl'>Silahkan Login</h1>
            </div>
            <input type='text' name='username' placeholder='Masukkan Username' class='border-b-2 border-black'/>
            <input type='password' name='password' placeholder='Masukkan Password' class='border-b-2 border-black mt-5'/>
            <button class='mt-5 bg-black text-white rounded-xl'>Login</button>
            <p class='mt-5'>Belum punya akun ? register di <a href='{{ url('/register') }}' class='text-blue-800'>sini</a></p>
            @if(session('gagal'))
                <p class='mt-2 text-red-800 text-center'>{{ session('gagal') }}</p>
            @endif
        </form>
    </div>

    <div>
        <h1 class='text-center float-bottom'>Copyright© By Fajar Firdaus</h1>
    </div>
</body>

</html>
