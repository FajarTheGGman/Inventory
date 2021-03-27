@extends('..template.app')

@section('body')

    <form action='/profile/newrole' method='post' class='flex flex-col place-self-center bg-white p-5 mt-20 rounded-xl shadow-xl'>
        @csrf
        <div class='flex flex-col items-center'>
            <img src='/icons/profile/changerole.png' class='w-20' />
            <h1 class='text-xl text-center mt-5'>Ganti Role</h1>
        </div>
        
        <select name='role' class='mt-10 bg-black text-white rounded-xl shadow-xl pl-2 pr-2'>
            <option value='sma'>Sma</option>
            <option value='smp'>Smp</option>
            <option value='smk'>Smk</option>
        </select>

        <button type='submit' class='bg-yellow-400 rounded-xl shadow-xl mt-5'>Ganti</button>
    </div>

@endsection
