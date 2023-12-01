@extends('layout.master')
@section('judul')
Halaman Detail Admin ASK Question
@endsection
@section('content')
<table>
    <tr>
        <td>Nama</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$user->name}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$user->email}}</td>
    </tr>
    <tr>
        <td>Password</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$user->password}}</td>
    </tr>
    <tr>
        <td>No.Handphone</td>
        <td>&nbsp;:&nbsp;</td>
        <td>{{$user->mobile}}</td>
    </tr>
</table>
<a href="/admin" class="btn btn-secondary btn sm">Kembali</a>
@endsection