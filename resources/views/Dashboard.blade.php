<html>
    <head>
        <title>Aplikasi Sistem Inventory</title>
        <link href={{ asset('css/app.css') }} rel='stylesheet' />
        <script src='/chart.js'></script>
    </head>

    <body class='flex flex-col bg-gray-300 justify-between'>
        <div class='flex flex-row justify-between bg-white shadow-md duration-700 rounded-xl p-5'>
            <div class="flex flex-row justify-start">
                <a href="/dashboard" class='ml-5 hover:opacity-60'>Home</a>
                <a href="/profile" class='ml-5 hover:opacity-60'>Profile</a>
            </div>

            <div class='flex flex-end'>
                <a href='/logout' class='hover:opacity-70'><img src='/icons/logout.png' class='w-8 mr-4' /></a>
            </div>
        </div>

        <div class='flex flex-col justify-between'>
            <a href='/semuabarang' class='place-self-center mt-5'><img src='/icons/box.png' class='w-16 h-16 place-self-center mt-5 hover:bg-white duration-700 rounded-xl' /></a>
            <h1 class="text-center place-self-center text-white p-2 rounded-xl shadow-xl mt-5 text-xl bg-black" >Aplikasi Sistem Inventory</h1>
        
            <a href='/semuabarang' class='mt-10 bg-white shadow-xl rounded-xl flex place-self-center p-2 text-md hover:bg-black hover:text-white duration-700'>Lihat Data Barang</a>

            <div class="flex flex-row mt-8 justify-center duration-700">
                <div class="bg-white p-12 shadow-md rounded-xl ml-20 hover:opacity-60 duration-700 cursor-pointer">
                    <img src="/icons/jumlah.png" class="w-12 ml-8" />
                    <p class='text-center mt-2 text-md bg-black text-white rounded-xl'>{{ $total_barang }}</p>
                    <h2 class="text-center mt-2">Jumlah barang</h2>
                </div>

                <div class="bg-white p-12 shadow-md rounded-xl ml-20 hover:opacity-60 duration-700 cursor-pointer">
                    <img src="/icons/pengelola.png" class="w-12 ml-4" />
                    <p class='text-center text-white bg-black rounded-xl mt-3 text-md'>{{ $pengelola }}</p>
                    <h2 class="text-center mt-2">Pengelola</h2>
                </div>

                <div class="bg-white p-12 shadow-md rounded-xl ml-20 hover:opacity-60 duration-700 cursor-pointer">
                    <img src="/icons/tempat.png" class="w-12 ml-1" />
                    <p class='text-center bg-black text-white rounded-xl mt-3'>{{ $tempat }}</p>
                    <h2 class="text-center mt-2">Tempat</h2>
                </div>

                <div class='flex flex-col bg-white p-12 shadow-md ml-20 rounded-xl hover:opacity-60 duration-700 cursor-pointer'>
                    <Img src='/icons/kategori.png' class='w-12 ml-2' />
                    <p class='text-center bg-black text-white rounded-xl mt-3'>{{ $kategori }}</p>
                    <h2 class='text-center mt-2'>Kategori</h2>
                </div>
            </div>

            <div class='flex flex-col place-self-center'>
                <h1 class='text-center mt-40 text-xl p-2 bg-black text-white rounded-xl'>Total Data Keseluruhan</h1>
            </div>

            <div class='flex flex-col place-self-center w-1/2 h-3/4'>
                <canvas width='' height='' id='chart' class='bg-white mt-10 p-1 w-50 shadow-xl rounded-xl'></canvas>
            </div>
        </div>

        <script>
            let ch = document.getElementById('chart').getContext('2d');

            let x = new Chart(ch, {
                type: 'line',
                responsive: true,
                data: {
                    labels: ['Jumlah Barang', 'Pengelola', 'Tempat', 'Kategori'],
                    datasets: [{
                        label: 'Total Data Inventory',
                        backgroundColor: 'white',
                        borderColor: 'black',
                        data: ['{{ $total_barang }}', '{{ $pengelola }}', '{{ $tempat }}', '{{ $kategori }}']
                    }]
                }
            })
        </script>

        <div class='bg-black flex flex-col mt-40 items-center'>
            <p class='text-center flex place-self-center text-white'>Copyright© 2021 By Fajar Firdaus</p>
        </div>
    <body>
</html>
