<!doctype html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8" />
    <title> Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Web Karyawa Versi Beta" name="description" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    {{-- <link rel="shortcut icon" href="{{asset('/favicon.ico')}}"> --}}
    @include('layouts.assets.csstemplate')
</head>

<body>

    <div class="row">
        
        <div class="col-sm-4">
        </div>
        <div class="col-sm-4">
            <div class="my-5 pt-sm-5">
                <div class="container">
                    <div class="justify-content-center">
                        <div class="">
                            <form class="form-horizontal" method="POST" style="padding-top: 10px;" action="{{ route('login') }}">
                                {{ csrf_field() }}
                                
                                <label>Silahkan login kedalam sistem dengan email dan password.</label>
                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' &&  $errors->has('email') ? ' has-error' : '' }}">
                                    @if ($errors->has('email') or $errors->has('password'))
                                        <div class="alert alert-warning">
                                            <strong>Perhatian!</strong> Email Atau Password Salah
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                    <input type="text" name="email" autocomplete="off" id="email" class="form-control" id="email" placeholder="Masukan Email" value="{{ old('email') }}" autofocus>
                                    @if ($errors->has('email'))
                                    
                                    @endif
                                </div>
                                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password"  name="password" type="password" class="form-control" id="userpassword" placeholder="Masukan password" data-toggle="password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" onclick="password_show_hide();">
                                          <i class="fas fa-eye" id="show_eye"></i>
                                          <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                        </span>
                                    </div>

                                </div>
                                
                                <br>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="custom-control-input" id="customControlInline">
                                            <label class="custom-control-label" for="customControlInline">Remember me</label>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="">
                                    <div class="mt-3">
                                        <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Login</button>
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <a class="btn btn-info btn-block waves-effect waves-light" href="{{ route('register') }}">Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    @include('layouts.assets.jstemplate')
    <script type="text/javascript">
        function password_show_hide() {
          var x = document.getElementById("password");
          var show_eye = document.getElementById("show_eye");
          var hide_eye = document.getElementById("hide_eye");
          hide_eye.classList.remove("d-none");
          if (x.type === "password") {
            x.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            x.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
    </script>

</body>

</html>