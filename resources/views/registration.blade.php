<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body>
    <div class="container-fluid vh-100" style="margin-top:60px">
        <div class="" style="margin-top:50px">
            <div class="rounded d-flex justify-content-center">
                <div class="col-md-4 col-sm-12 shadow-lg p-5 bg-light">
                    <div class="text-center">
                        <h3 class="text-primary">Create Account</h3>
                    </div>
                    <div class="p-4">
                        <h3>Register User</h3>
                        @if(Session::get('register_status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{Session::get('register_status')}}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        @endif
                        <form action="registerUser" method="post">
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Name" required>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            @csrf
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-envelope text-white"></i></span>
                                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Email" required>
                            </div>
                            @error('email')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password" required>
                            </div>
                            @error('password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="password" name="confirm_password" value="{{ old('confirm_password') }}" class="form-control" placeholder="Confirm Password" required>
                            </div>
                            @error('confirm_password')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-primary"><i class="bi bi-key-fill text-white"></i></span>
                                <input type="number" name="mobile" value="{{ old('mobile') }}" class="form-control" placeholder="Enter Mobile Number" required>
                            </div>
                            @error('mobile')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <div class="d-grid col-12 mx-auto">
                                <button class="btn btn-primary" type="submit"><span></span> Sign up</button>
                            </div>
                            <p class="text-center mt-3">Already have an account?
                                <a href="login1"><span class="text-primary">Sign in</span></a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>