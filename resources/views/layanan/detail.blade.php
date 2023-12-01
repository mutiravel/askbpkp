@extends('layout.master')
@section('judul')
Halaman Detail LAYANAN
@endsection
@section('content')
<table>
    <tr>
        <td>Nama Lengkap</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$layanan->nama}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$layanan->email}}</td>
    </tr>
    <tr>
        <td>Subject</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$layanan->subject}}</td>
    </tr>
    <tr>
        <td>Pesan</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$layanan->pesan}}</td>
    </tr>
</table>
<a href="/layanan" class="btn btn-secondary btn sm">Kembali</a>
@endsection