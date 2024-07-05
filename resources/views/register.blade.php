<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-6">
        <div class="card">
          <div class="card-header">
            Register
          </div>
          <div class="card-body">
            <form action="{{route('register.user')}}" method="post">
                @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                @csrf
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Enter username">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="Enter email">
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter password">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
              </div>
              <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="password_confirmation" placeholder="Confirm password">
              </div>
              <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary">Register</button>
                <a href="/" class="">All ready registered !! login here</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
