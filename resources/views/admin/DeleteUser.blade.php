@extends('..template.app')

@section('body')

    <div class='flex flex-col place-self-center bg-white mt-20 p-5 rounded-xl shadow-xl'>
        <div class='flex flex-col items-center'>
            <img src='{{ url('/icons/crud/delete.png') }}' class='w-14' />
            <h1 class='mt-5 text-xl'>Hapus User</h1>
        </div>

        <div class='flex flex-col mt-5'>
            <form class='flex flex-col' action='{{ url('/admin/delete/data') }}' method='post' >
                @csrf
                <input type='text' name='username' placeholder='Masukkan Username' class='border-b-2 border-black' />
                <button type='submit' class='bg-red-600 mt-10 rounded-xl shadow-xl'>Hapus</button>
            </form>
        </div>
    </div>

@endsection
