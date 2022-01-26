<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/styles.css">
        <link rel="stylesheet" href="/css/responsive.css">
        <title>Sign in</title>
    </head>

    <body>


        <div class="row g-5 mt-3 mb-3">
            <div class="col-md-4 col-lg-4">
                <img src="/images/icons/astro.png" class="img-astro" alt="astraunot image">
            </div>
            <div class="col-md-2 col-lg-2">
            </div>
            <div class="col-md-6 col-lg-6 margin-top-large padding-for-sm">
                <h1 class="mb-3 greenish mt-5">Welcome back</h1>
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row g-3 mt-1 mb-2">
                        <div class="col-sm-4">
                            <span>Don't have an account?</span>
                        </div>
                        <div class="col-sm-2">
                            <a class="bluish2" href="/register">Sign up</a>
                        </div>
                    </div>
                    <div class="row g-3">
                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email"
                                :value="old('email')" required>
                        </div>
                    </div>
                    <div class="row g-3 mt-2">
                        <div class="col-sm-12 col-lg-6 col-md-6">
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password" required autocomplete="current-password">
                        </div>
                    </div>
                    <div class="row g-3 mt-1 mb-2">
                        <div class="col-sm-3">
                            <span>Forgot password?</span>
                        </div>
                        <div class="col-sm-3">
                            <a class="bluish2" href="/forgot-password">Reset password</a>
                        </div>
                    </div>
                    <div class="centered2 mt-4">
                        <button class="w-40 btn btn-lg loginbtn mt-5" type="submit">Sign in</button>
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-lg-2">
                &nbsp;
            </div>
        </div>


    </body>

</html>