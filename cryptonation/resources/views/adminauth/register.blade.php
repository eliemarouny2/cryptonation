<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>

<div class="container">
   <div class="row" style="margin-top:45px">
      <div class="col-md-4 col-md-offset-4">
           <h4>Register | Custom Auth</h4><hr>
           <form action="{{ route('adminauth.save') }}" method="post">

           @if(Session::get('success'))
             <div class="alert alert-success">
                {{ Session::get('success') }}
             </div>
           @endif

           @if(Session::get('fail'))
             <div class="alert alert-danger">
                {{ Session::get('fail') }}
             </div>
           @endif

           @csrf
           <div class="form-group">
                 <label>Name</label>
                 <input type="text" class="form-control" name="name" placeholder="Enter full name" value="{{ old('name') }}">
                 <span class="text-danger">@error('name'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Email</label>
                 <input type="text" class="form-control" name="email" placeholder="Enter email address" value="{{ old('email') }}">
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
              </div>
              <div class="form-group">
                 <label>Password</label>
                 <input type="password" class="form-control" name="password" placeholder="Enter password">
                 <span class="text-danger">@error('password'){{ $message }} @enderror</span>
              </div>
              <button type="submit" class="btn btn-block btn-primary">Sign Up</button>
              <br>
              <a href="{{ route('adminauth.login') }}">I already have an account, sign in</a>
           </form>
      </div>
   </div>
</div>
    
</body>
</html>