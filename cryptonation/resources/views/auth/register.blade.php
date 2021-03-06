<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/styles.css">
    <link rel="stylesheet" href="/css/responsive.css">
    <title>Sign Up</title>
</head>

<body>

    <div class="row g-5 mb-3">
        <div class="col-md-4 col-lg-4">

            <img src="/images/icons/astro.png" class="img-astro" alt="astraunot image">
        </div>
        <div class="col-md-1 col-lg-1">
        </div>
        <div class="col-md-6 col-lg-6 margin-top-large padding-for-sm">
            <h1 class="mb-3 bluish2 mt-5 mb-5">Get started</h1>
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row g-3 mt-1 mb-2">
                    <div class="col-sm-4">
                        <span>Already have an account?</span>
                    </div>
                    <div class="col-sm-2">
                        <a class="greenish" href="/login">Sign in</a>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="col-md-6 col-lg-4">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Full name" required autofocus>
                        <?php
                        $result = session()->get('result');
                        $res = session()->get('res');

                        if ($result != '') { ?>
                            <div class="text-danger mb-1" id="result1">{{$result}}</div>
                        <?php
                            session()->forget('result');
                            session()->forget('res');
                        }
                        ?>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6 col-lg-4">
                        <div class="input-group">
                            <input list="numbers" value="+971" name="phonecode" id="phonecode" class="greenish phonecode" required>
                            <datalist id="numbers">
                                @foreach($countries as $country)
                                <option value="+{{$country->phonecode}}">+{{$country->phonecode}}</option>
                                @endforeach
                            </datalist>
                            <span class="text-danger mb-4">@error('phone'){{ $message }} @enderror</span>
                            <input type="number" name="phone" id="phone" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        <span class="text-danger mb-4">@error('email'){{ $message }} @enderror</span>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6 col-lg-4">
                        <input type="date" class="form-control greenish" id="date" name="date" required>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6 col-lg-4">
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                    </div>
                </div>
                <div class="row g-3 mt-1">
                    <div class="col-md-6 col-lg-5">
                        <input class="form-check-input" type="checkbox" value="terms" id="terms" required>
                        <label class="form-check-label" for="flexCheckDefault">
                            I accept all terms and conditions
                        </label>
                    </div>
                </div>
                <div class="centered2">
                    <button class="w-40 btn btn-lg loginbtn mt-5 createbtn" type="submit">Create account</button>
                </div>
            </form>
        </div>
        <div class="col-md-2 col-lg-2">
        </div>
    </div>

</body>

</html>