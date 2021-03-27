@extends('template.app')

@section('body')

    <div class='flex flex-col place-self-center bg-white shadow-xl rounded-xl p-5 mt-5'>
        <div class='flex flex-col items-center'>
            <img src='/icons/box.png' class='w-20'/>
            <h1 class='text-center text-xl mt-5 bg-black p-2 rounded-xl text-white shadow-xl'>Semua Data Barang</h1>
        </div>

        @if( $total_data == 0 )
            <h1 class='text-center text-red-700 text-xl mt-10'>Barang Tidak Ditemukan</h1>
        @else
            <form action='/search' method='get' class='flex flex-col items-center justify-center'>
                @csrf
                <div>
                      <input type='text' placeholder='Cari barang...' class='mt-5 bg-black p-2 text-white shadow-xl rounded-xl' name='barang' />
                      <button class='bg-green-700 p-2 text-md ml-3 rounded-xl' value='x' name='cari'>Cari</button>
                </div>

                <div class='flex flex-row mt-5'>
                    <label for='kategori'>Kategori : </label>
                    <select name='kategori' id='kategori' class='bg-black text-white rounded-xl ml-2 pl-2'>
                        @foreach( $opsi as $kategori )
                            <option value={{ $kategori->kategori }}>{{ $kategori->kategori }}</option>
                        @endforeach
                    </select>

                    <label for='tempat' class='ml-5'>Tempat : </label>
                    <select name='tempat' id='tempat' class='bg-black text-white rounded-xl ml-2 pl-2'>
                        @foreach( $opsi as $tempat )
                            <option value={{ $tempat->tempat }}>{{ $tempat->tempat }}</option>
                        @endforeach
                    </select>

                    <label for='pengelola' class='ml-5'>Pengelola : </label>
                    <select name='pengelola' id='pengelola' class='bg-black text-white rounded-xl ml-2 pl-2'>
                         <option value="sma">Sma</option>
                         <option value="smp">Smp</option>
                         <option value="smk">Smk</option>
                    </select>
                </div>
            </form>

            <div class='bg-local'>
                <a href='/input' class='ml-5 bg-blue-700 text-white p-2 rounded-xl'>Tambah Data</a>
                <table class='table-auto mt-5'>
                    <thead>
                        <tr>
                            <th class='pl-5 pr-5'>ID</th>
                            <th class='pl-5 pr-5'>Barang</th>
                            <th class='pl-5 pr-5'>Kategori</th>
                            <th class='pl-5 pr-5'>Tempat</th>
                            <th class='pl-5 pr-5'>Jumlah</th>
                            <th class='pl-5 pr-5'>Baik</th>
                            <th class='pl-5 pr-5'>Rusak</th>
                            <th class='pl-5 pr-5'>Pengelola</th>
                            <th class='pl-5 pr-5'>Waktu</th>
                            <th class='pl-5 pr-5'>Action</th>
                        </tr>
                    </thead>

                    @foreach($db as $data)
                    <tbody class='p-10' border='1'>
                        <tr>
                            <td class='pl-6 pr-5 pt-5'>{{ $data->id }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->barang }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->kategori }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->tempat }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->jumlah }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->baik }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->rusak }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->pengelola }}</td>
                            <td class='pl-5 pr-5 pt-5'>{{ $data->waktu_di_tambahkan }}</td>
                            <td class='pl-5 pr-5 pt-5 flex flex-row'>
                                <form action='/delete/{{ $data->id }}' method='post'>
                                    @csrf
                                    <button type='submit' class='bg-red-700 p-2 rounded-xl'>Hapus</button>
                                    <a href='/edit' class='bg-yellow-600 p-2 rounded-xl ml-2'>Edit</a>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>

                <div>
                    {!! $db->links() !!}
                </div>

            </div>
        @endif
    </div>

@endsection
