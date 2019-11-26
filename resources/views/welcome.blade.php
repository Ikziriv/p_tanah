<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PT. Maja Raya Indah Semesta</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Montserrat', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 34px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }

            #particles-js{
              position:fixed;
              top:0;
              right:0;
              bottom:0;
              left:0;
              z-index:0; 
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- <div id="particles-js"></div> --}}
            {{-- // --}}
            <div class="content">
                {{-- <div style="
                background: #343a40;
                color: white;
                padding: 0 10px;
                letter-spacing: 10px;">
                    <div class="title m-b-md">
                       <p class="font-weight-bold">PT. TANAH TINGGI</p>
                    </div>
                    
                </div> --}}
                <div class="card col-md-12" style="opacity: 70%">
                    <div class="card-title text-uppercase text-right mt-3">
                        <b>Login</b>
                    </div>
                    <div class="card-body">

                        <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-12 control-label text-left">E-Mail Address</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-12 control-label text-left">Password</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

{{--                             <div class="form-group">
                                <div class="col-md-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ingatkan saya
                                        </label>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="form-group mt-5">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-block btn-sm btn-dark">
                                        Sign in
                                    </button>

                                    {{-- <a class="btn btn-link" href="{{ route('password.request') }}">
                                        Forgot Your Password?
                                    </a> --}}
                                </div>
                            </div>
                        </form>
                            
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>

{{--         <script type="text/javascript">
            particlesJS.load('particles-js', 'particles.json', function(){
                console.log('particles.json Loaded!');
            });
        </script> --}}
    </body>
</html>
