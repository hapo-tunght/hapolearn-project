<!-- Login/Register form -->
<div class="login-register-form modal fade p-0" id="modalLogin">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content modal-content-custom border-0">
            <div class="modal-title">
                <ul class="nav nav-tabs w-100">
                    <li class="nav-item w-50">
                        <a class="nav-link active" data-toggle="tab" href="#login">LOGIN</a>
                    </li>
                    <li class="nav-item w-50">
                        <a class="nav-link" data-toggle="tab" href="#register">REGISTER</a>
                    </li>
                </ul>
                <button type="button" class="close-tab rounded-circle" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active" id="login" role="tabpanel"> 
                    <form class="container ">
                        <div class="form-group login-username">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group form-check-custom d-flex w-100 align-items-center">
                            <label class="form-check-label w-50">
                                <input class="form-check-input pr-2" type="checkbox">
                                <p class="ml-2 font-weight-bold">Remember me</p> 
                            </label>
                            <a href="#" class="w-50 mr-3 text-right"><u>Forgot password</u></a>
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
                <div class="tab-pane fade" id="register" role="tabpanel"> 
                    <form class="container register-form">
                        <div class="form-group register-username">
                            <label for="username">Username:</label>
                            <input type="text" class="form-control" id="username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Password:</label>
                            <input type="password" class="form-control" id="pwd">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Repeat Password:</label>
                            <input type="password" class="form-control" id="pwd">
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
