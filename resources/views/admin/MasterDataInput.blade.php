@extends('..template/app')

@section('body')
    <div class='flex flex-col place-self-center bg-white p-5 rounded-xl shadow-xl mt-20'>
        <div class='flex flex-col items-center'>
            <img src='/icons/masterdata.png' class='w-20' />
            <h1 class='text-center bg-black p-2 text-white mt-3 rounded-xl'>Master Data Input</h1>
        </div>

        <form action='/admin/masterdata/input/data' method='post' class='mt-5 flex flex-col'>
            @csrf
            <div class='flex flex-row'>
                <input name='tempat' type='text' placeholder='Masukkan Nama Tempat' class='border-b-4 border-black' />
                <input name='kategori' type='text' placeholder='Masukkan Nama Kategori' class='border-b-4 border-black ml-5' />
            </div>
            <button type='submit' class='mt-5 rounded-xl bg-green-700 text-md'>Masukkan Data</button>
            @if( session('berhasil') )
                <p class='text-center text-green-700 mt-5 text-md '>{{ session('berhasil') }}</p>
            @endif
        </form>

    </div>
@endsection
