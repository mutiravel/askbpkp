@extends('layout.master')
@section('judul')
LAYANAN BPKP
@endsection
@section('content')

<form action="/layanan" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Pesan</label>
        <input type="text" name="pesan" class="form-control">
    </div>
    <br> <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection