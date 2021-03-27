@extends('template.app')

@section('body')
        <div class='flex flex-col mt-10 place-self-center shadow-xl rounded-xl bg-white'>
            <div class='p-10'>
                <div class='flex flex-col justify-center items-center'>
                    <img src='/icons/crud/input.png' class='w-14'/>
                    <h1 class='text-center text-xl mt-5'>Form isi inventory</h1>
                </div>

                <form class='mt-8' method='post' action='/input/data'>
                    @csrf
                    <div class='flex flex-row'>
                        <input type='text' name='nama' class='border-b-2 border-black hover:border-green-800 duration-700' placeholder='Nama Barang'/>
                        <input type='number' name='jumlah' placeholder='Jumlah Keseluruhan' class='border-b-2 border-black w-44 ml-5'/>
                    </div>

                    <label id='tempat'>Tempat : </label>

                    <select id='tempat' name='tempat' class='mt-10 bg-black text-white rounded-xl pl-2 pr-2'>
                        @foreach( $opsi as $tempat )
                            <option value={{ $tempat->tempat }}>{{ $tempat->tempat }}</option>
                        @endforeach
                    </select>

                    <div class='mt-5'>
                        <label for='kategori'>Kategori : </label>
                        <select id='kategori' name='kategori' class='bg-black rounded-xl text-white pl-2 pr-2'>
                            @foreach( $opsi as $kategori )
                                <option value={{ $kategori->kategori }}>{{ $kategori->kategori }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class=' mt-7'>
                        <h1>Kondisi Barang</h1>
                        <input type='number' name='baik' placeholder='Jumlah Barang Baik' class='border-b-2 border-black w-40'/>
                        <input type='number' name='rusak' placeholder='Jumlah Barang Rusak' class='border-b-2 border-black w-44 ml-5'/>
                    </div>
                    <button class='mt-5 bg-green-800 p-2 rounded-xl shadow-xl' type='submit'>Kirim</button>
                    @if( session('berhasil') )
                        <p class='text-center text-md text-green-800'>{{ session('berhasil') }}</p>
                    @endif

                </form>
            </div>
        </div>
@endsection
