@extends('layout.master')
@section('judul')
Update ASK BPKP
@endsection
@section('content')
<form action="/admin/{{$user->id}}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" value="{{old ('name',$user->name)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" value="{{old ('email',$user->email)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="text" name="password" value="{{old ('password',$user->password)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="text" name="confirm_password" value="{{old ('confirm_password',$user->confirm_password)}}" class="form-control">
    </div>
    <div class="mb-3">
        <label class="form-label">No.Handphone</label>
        <input type="text" name="mobile" value="{{old ('mobile',$user->mobile)}}" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    <a href="/admin" class="btn btn-secondary btn sm">Kembali</a>
</form>
@endsection