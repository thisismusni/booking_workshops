<header id="header" data-transparent="true" data-fullwidth="false" class="
@if(Request::is('/*')  || Request::is('cooperation*')) 
{{ 'dark submenu-light' }} 
@else  
{{ 'light' }} shadow
@endif ">
    <div class="header-inner">
        <div class="container">
            <!--Logo-->
            <div id="logo">
                <a href="{{ route('home') }}">
                    <span class="logo-default" style="padding-bottom: 10px">
                        {{ config('app.name', 'Laravel') }}
                    </span>
                    <span class="logo-dark" style="padding-bottom: 10px">
                        {{ config('app.name', 'Laravel') }}
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
                            <li><a href=""></a>{{ auth()->user()->name }}</a></li>
                            @endguest
                        </ul>
                    </nav>
                </div>
            </div>
            <!--end: Navigation-->
        </div>
    </div>
</header>