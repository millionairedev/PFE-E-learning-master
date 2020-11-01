 <head>
        <meta charset="utf-8">
        <title>Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- LINEARICONS -->
        <link rel="stylesheet" href="../assets/fonts/linearicons/style.css">
        
        <!-- STYLE CSS -->
        <link rel="stylesheet" href="../assets/css/style.css">
    </head>




        <div class="wrapper">
            <div class="inner">
                <img src="../assets/img/image-1.png" alt="" class="image-1">
                  <form method="POST" action="{{ route('login') }}">
                        @csrf
                     <h3>Connectez vous !</h3>
                        <div class="form-holder ">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-Mail ') }}</label>

                            <div class="col-md-6">
                                 <span class="lnr lnr-envelope"></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-holder">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>


                            <div class="col-md-6">
                                 <span class="lnr lnr-lock"></span>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Se souvenir de moi') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Mot de passe oublié ?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                <img src="../assets/img/image-2.png" alt="" class="image-2">
            </div>
            
        </div>
        <script src="../assets/js/main.js"></script>




