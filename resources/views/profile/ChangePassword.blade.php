@extends('..template.app')

@section('body')

    <form action='/profile/newpassword' method='post' class='flex flex-col place-self-center p-5 bg-white rounded-xl shadow-xl mt-20'>
        @csrf
        <div class='flex flex-col items-center'>
            <img src='{{ env("IMG") }}/icons/profile/changepassword.png' class='w-20' />
            <h1 class='mt-5 text-xl'>Ganti Password</h1>
        </div>
        
        <div class='flex flex-row mt-10'>
            <input type='text' name='oldpassword' placeholder='Password Lama' class='border-b-2 border-black w-40' />
            <input type='text' name='newpassword' placeholder='Password Baru' class='border-b-2 border-black w-40 ml-8'/>
        </div>
        <button class='bg-yellow-400 mt-5 rounded-xl shadow-xl' type='submit'>Ganti</button>

        @if(session('berhasil'))
            <p class='text-center text-green-900 mt-3'>{{ session('berhasil') }}</p>
        @endif
    </form>

@endsection
