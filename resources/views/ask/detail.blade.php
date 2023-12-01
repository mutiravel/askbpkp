@extends('layout.master')
@section('judul')
Halaman Detail ASK Question
@endsection
@section('content')
<table>
    <tr>
        <td>Pertanyaan</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$ask->tanya}}</td>
    </tr>
    <tr>
        <td>Jawaban</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$ask->jawab}}</td>
    </tr>
</table>
<a href="/ask" class="btn btn-secondary btn sm">Kembali</a>
@endsection