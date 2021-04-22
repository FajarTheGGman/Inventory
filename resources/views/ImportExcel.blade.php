@extends('template/app')

@section('body')
    <div class='flex flex-col items-center place-self-center bg-white justify-center p-5 rounded-xl mt-20'>
        <img src="{{ env('IMG') }}/icons/excel.png" class='w-20' />
        <h1 class='text-xl mt-5 text-white bg-black p-2 rounded-xl'>Import file excel</h1>
        <form action={{ url('/semuabarang/import/data') }} method='post' enctype='multipart/form-data' class='flex flex-col'>
            @csrf
            <input type='file' name='file' id='x' class='mt-10' />
            <button type='submit' class='mt-10 bg-green-700 flex place-self-center text-xl p-2 rounded-xl'>Import</button>
        </form>
    </div>
    <a href={{ url('/semuabarang') }} class='flex place-self-center mt-7 bg-yellow-600 text-md rounded-xl p-3'>Kembali</a>
    <script>
        if("{{ session('berhasil') }}"){
            Swal.fire({
                title: 'Berhasil',
                text: 'Berhasil Import Excel',
                icon: 'success'
            });
        }
    </script>
@endsection
