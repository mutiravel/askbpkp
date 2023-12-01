@extends('layout.master')
@section('judul')
Update layanan BPKP
@endsection
@section('content')
<form action="/layanan/{{$layanan->id}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label class="form-label">Nama Lengkap</label>
        <input type="text" name="nama" value="{{old ('nama',$layanan->nama)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" value="{{old ('email',$layanan->email)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Subject</label>
        <input type="text" name="subject" value="{{old ('subject',$layanan->subject)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Pesan</label>
        <input type="text" name="pesan" value="{{old ('pesan',$layanan->pesan)}}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/layanan" class="btn btn-secondary btn sm">Kembali</a>
</form>
@endsection