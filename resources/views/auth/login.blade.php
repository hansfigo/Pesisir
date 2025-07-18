<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('datum') }}/assets/images/favicon.ico" />

    <link rel="stylesheet" href="{{ asset('datum') }}/assets/css/backend-plugin.min.css">
    <link rel="stylesheet" href="{{ asset('datum') }}/assets/css/backend.css?v=1.0.0">
</head>

<body class=" ">
    <div class="wrapper">
        <section class="login-content">
            <div class="container h-100">
                <div class="row align-items-center justify-content-center h-100">
                    <div class="col-md-5">
                        <div class="card p-3">
                            <div class="card-body">
                                <h3 class="mb-3 font-weight-bold text-center">Log In</h3>
                                <form method="POST" action="{{ route('login.post') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label class="text-secondary">Username</label>
                                                <input class="form-control" type="text" name="username"
                                                    placeholder="Enter Username">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mt-2">
                                            <div class="form-group">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <label class="text-secondary">Password</label>
                                                </div>
                                                <input class="form-control" type="password" name="password"
                                                    placeholder="Enter Password">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mt-2">Log In</button>
                                    <div class="col-lg-12 mt-3">
                                        <p class="mb-0 text-center">Don't have an account?
                                            <a href="{{ route('register') }}">Register</a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    @include('layout.script')

</html>
