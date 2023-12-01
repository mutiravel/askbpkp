@extends('layout.master')
@section('judul')
Update ASK BPKP
@endsection
@section('content')
<form action="/ask/{{$ask->id}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label class="form-label">Pertanyaan</label>
        <input type="text" name="tanya" value="{{old ('tanya',$ask->tanya)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Jawaban</label>
        <input type="text" name="jawab" value="{{old ('jawab',$ask->jawab)}}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/ask" class="btn btn-secondary btn sm">Kembali</a>
</form>
@endsection