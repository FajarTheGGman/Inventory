@extends('template.app')

@section('body')

    <div class='flex flex-col place-self-center mt-10 bg-white shadow-xl rounded-xl p-10 duration-700'>
        <div class='flex flex-col items-center'>
            <img src='{{ url('/icons/crud/delete.png') }}' class='w-14' />
            <h1 class='mt-5 text-xl'>Hapus Barang</h1>
        </div>

        <form action='{{ url('/delete/data') }} ' method='post' class='flex items-start flex-col mt-10'>
            @csrf
            <input type='text' name='tempat' placeholder='Nama Barang' class='border-b-2 border-black placeholder-grey-900' />

            <div class='flex flex-row mt-5'>
                <label for='tempat'>Tempat : </label>
                <select name='tempat' id='tempat' class='bg-black text-white pl-2 rounded-xl ml-2'>

                    @foreach( $opsi as $tempat )
                        <option value={{ $tempat->tempat }}>{{ $tempat->tempat }}</option>
                    @endforeach
                </select>
            </div>

            <div class='flex flex-row mt-5'>
                <label for='kategori'>Kategori : </label>
                <select class='ml-2 bg-black text-white pl-2 pr-2 rounded-xl' name='kategori' id='kategori'>
                    @foreach( $opsi as $kategori )
                        <option value={{ $kategori->kategori }}>{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </div>

            <button class='mt-5 bg-red-800 p-2 rounded-xl'>Delete</button>

            @if( session('berhasil') )
                <p class='text-center text-red-700 mt-5'>{{ session('berhasil') }}</p>
            @endif
        </form>
    </div>

@endsection
