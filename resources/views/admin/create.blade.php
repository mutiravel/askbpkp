@extends('layout.master')
@section('judul')
Admin ASK BPKP
@endsection
@section('content')

@if(Session::get('register_status'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{Session::get('register_status')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
@endif
<form action="registerUser" method="POST">
    @csrf
    <div class="mb-3">
        <label class="form-label">Nama</label>
        <input type="text" name="name" class="form-control">
    </div>
    @error('name')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="text" name="email" class="form-control">
    </div>
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">Confirm Password</label>
        <input type="password" name="confirm_password" class="form-control">
    </div>
    @error('confirm_password')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <div class="mb-3">
        <label class="form-label">No.Handphone</label>
        <input type="number" name="mobile" class="form-control">
    </div>
    @error('mobile')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <br> <button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection