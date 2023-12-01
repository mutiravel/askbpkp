@extends('layout.master')
@section('judul')
Data ASK BPKP
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
<a href="/ask/create" class="btn btn-primary btn-sm mb-4">Tambah Tanya Jawab</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">No</th>
            <th scope="col">Pertanyaan</th>
            <th scope="col">Jawaban</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($ask as $key => $item)
        <tr>
            <td>{{$key + 1}}</td>
            <td>{{ $item->tanya}}</td>
            <td>{{ $item->jawab }}</td>
            <td>
                <form action="/ask/{{$item->id}}" method="POST">
                    @csrf
                    @method('delete')
                    <a href="/ask/{{$item->id}}" class="btn btn-info btn-sm">Detail</a>
                    <a href="/ask/{{$item->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
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