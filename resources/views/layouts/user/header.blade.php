<header id="header" data-transparent="true" data-fullwidth="false" class="
@if(Request::is('/*')) 
{{ 'dark submenu-light' }} shadow
@else  
{{ 'light' }} shadow
@endif ">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="{{ route('home') }}">
                    <span class="logo-default">
                        <h6>
                            Marannu
                        </h6>
                    </span>
                    <span class="logo-dark">
                        <h6>
                            Marannu
                        </h6>
                    </span>
                </a>
            </div>
            <!--End: Logo-->

            <!-- Modal -->
            <div id="modalLogin" class="modal no-padding" data-delay="3000" style="max-width: 780px;">
                <div class="row">
                    <div class="col-md-6 no-padding"
                        style="background: transparent url(user-template/images/login-bg.jpg) no-repeat scroll center top / cover; height:470px;">
                    </div>
                    <div class="col-md-6">
                        <div class="p-40 p-t-60 p-xs-20">
                            <h3>Sign up or Login</h3>
                            <form class="form-grey-fields" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <label class="sr-only">Username or Email</label>
                                    <input placeholder="Username or Email" name="email" value="{{ old('email') }}"
                                        class="form-control @error('email') is-invalid @enderror" type="text">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group m-b-5">
                                    <label class="sr-only">Password</label>
                                    <input placeholder="Password"
                                        class="form-control @error('password') is-invalid @enderror" type="password"
                                        name="password" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group form-inline text-left m-b-10 ">
                                    <a class="right" href="resetpassword.html">
                                        <p><small>Lost your Password? Reset</small></p>
                                    </a>
                                </div>
                                <div class="text-left form-group">
                                    <button type="submit" class="btn btn-rounded" type="button">Login</button>
                                </div>
                            </form>
                            <p class="text-left">Don't have an account yet? <a href="register.html">Register New
                                    Account</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!--end: Modal -->

            <!--Navigation Resposnive Trigger-->
            <div id="mainMenu-trigger">
                <a class="lines-button x"><span class="lines"></span></a>
            </div>
            <!--end: Navigation Resposnive Trigger-->
            <!--Navigation-->
            <div id="mainMenu">
                <div class="container">
                    <nav>
                        <ul>
                            @guest
                            <li><button href="#modalLogin" data-lightbox="inline"
                                    class="btn btn-rounded btn-modal">LOGIN</button></li>
                            @else
                            <div class="p-dropdown">
                                <a class="text-center"> {{ auth()->user()->name }}
                                </a>
                                <div class="p-dropdown-content">
                                    <div class="widget-myaccount">
                                        <ul class="text-left">
                                            <li>
                                                <a href="#">
                                                    <i class="icon-user"></i>
                                                    Profile
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#">
                                                    <i class="icon-clock"></i>
                                                    Activity logs
                                                </a>
                                            </li>
                                            <li>
                                                <a class="btn btn-sm btn-danger font-weight-bolder"
                                                    href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>