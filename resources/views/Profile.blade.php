<html>
    <head>
        <title>Profile</title>
        <link href={{ asset('css/app.css') }} rel="stylesheet" />
    </head>

    <body class="flex flex-col bg-gray-300 justify-between pb-10">
        <div class="flex-row bg-white items-center shadow-md duration-700 rounded-xl p-5">
            <a href="{{ url('/dashboard') }}" class='ml-20 hover:opacity-60'><img src='/icons/box.png' class='w-10 ml-5' /></a>
        </div>

        <div class='flex flex-col'>
            <div class='flex flex-col bg-white mt-10 place-self-center p-5 rounded-xl shadow-xl'>
                <div class='flex flex-row '>
                    <img src='{{ url('/icons/pengelola.png') }}' class='w-20 h-20 border-2 border-black rounded-full' />
                    <div class='flex flex-col'>
                        <h1 class='mt-5 ml-5 text-xl'>{{ $username }}</h1>
                        <h1 class='ml-5'>Role : {{ $role }}</h1>
                    </div>
                </div>
            </div>

            <div class='flex flex-row place-self-center mt-10'>
                <a href='{{ url('/profile/gantiusername') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 duration-700'>
                    <img src='{{ url('/icons/profile/changeusername.png') }}' class="w-20 h-20 ml-5"/>
                    <h1 class='mt-5'>Ganti Username</h1>
                </a>

                <a href='{{ url('/profile/gantipassword') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                    <img src='{{ url('/icons/profile/changepassword.png') }}' class="w-20 h-20 ml-5"/>
                    <h1 class='mt-5'>Ganti Password</h1>
                </a>

                @if($role == 'admin')
                    <a href='{{ url('/admin/delete') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                        <img src='{{ url('/icons/profile/deleteuser.png') }}' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-5'>Hapus User</h1>
                    </a>

                    <a href='{{ url('/admin/edit') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                        <img src='{{ url('/icons/profile/edituser.png') }}' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-5'>Edit User</h1>
                    </a>
                @else
                    <div></div>
                @endif

                <a href='{{ url('/profile/gantirole') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                    <img src='{{ url('/icons/profile/changerole.png') }}' class="w-20 h-20 "/>
                    <h1 class='mt-5'>Ganti Role</h1>
                </a>

            </div>


            @if( $role == 'admin' )
                <div class='flex flex-row place-self-center mt-10 items-center'>
                    <a href='{{ url('/admin/sumberdana') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700 flex flex-col items-center'>
                        <img src='{{ url('/icons/masterdata/sumberdana.png') }}' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-2'>Sumber Dana</h1>
                    </a>
                
                    <a href='{{ url('/admin/ruangan') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700 flex flex-col items-center'>
                        <img src='{{ url('/icons/masterdata/ruangan.png') }}' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-2'>Ruangan</h1>
                    </a>

                    <a href='{{ url('/admin/pengelola') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700 flex flex-col items-center'>
                        <img src='{{ url('/icons/pengelola.png') }}' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-2'>Pengelola</h1>
                    </a>

                   <a href='{{ url('/admin/kelompokaset') }}' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700 flex flex-col items-center'>
                        <img src='{{ url('/icons/masterdata/kelompokaset.png') }}' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-2'>Kelompok Aset</h1>
                    </a>
                </div>
            @endif


            </div>

        </div>
    </body>
</html>
