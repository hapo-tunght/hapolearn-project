<!-- HEADER -->
    <header id="header" class="container-fluid position-relative p-0 header">
        <nav class="navbar container-fluid navbar-expand-sm h-100 p-0 navbar-light bg-light sticky-top navbar-element">
            <div class="container-fluid navbar-cover p-0 w-100 h-100">
                <a class="navbar-branch navbar-branch-element col-sm-12" href="#">
                    <img src="{{ asset('img/hapo_learn_header.png') }}" alt="Logo">
                </a>
                <button class="navbar-toggler navbar-toggler-element" type="button" data-toggle="collapse"
                    data-target="#navbarReponsive">
                    <i class="fas fa-bars"></i>
                    <i class="fas fa-times d-none"></i>
                </button>
                <div class="collapse navbar-collapse col-xs-12 col-sm-12 navbar-collapse-element" id="navbarReponsive">
                    <ul class="navbar-nav w-100 d-flex justify-content-end">
                        <li class="nav-item">
                            <a href="#" class="nav-link active navbar-link-element">HOME</a>
                        </li>
                        <li class="nav-item ">
                            <a href="#" class="nav-link navbar-link-element">ALL COURSES</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link navbar-link-element" data-toggle="modal"
                                data-target="#modalLogin">LOGIN/REGISTER</a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link navbar-link-element">PROFILE</a>
                        </li>
                    </ul>
                </div>
            </div>           
        </nav>
    </header>
    @include('auth.modal')
    <!-- CLOSE HEADER -->