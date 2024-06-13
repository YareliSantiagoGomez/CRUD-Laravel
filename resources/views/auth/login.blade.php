<!DOCTYPE html>
<html>
    
<head>
    <title> Login </title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/styles.css" type="text/css">
</head>

<body>
<div class="demo-container">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-12 mx-auto">
                <div class="text-center image-size-small position-relative">
                    <img src="https://e7.pngegg.com/pngimages/713/762/png-clipart-computer-icons-button-login-image-file-formats-logo.png" class="rounded-circle p-2 bg-white">
                    <div class="icon-camera">
                        <a href="" class="text-primary"><i class="lni lni-camera"></i></a>
                    </div>
                </div>
                <div class="p-5 bg-white rounded shadow-lg">
                    <h3 class="mb-2 text-center pt-5">Iniciar Sesion</h3>
                    <p class="text-center lead">Sign In to manage all your devices</p>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <label class="font-500"> Ingresar Email</label>
                        <input id="email" type="email" class="form-control form-control-lg mb-3 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <label class="font-500">Ingresar contraseña</label>
                        <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                        <div class="form-group pt-4">
                            <div class="custom-control custom-checkbox">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
						
                        <button type="submit" class="btn btn-primary btn-lg w-100 shadow-lg">INGRESAR</button>
                    </form>
                    <div class="text-center pt-4">
                        <p class="m-0">¿No tiene una cuenta? <a href="{{ route('register') }}" class="text-dark font-weight-bold">Registrate</a></p>
                    </div>          
                </div>        
            </div>
        </div>
    </div>
</div>

</body>
</html>
