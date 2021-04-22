<html>
    <head>
        <title>Apilkasi Inventory</title>
        <link href='{{ env("IMG") }}/icons/box.png' rel='icon' />
        <link href={{ asset('css/app.css') }} rel='stylesheet' />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    </head>

    <body class='bg-gray-300'>
        <div class='flex flex-col justify-between'>
            <div class='flex flex-row justify-between bg-white shadow-xl rounded-b-xl'>
                <div class='ml-2 flex flex-row'>
                    <img src="{{ env('IMG') }}/icons/box.png" class='w-20 p-2' />
                </div>
                <div class='flex flex-col'>
                    <a class='mr-10 text-center mt-5 text-xl bg-black text-white p-2 rounded-xl hover:bg-green-600 duration-700' href={{ url('/admin') }}>Login</a>
                    
                </div>
            </div>
    
            <div class='flex flex-col place-self-center'>
                <div class='flex place-self-center mt-32 flex-col items-center'>
                    <img src="{{ env('IMG') }}/icons/box.png" class='w-40' />
                    <h1 class='flex mt-7 bg-black text-white p-3 rounded-xl text-xl'>Aplikasi Sistem Inventory</h1>
                </div>

                <div data-aos='fade-up' class='flex flex-row mt-80 place-self-center'>
                        <img src="{{ env('IMG') }}/icons/ilustrasi/whatis.svg" class=' w-1/2 ml-10' />
                        <div class='flex flex-col ml-20'>
                            <h1 class='text-xl mt-20'>Apa itu <span class='text-green-800'>"Aplikasi Sistem Inventory"</span></h1>
                            <h1 class='flex flex-col'>Aplikasi sistem inventory adalah aplkasi <span>untuk managemen barang seperti</span><span>Alat-alat sekolah, furniture, elektronik, dll.</span></h1>
                        </div>
                </div>

                <div data-aos="fade-up-right" class='flex flex-row mt-80 ml-60 place-self-center'>
                        <div class='flex flex-col'>
                            <h1 class='text-xl mr-20 mt-20'>Aplikasi Sistem Inventory</h1>
                            <h1 class='flex flex-col'>Memiliki Beberapa Fitur
                                <span>Seperti, <span class='text-green-800'>MasterData, Input Barang,</span> </span>
                                <span class='text-green-800'>User Role, SumberDana, Ruangan,</span>
                                <span class='text-green-800'>Kelompok Aset, Hapus Barang,</span>
                                <span class='text-green-800'>Ganti Password, Ganti Username</span>
                                <span class='text-green-800'>Statistik, Cari Barang</span>
                                <span class='text-green-800'>Import Excel, Export Excel</span>
                            </h1>
                        </div>
                        <img src="{{ env('IMG') }}/icons/ilustrasi/fitur.svg" class=' w-1/2' />
                </div>

                <h1 data-aos='fade-left' class='flex place-self-center text-xl mt-80 bg-yellow-600 text-white p-3 rounded-xl'>Fitur-Fitur</h1>
                <div data-aos='fade-right' class='flex flex-row mt-10 place-self-center items-center mb-20'>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/pengelola.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Pengelola</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/masterdata/sumberdana.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Sumber Dana</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/masterdata/ruangan.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Ruangan</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/masterdata/kelompokaset.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Kelompok Aset</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/excel.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Import Excel</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/excel.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Export Excel</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/box.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Data Barang</h1>
                    </div>
                    <div class='flex flex-col ml-12 items-center'>
                        <img src="{{ env('IMG') }}/icons/search.png" class='w-24 bg-white rounded-xl p-2 shadow-xl' />
                        <h1 class='text-center'>Cari Barang</h1>
                    </div>
                </div>
            </div>
            <div class='flex flex-col items-center justify-center bg-black mt-40'>
                <h1 class='text-white'>Copyright© 2021 By Fajar Firdaus</h1>
            </div>
        </div>
        <script>
            AOS.init();
        </script>
    </body>
</html>
