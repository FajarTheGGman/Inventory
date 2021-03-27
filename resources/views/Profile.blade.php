<html>
    <head>
        <title>Profile</title>
        <link href={{ asset('css/app.css') }} rel="stylesheet" />
    </head>

    <body class="flex flex-col bg-gray-300 justify-between">
        <div class="flex-row bg-white items-center shadow-md duration-700 rounded-xl p-5">
            <a href="/dashboard" class='ml-5 hover:opacity-60'>Home</a>
        </div>

        <div class='flex flex-col'>
            <div class='flex flex-col bg-white mt-10 place-self-center p-5 rounded-xl shadow-xl'>
                <div class='flex flex-row '>
                    <img src='/icons/pengelola.png' class='w-20 h-20 border-2 border-black rounded-full' />
                    <div class='flex flex-col'>
                        <h1 class='mt-5 ml-5 text-xl'>{{ $username }}</h1>
                        <h1 class='ml-5'>Role : {{ $role }}</h1>
                    </div>
                </div>
            </div>

            <div class='flex flex-row place-self-center mt-10'>
                <a href='/profile/gantiusername' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 duration-700'>
                    <img src='/icons/profile/changeusername.png' class="w-20 h-20 ml-5"/>
                    <h1 class='mt-5'>Ganti Username</h1>
                </a>

                <a href='/profile/gantipassword' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                    <img src='/icons/profile/changepassword.png' class="w-20 h-20 ml-5"/>
                    <h1 class='mt-5'>Ganti Password</h1>
                </a>

                @if($role == 'admin')
                    <a href='/admin/delete' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                        <img src='/icons/profile/deleteuser.png' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-5'>Hapus User</h1>
                    </a>

                    <a href='/admin/edit' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                        <img src='/icons/profile/edituser.png' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-5'>Edit User</h1>
                    </a>

                    <a href='/admin/masterdata' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                        <img src='/icons/masterdata.png' class="w-20 h-20 ml-1"/>
                        <h1 class='mt-5'>Master Data</h1>
                    </a>
                @else
                    <div></div>
                @endif

                <a href='/profile/gantirole' class='bg-white shadow-xl p-5 rounded-xl cursor-pointer hover:opacity-60 ml-10 duration-700'>
                    <img src='/icons/profile/changerole.png' class="w-20 h-20 "/>
                    <h1 class='mt-5'>Ganti Role</h1>
                </a>

            </div>

        </div>
    </body>
</html>
