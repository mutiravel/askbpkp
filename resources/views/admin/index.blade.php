@extends('layout.master')
@section('judul')
Data Admin ASK BPKP
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
<a href="register" class="btn btn-primary btn-sm mb-4">Tambah</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Email</th>
            <th scope="col">No.Handphone</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{ $item->name}}</td>
            <td>{{ $item->email }}</td>
            <td>{{ $item->mobile }}</td>
            <td>
                <form action="/admin/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/admin/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/admin/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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