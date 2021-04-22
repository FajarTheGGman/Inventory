@extends('..template.app')

@section('body')

    <div class='flex flex-col place-self-center bg-white mt-20 p-5 rounded-xl shadow-xl'>
        <div class='flex flex-col items-center'>
            <img src='{{ env("IMG") }}/icons/profile/edituser.png' class='w-14' />
            <h1 class='mt-5 text-xl'>Edit User</h1>
        </div>

        <div class='flex flex-col mt-5'>
            <form class='flex flex-row' action='{{ url('/admin/edit/data') }} ' method='post' >
                @csrf
                <input type='text' name='username' placeholder='Masukkan Username' class='border-b-2 border-black w-40' />
                <input type='text' name='newusername' placeholder='Ganti Username' class='border-b-2 border-black ml-5 w-40' />
            </div>

            <div class='flex flex-row'>
                <input type='text' name='password' placeholder='Ganti Password' class='border-b-2 border-black w-40'/>
                <label for='role' class='ml-5 mt-5'>Ganti Role :</label>
                <select id='role' name='role' class='mt-5 ml-3 bg-black text-white rounded-xl shadow-xl pl-2 pr-2'>
                    <option value='admin' >Admin</option>
                    <option valie='sma' >Sma</option>
                    <option value='smk' >Smk</option>
                    <option value='smp' >Smp</option>
                </select>
            </div>
            
            <button type='submit' class='bg-yellow-400 mt-10 rounded-xl shadow-xl'>Ganti</button>
            @if(session('berhasil'))
                <p class='text-center text-green-800 mt-3'>{{ session('berhasil') }}</p>
            @endif
        </form>
    </div>

@endsection
