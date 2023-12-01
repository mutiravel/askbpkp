@extends('layout.master')
@section('judul')
ASK BPKP
@endsection
@section('content')

<form action="/ask" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Pertanyaan</label>
        <input type="text" name="tanya" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Jawaban</label>
        <input type="text" name="jawab" class="form-control">
    </div>
    <br> <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection