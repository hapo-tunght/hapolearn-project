<!-- Login/Register form -->
<div class="login-register-form modal fade p-0" id="login-register-modal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-custom border-0">
            <div class="modal-title">
                <ul class="nav nav-tabs w-100">
                    <li class="nav-item w-50">
                        <a id="login-nav-tab" class="nav-link login-nav-tab active" data-toggle="tab" role="tab" href="#login-tab">LOGIN</a>
                    </li>
                    <li class="nav-item w-50">
                        <a id="register-nav-tab" class="nav-link register-nav-tab" data-toggle="tab" role="tab" href="#register-tab">REGISTER</a>
                    </li>
                </ul>
                <button type="button" class="close-tab rounded-circle" data-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="login-tab" role="tabpanel"> 
                    <form method="POST" action="{{ route('login') }}" class="container">
                        @csrf

                        <div class="form-group login-username">
                            <label for="username">Username:</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group form-check-custom d-flex w-100 align-items-center">
                            <label class="form-check-label w-50">
                                <input class="form-check-input pr-2" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <p class="ml-2 font-weight-bold" for="remember">Remember me</p> 
                            </label>

                             @if (Route::has('password.request'))
                                    <a class="w-50 mr-3 text-right" href="{{ route('password.request') }}">
                                        <u>Forgot password</u>
                                    </a>
                            @endif
                        </div>
                        <div class="button-cover w-100 d-flex justify-content-center">
                            <button type="submit" class="btn">LOGIN</button>
                        </div>                          
                        <div class="container-fluid login-with d-flex align-items-center p-0 mt-3">
                            <div class="horizontal-rule"><hr></div>
                            <p>Login with</p>
                            <div class="horizontal-rule"><hr></div>
                        </div>
                        <div class="login-with-account d-flex flex-column align-items-center">
                            <a href="#" class="login-with-account-google btn mt-3 d-flex justify-content-center align-items-center">
                                <i class="fab fa-google-plus-g mr-2"></i> Google
                            </a>
                            <a href="#" class="login-with-account-facebook btn mt-3 mb-5 d-flex justify-content-center align-items-center">
                                <i class="fab fa-facebook-f mr-2"></i> Facebook
                            </a>
                        </div>                         
                    </form>
                </div>

                
                <div class="tab-pane fade" id="register-tab" role="tabpanel"> 
                    <form method="POST" action="{{ route('register') }}" class="container register-form">
                        @csrf

                        <div class="form-group register-username">
                            <label for="username">Username:</label>
                             <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Password:</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Repeat Password:</label>
                            <input id="passwordr_confirmation" type="password" class="form-control" name="password_confirmation" >
                        </div>
                        <div class="button-cover w-100 d-flex justify-content-center">
                            <button type="submit" class="btn button-register">REGISTER</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
