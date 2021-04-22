@extends('..template/app')

@section('body')
    <div class='flex flex-col place-self-center bg-white p-5 rounded-xl shadow-xl mt-20'>
        <div class='flex flex-col items-center'>
            <img src='{{ env("IMG") }}/icons/masterdata/kelompokaset.png' class='w-20' />
            <h1 class='text-center bg-black p-2 text-white mt-3 rounded-xl'>Kelompok Aset Input</h1>
        </div>

        <form action='{{ url('/admin/kelompokaset/input/data') }}' method='post' class='mt-5 flex flex-col'>
            @csrf
            <div class='flex flex-col'>
                <input name='nama' type='text' placeholder='Masukkan Nama' class='border-4 border-black rounded-xl p-2' />
                <input name='umurekonomis' type='text' placeholder="Umur Ekonomis" class='border-4 border-black rounded-xl p-2 mt-10' />
                <input name='keterangan' type='text' placeholder='Tambah Keterangan' class='border-4 rounded-xl p-2 border-black mt-10 pr-20' />
            </div>
            <button type='submit' class='mt-5 rounded-xl bg-green-700 text-md'>Masukkan Data</button>
            @if( session('berhasil') )
                <p class='text-center text-green-700 mt-5 text-md '>{{ session('berhasil') }}</p>
            @endif
        </form>
        <script>
            if("{{ session('gagal') }}"){
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data Kelompok Aset Sudah Terdaftar',
                    icon: 'error'
                })
            }else if("{{ session('berhasil') }}"){
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Berhasil Memasukkan Data',
                    icon: 'success'
                })
            }
        </script>
    </div>
    <a href='{{ url('/admin/kelompokaset') }} ' class='flex place-self-center mt-2 bg-yellow-600 p-2 rounded-xl mb-10'>Kembali</a>
@endsection
