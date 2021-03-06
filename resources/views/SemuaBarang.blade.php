@extends('template.app')

@section('body')

    <div class='flex flex-col place-self-center bg-white shadow-xl rounded-xl p-5 mt-5 mb-10'>
        <div class='flex flex-col items-center'>
            <img src='{{ env("IMG") }}/icons/box.png' class='w-20'/>
            <h1 class='text-center text-xl mt-5 bg-black p-2 rounded-xl text-white shadow-xl'>Semua Data Barang</h1>
        </div>

        @if( $total_data == 0 )
            @if( $aset->count() == 0 || $tempat->count() == 0 || $pengelola->count() == 0 || $sumberdana->count() == 0 )
                <h1 class='text-center text-red-700 text-xl mt-10'>Barang Tidak Ditemukan</h1>
                <div class='flex flex-col items-center mt-5'>
                    <a href='{{ url('/input') }} ' class='bg-green-600 p-2 text-white rounded-xl'>Input Barang</a>
                </div>
                <h1 class='flex place-self-center mt-5'>Atau</h1>
                <a href={{ url('/semuabarang/import') }} class='flex place-self-center bg-yellow-600 p-2 rounded-md mt-5'>Import Barang</a>
            @endif
        @else
            <form action='{{ url('/semuabarang') }} ' method='get' class='flex flex-col items-center justify-center'>
                @csrf
                <div>
                      <input type='text' placeholder='Cari barang...' class='mt-5 bg-black p-2 text-white shadow-xl rounded-xl' name='nama' />
                      <button class='bg-green-700 p-2 text-md ml-3 rounded-xl' value='x' name='cari'>Cari</button>
                </div>

                <div class='flex flex-row mt-5'>
                    <label for='kategori'>Kelompok Aset : </label>
                    <select name='kelompokaset' id='kategori' class='bg-black text-white rounded-xl ml-2 pl-2'>
                        @foreach( $aset as $kategori )
                            <option value={{ $kategori->nama }}>{{ $kategori->nama }}</option>
                        @endforeach
                    </select>

                    <label for='tempat' class='ml-5'>Tempat : </label>
                    <select name='tempat' id='tempat' class='bg-black text-white rounded-xl ml-2 pl-2'>
                        @foreach( $ruangan as $tempat )
                            <option value={{ $tempat->kode }}>{{ $tempat->nama }}</option>
                        @endforeach
                    </select>
                    
                    @if( $role == 'admin' )
                        <label for='pengelola' class='ml-5'>Pengelola : </label>
                        <select name='pengelola' id='pengelola' class='bg-black text-white rounded-xl ml-2 pl-2'>
                            @foreach( $pengelola as $user )
                                <option value={{ $user->pengelola }}>{{ $user->pengelola }}</option>
                            @endforeach
                        </select>
                    @endif

                    <label for='sumberaset' class='ml-5'>Sumber Aset : </label>
                    <select id='sumberaset' name='sumberaset' class='ml-2 bg-black text-white pl-2 rounded-xl'>
                        @foreach( $sumberdana as $sumberaset )
                            <option value={{ $sumberaset->nama }}>{{ $sumberaset->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </form>

            <div class='bg-local mt-10'>
                <div class='flex flex-row justify-between'>
                    <div>
                        <a href='{{ url('/input') }} ' class='ml-5 bg-blue-700 text-white p-2 rounded-xl'>Tambah Data</a>
                    </div>
                    <div>
                        <a href="{{ url('/semuabarang/import') }}" class='bg-yellow-600 rounded-xl p-2 text-white mr-5'>Import Excel</a>
                        <a href='{{ url('/semuabarang/excel') }}' class='bg-green-600 rounded-xl p-2 text-white '>Download Excel</a>
                    </div>
                </div>
                <table class='table-auto mt-5'>
                    <thead>
                        <tr>
                            <th class='pl-5 pr-5'>Pengelola</th>
                            <th class='pl-5 pr-5'>Kode</th>
                            <th class='pl-5 pr-5'>Nama</th>
                            <th class='pl-5 pr-5'>Jenis</th>
                            <th class='pl-5 pr-5'>Merk</th>
                            <th class='pl-5 pr-5'>Tahun Pembelian</th>
                            <th class='pl-5 pr-5'>Sumber Perolehan</th>
                            <th class='pl-5 pr-5'>Harga Beli</th>
                            <th class='pl-5 pr-5'>Action</th>
                        </tr>
                    </thead>

                    @foreach($db as $data)
                    <tbody class='p-10' border='1'>
                        <tr>
                            <td class='pl-6 pr-5 pt-5'>{{ $data->pengelola }}</td>
                            <td class='pl-6 pr-5 pt-5'>{{ $data->kode }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->nama }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->jenis }}</td>
                            <td class='pl-5 pr-5'>{{ $data->merk }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->tahun_pembelian }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->sumber_dana }}</td>
                            <td class='pl-5 pr-5 pt-5'>Rp.{{ $data->harga }}</td>
                            <td class='pl-5 pr-5 pt-5 flex flex-row'>
                                <form action='{{ url('/delete/') }}/{{ $data->id }}' method='post'>
                                    @csrf
                                    <button type='submit' class='bg-red-700 p-2 rounded-xl'>Hapus</button>
                                    <a href='{{ url('/edit/') }}/{{ $data->id }}' class='bg-yellow-600 p-2 rounded-xl ml-2'>Edit</a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

                <div>
                    {!! $db->links() !!}
                </div>
            <script>
                if("{{ session('berhasil') }}"){
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data Berhasil Di Hapus',
                        icon: 'success'
                    })
                }
            </script>
            </div>
        @endif
    </div>

@endsection
