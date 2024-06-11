<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
    <title>Login</title>
</head>

<body>
    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <div class="d-flex align-items-center justify-content-center col-sm-6 text-black">

                    <!-- <div class="px-5 ms-xl-4">
            <i class="fas fa-crow fa-2x me-3 pt-5 mt-xl-4" style="color: #709085;"></i>
            <span class="h1 fw-bold mb-0">Logo</span>
            </div> -->

                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-8 mt-5 pt-5 pt-xl-0 mt-xl-n8 style=">

                        <form method="POST" action="{{ route('authenticate') }}" style="width: 23rem;">
                            @csrf
                            <h3 class="fw-normal mb-0 pb-3" style="letter-spacing: 1px; text-align: center;">MASUK</h3>
                            <h6 class="fw-normal mb-3 pb-3 pb-0 pt-0" style="letter-spacing: 1px; text-align: center;">Masuk Ke SIM-PBB</h6>
                            <div class="mb-4">
                                <div class="form-outline">
                                    <input type="text" id="username" name="username" class="form-control form-control-lg">

                                    <label class="form-label" for="username">Username</label>

                                </div>
                                
                            </div>

                            <div class="mb-4">
                                <div class="form-outline ">
                                    <input type="password" id="password" name="password" class="form-control form-control-lg">

                                    <label class="form-label" for="password">Password</label>

                                </div>@if ($errors->has('eror'))
                                <span class="text-danger mt-0">{{ $errors->first('eror') }}</span>
                                @endif
                                
                            </div>


                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <div class="pt-1 mb-4">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                            </div>

                            <!-- <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Forgot password?</a></p> -->
                            <!-- <p>Don't have an account? <a href="#!" class="link-info">Register here</a></p> -->

                        </form>

                    </div>

                </div>

                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="{{ asset('image/side.svg') }}" alt="Login image" class="w-100 vh-100" style="object-fit: cover; object-position: left;">
                </div>
            </div>
        </div>
    </section>

    <!-- MDB -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
</body>

</html>