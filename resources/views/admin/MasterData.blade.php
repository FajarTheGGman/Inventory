@extends('template.app')

@section('body')

    <div class='flex flex-col place-self-center bg-white shadow-xl mt-20 p-5 rounded-xl'>
        <div class='flex items-center flex-col'>
            <img src='/icons/masterdata.png' class='w-20' />
            <h1 class='text-center text-xl bg-black rounded-xl mt-5 p-2 text-white'>Master Data</h1>
        </div>



            
            @if( $data->count() == 0 )
                <div class='flex flex-col items-center'>
                    <a href='/admin/masterdata/input' class='bg-blue-700 flex justify-center place-self-center mt-10 p-2 rounded-xl'>Tambahkan Data</a>
                    <h1 class='text-center text-red-700 mt-5'>Master Data Kosong, Silahkan klik tombol di atas</h1>
                </div>
            @else
            <a href='/admin/masterdata/input' class='bg-blue-700 flex justify-start place-self-start mt-10 p-2 rounded-xl'>Tambahkan Data</a>
              <table class='table-auto mt-3'>
                    <thead>
                        <tr>
                            <th class='pl-5 pr-5'>ID</th>
                            <th class='pl-5 pr-5'>Tempat</th>
                            <th class='pl-5 pr-5'>Kategori</th>
                            <th class='pl-5 pr-5'>Action</th>
                        </tr>
                    </thead>

                    @foreach($data as $x)
                    <tbody class='p-10' border='1'>
                        <tr>
                            <td class='pl-6 pr-5 pt-5'>{{ $x->id }}</td>
                            <td class='pl-6 pr-5 pt-5'>{{ $x->tempat }}</td>
                            <td class='pl-6 pr-5 pt-5'>{{ $x->kategori }}</td>
                            <td class='pl-5 pr-5 pt-5 flex flex-row'>
                                <form action='/admin/masterdata/delete/{{ $x->id }}' method='post'>
                                    @csrf
                                    <button type='submit' class='bg-red-700 p-2 rounded-xl'>Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
               </table>
               {!! $data->links() !!}
            @endif
</div>

@endsection