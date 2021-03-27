@extends('..template/app')

@section("body")

    <div class='flex flex-col place-self-center bg-white p-5 mt-16 shadow-xl rounded-xl'>
        <div class='flex flex-col items-center'>
            <img src='/icons/profile/changeusername.png' class='w-16'/>
            <h1 class='mt-5 text-xl'>Ganti Username</h1>
        </div>

        <form action='/profile/newusername' method='post' class='flex flex-col mt-10'>
            @csrf
            <input type='text' name='username' placeholder='Masukkan Username Baru' class='border-b-2 border-black' />
            <button type='submit' class='bg-yellow-400 mt-5 rounded-xl shadow-xl'>Ganti</button>
            @if(session('berhasil'))
                <p class='text-center text-green-800 mt-3'>{{ session('berhasil') }}</p>
            @endif
        </form>
    </div>

@endsection
