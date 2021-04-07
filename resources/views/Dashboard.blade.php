<html>
    <head>
        <title>Aplikasi Sistem Inventory</title>
        <link href={{ asset('css/app.css') }} rel='stylesheet' />
        <script src='{{ url('/chart.js') }}'></script>
        <script
              src="{{ url('/jquery.js') }}"
                integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
                crossorigin="anonymous"></script>
    </head>

    <body class='flex flex-col bg-gray-300 justify-between duration-700'>
        <div class='flex flex-row justify-between bg-white shadow-md duration-700 rounded-xl p-5'>
            <div class="flex flex-row justify-start">
                <a href="{{ url('/profile') }}" class='ml-5 hover:opacity-60'><img src='/icons/pengelola.png' class='w-10' /></a>
            </div>

            <div class='flex flex-end'>
                <a href='{{ url('/logout') }}' class='hover:opacity-70'><img src='{{ url('/icons/logout.png') }}' class='w-8 mr-4' /></a>
            </div>
        </div>

        <div class='flex flex-col justify-between'>
            <a href='{{ url('/semuabarang') }}' class='place-self-center mt-5'><img src='/icons/box.png' class='w-16 h-16 place-self-center mt-5 hover:bg-white duration-700 rounded-xl' /></a>
            <h1 class="text-center place-self-center text-white p-2 rounded-xl shadow-xl mt-5 text-xl bg-black" >Aplikasi Sistem Inventory</h1>
        
            <a href='{{ url('/semuabarang') }}' class='mt-10 bg-white shadow-xl rounded-xl flex place-self-center p-2 text-md hover:bg-black hover:text-white duration-700'>Lihat Data Barang</a>

            <div class="flex flex-row mt-8 justify-center duration-700">
                <div class="bg-white p-12 shadow-md rounded-xl ml-20 hover:opacity-60 duration-700 cursor-pointer">
                    <img src="{{ url('/icons/jumlah.png') }}" class="w-12 ml-8" />
                    <p class='text-center mt-2 text-md bg-black text-white rounded-xl'>{{ $total_barang }}</p>
                    <h2 class="text-center mt-2">Jumlah barang</h2>
                </div>

                <div class="bg-white p-12 shadow-md rounded-xl ml-20 hover:opacity-60 duration-700 cursor-pointer">
                    <img src="{{ url('/icons/pengelola.png') }}" class="w-12 ml-4" />
                    <p class='text-center text-white bg-black rounded-xl mt-3 text-md'>{{ $pengelola }}</p>
                    <h2 class="text-center mt-2">Pengelola</h2>
                </div>

                <div class="bg-white p-12 shadow-md rounded-xl ml-20 hover:opacity-60 duration-700 cursor-pointer">
                    <img src="{{ url('/icons/tempat.png') }}" class="w-12 ml-1" />
                    <p class='text-center bg-black text-white rounded-xl mt-3'>{{ $tempat }}</p>
                    <h2 class="text-center mt-2">Tempat</h2>
                </div>

                <div class='flex flex-col bg-white p-12 shadow-md ml-20 rounded-xl hover:opacity-60 duration-700 cursor-pointer items-center'>
                    <Img src='{{ url('/icons/kategori.png') }}' class='w-12 ml-2' />

                    <p class='text-center bg-black p-2 text-white rounded-xl mt-3'>{{ $kategori }}</p>
                    <h2 class='text-center mt-2'>Kelompok Aset</h2>
                </div>
            </div>

            <div class='flex flex-col place-self-center'>
                <h1 class='text-center mt-40 text-xl p-2 bg-black text-white rounded-xl'>Total Data Keseluruhan</h1>
            </div>

            <div class='flex flex-col place-self-center w-1/2 h-3/4 duration-700'>
                <canvas width='' height='' id='chart' class='bg-white mt-10 p-1 w-50 shadow-xl rounded-xl'></canvas>
            </div>


        <div class='flex flex-row mt-20'>
            <div class='flex flex-col place-self-center w-1/2 h-3/4 duration-700'>
                <canvas id='pie'></canvas>
            </div>
            <div class='flex flex-col place-self-center w-1/2 h-3/4 duration-700'>
                <canvas id='pengelola'></canvas>
            </div>
        </div>

        </div>

        <script>
        (async function(){
            let ch = document.getElementById('chart').getContext('2d');
        
            let pie = document.getElementById('pie').getContext('2d');
            let pengelola = document.getElementById('pengelola').getContext('2d');

            const warna = {
                    red: 'rgb(255, 99, 132)',
                    orange: 'rgb(255, 159, 64)',
                    yellow: 'rgb(255, 205, 86)',
                    green: 'rgb(75, 192, 192)',
                    blue: 'rgb(54, 162, 235)',
                    purple: 'rgb(153, 102, 255)',
                    grey: 'rgb(201, 203, 207)'
            }

            let piex = new Chart(pie, {
                type: 'pie',
                responsive: true,
                data: {
                    labels: ['Ydsk : Rp.{{ $ydsk }}', 'Pustekom : Rp.{{ $pustekom }}', 'Sma : Rp.{{ $sma }}', 'Smp : Rp.{{ $smp }}', 'Smk : Rp.{{ $smk }}'],
                    datasets: [{
                       label: "Total Dana Keseluruhan",
                        backgroundColor: [warna.blue, warna.orange, warna.yellow, warna.purple, warna.red],
                        borderColor: 'black',
                        data: ['{{ $ydsk }}', '{{ $pustekom }}', '{{ $sma }}', '{{ $smp }}', '{{ $smk }}']
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Total Dana Keseluruhan',
                    }
                }
            })

            let pengelolax = new Chart(pengelola, {
                type: 'pie',
                responsive: true,
                data: {
                    labels: ['ydsk', 'pustekom', 'sma', 'smp', 'smk'],
                    datasets: [{
                        backgroundColor: [warna.blue, warna.orange, warna.yellow, warna.purple, warna.red],
                        borderColor: 'black',
                        data: ['{{ $role_ydsk }}', '{{ $role_pustekom }}', '{{ $role_sma }}', '{{ $role_smp }}', '{{ $role_smk }}']
                    }]
                },
                options: {
                    title: {
                        display: true,
                        text: 'Total Pengelola Inventory'
                    }
                }
            })

            let x = new Chart(ch, {
                type: 'line',
                responsive: true,
                data: {
                    labels: ['Jumlah Barang', 'Pengelola', 'Tempat', 'Kelompok Aset'],
                    datasets: [{
                        label: 'Total Data Inventory',
                        backgroundColor: 'white',
                        borderColor: 'black',
                        data: ['{{ $total_barang }}', '{{ $pengelola }}', '{{ $tempat }}', '{{ $kategori }}']
                    }]
                }
            })
        })()
        </script>

        <div class='bg-black flex flex-col mt-40 items-center'>
            <p class='text-center flex place-self-center text-white'>Copyright© 2021 By Fajar Firdaus</p>
        </div>
    <body>
</html>
