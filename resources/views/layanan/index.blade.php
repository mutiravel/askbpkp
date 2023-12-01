@extends('layout.master')
@section('judul')
Data LAYANAN BPKP
@endsection

@push('scripts')

<script src="{{ asset('template/plugins/datatables/jquery.dataTables.js')}}"></script>
<script src="{{ asset('template/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
<script>
    $(function() {
        $("#example1").DataTable();
    });
</script>

@endpush

@push('style')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css" />
@section('content')
<a href="/layanan/create" class="btn btn-primary btn-sm mb-4">Tambah</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama Lengkap</th>
            <th scope="col">Email</th>
            <th scope="col">Subject</th>
            <th scope="col">Pesan</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($layanan as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{ $item->nama}}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->subject}}</td>
            <td>{{ $item->pesan}}</td>
            <td>
                <form action="/layanan/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/layanan/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/layanan/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                    <input type="submit" value="delete" class="btn btn-danger btn-sm">
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td>Tidak ada di table </td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection