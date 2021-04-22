@extends('template.app')

@section('body')
        <div class='flex flex-col mt-10 place-self-center shadow-xl rounded-xl bg-white p-5 mb-10'>
            @if( $tempat->count() == 0 || $aset->count() == 0 || $dana->count() == 0 )
                @if( $role == 'admin' )
                    <strong class='text-center mt-2 text-red-800'>Isi form master data terlebih dahulu !</strong>
                    <a href='{{ url('/profile') }} ' class='flex bg-green-700 rounded-xl place-self-center mt-2 text-white p-2'>Master Data</a>
                @else
                    <strong class='text-center mt-2 text-red-800'>Master Data Kosong!, silahkan login sebagai admin dan isi master data</strong>
                @endif
            @else
            <div class='p-10'>
                <div class='flex flex-col justify-center items-center'>
                    <img src='{{ env("IMG") }}/icons/crud/input.png' class='w-14'/>
                    <h1 class='text-center text-xl mt-5'>Form isi inventory</h1>
                </div>

                <form class='mt-8' method='post' action='{{ url('/input/data') }} '>
                    @csrf
                    <div class='flex flex-col'>
                        <input type='text' name='nama' class='border-b-2 border-black hover:border-green-800 duration-700' placeholder='Nama Barang'/>
                        <input type='number' name='tahunbeli' class='border-b-2 border-black mt-5' placeholder='Tahun Pembelian' />
                        <div class="flex flex-row mt-3">
                            <label for='j'>Jenis : </label>
                            <select id="j" name="jenis" class="bg-black text-white rounded-xl pl-2 ml-2">
                                <option cl>Furniture</option>
                                <option>Elektronik</option>
                            </select>
                        </div>
                        <input type='text' name='merk' class='border-b-2 border-black mt-2' placeholder='Merk Spek' />
                        <input type='number' name='jumlah' class='border-b-2 border-black mt-5' placeholder='Jumlah' />
                        <input type='number' name='harga' class='border-b-2 border-black mt-5' placeholder='Harga Beli' />
                        <input type='text' name='keterangan' class='border-b-2 border-black mt-5' placeholder='Keterangan'/>
                    </div>

                    <label id='tempat'>Tempat : </label>

                    <select id='tempat' name='tempat' class='mt-10 bg-black text-white rounded-xl pl-2 pr-2'>
                        @foreach( $tempat as $ruangan )
                            <option value={{ $ruangan->kode }}>{{ $ruangan->nama }}</option>
                        @endforeach
                    </select>

                    <div class='mt-5'>
                        <label for='kategori'>Kelompok Aset : </label>
                        <select id='kategori' name='kelompokaset' class='bg-black rounded-xl text-white pl-2 pr-2'>
                            @foreach( $aset as $kategori )
                                <option value={{ $kategori->nama }}>{{ $kategori->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class='flex flex-row mt-7'>
                        <h1>Kondisi Barang : </h1>
                        <select name='kondisi' class='bg-black rounded-xl pl-2 text-white ml-2'>
                            <option value="baik">Baik</option>
                            <option value="kurang baik">Kurang Baik</option>
                            <option value="rusak">Rusak</option>
                        </select>
                    </div>
                    
                    <div class='flex flex-row mt-5'>
                        <h1>Sumber Aset : </h1>
                        <select name='sumberdana' class='bg-black rounded-xl text-white ml-2 pl-2 pr-2'>
                            @foreach( $dana as $sumberdana )
                                <option>{{ $sumberdana->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button class='mt-5 bg-green-800 p-2 rounded-xl shadow-xl' type='submit'>Kirim</button>

                    <script>
                        if("{{ session('berhasil') }}"){
                            Swal.fire({
                                title: 'Berhasil',
                                text: 'Data Berhasil Di Tambahkan',
                                icon: 'success'
                            })
                        }
                    </script>

                </form>
            </div>
        @endif
        </div>
        <a href={{ url('/semuabarang') }} class='flex place-self-center bg-yellow-600 rounded-xl p-3 text-xl mb-10'>Kembali</a>
@endsection
