@extends('template.app')

@section('body')

    <div class='flex flex-col place-self-center bg-white mt-5 p-5 shadow-xl rounded-xl'>
        <div class='flex flex-center flex-col items-center'>
            <img src='/icons/crud/update.png' class='w-10'/>
            <h1 class='text-center text-xl mt-5'>Edit Inventory</h1>
        </div>

        <form action='/edit/data' method='post'>
            @csrf
            <div class='flex flex-row mt-2'>
                <label for='tempat' class='mt-2 ml-2'>Tempat : </label>
                <select name='tempat' id='tempat' class='mt-2 ml-2 bg-black text-white rounded-xl pl-2'>
                    @foreach($opsi as $tempat)
                        <option value={{ $tempat->tempat }}>{{ $tempat->tempat }}</option>
                    @endforeach
                </select>

                <label for='kategori' class='mt-2 ml-5'>Kategori : </label>
                <select id='kategori' name='kategori' class='mt-2 ml-1 bg-black rounded-xl text-white pr-2 pl-2'>
                    @foreach($opsi as $kategori)
                        <option value={{ $kategori->kategori }}>{{ $kategori->kategori }}</option>
                    @endforeach
                </select>
            </div>

            <h1 class='mt-10'>*Edit Barang</h1>
            <div class='flex flex-row mt-5'>
                <input type='text' name='name' placeholder="Nama barang" class='border-b-2 border-black w-40' />
                <input type='text' name='newname' placeholder='Edit Nama Barang' class='border-b-2 border-black w-40 ml-5' />
            </div>

            <div>
                <h1 class='mt-7'>*Edit Jumlah Barang</h1>
                <input type='number' name='jumlah' placeholder='Jumlah Barang' class='border-b-2 border-black mt-5 w-40' />
            </div>

            <div class='flex flex-col mt-7'>
                <h1>*Edit Kondisi Barang</h1>
                <div class='flex flex-row mt-5'>
                    <input type='number' name='baik' placeholder='Barang Baik' class='border-b-2 border-black w-36' />
                    <input type='number' name='rusak' placeholder='Barang Rusak' class='border-b-2 border-black w-36 ml-5'  />
                </div>
            </div>

            <button type='submit' class='p-2 mt-2 rounded-xl pl-5 pr-5 bg-yellow-400'>Edit</button>

            @if( session('berhasil') )
                <p class='text-center text-yellow-600 text-md'>{{ session('berhasil') }}</p>
            @endif
        </form>
    </div>

@endsection
