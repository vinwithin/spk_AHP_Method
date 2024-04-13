@extends('layout/index')
@section('nilai')
    <div class="d-flex card shadow p-3">
        <h1 class="p-2">Data Nilai</h1>
        <div class="table-responsive col-lg-10 ">




            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th></th>
                        @foreach ($kriteria as $item)
                            <th scope="col">{{ $item->nama_kriteria }}</th>
                        @endforeach
                        
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach ($nilais as $key => $val)
                    <tr>
                        <td>{{ $kriteria[$key-1]->nama_kriteria }}</td>
                        @foreach ($val as $k => $v)
                            <td>{{ $v }}</td>
                        @endforeach
                        
                       
                    </tr>
                    
                    @endforeach
                    <tr>
                        <td>Total</td>
                        @foreach ($total as $item)
                            <td class="fw-bold">{{ $item }}</td>
                        @endforeach
                    </tr>
                    
                    </tr>
                </tbody>
            </table>

        </div>

    </div>
@endsection
