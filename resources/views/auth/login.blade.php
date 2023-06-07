<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />


    <div class="container position-sticky z-index-sticky top-0">
        <div class="row">
            <div class="col-12">
                <!-- Navbar -->
                <nav
                    class="navbar navbar-expand-lg blur blur-rounded top-0 z-index-3 shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
                    <div class="container-fluid pe-0">
                        <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 " href="../pages/dashboard.html">
                            Nwabpur Govt. High School, Dhaka
                        </a>
                        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon mt-2">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </span>
                        </button>

                    </div>
                </nav>
                <!-- End Navbar -->
            </div>
        </div>
    </div>

    <main class="main-content  mt-0">
        <section>
            <div class="page-header min-vh-75">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                            <div class="card card-plain mt-8">
                                <div class="card-header pb-0 text-left bg-transparent">
                                    <h3 class="font-weight-bolder text-info text-gradient">Welcome back</h3>
                                    <p class="mb-0">Enter your email and password to sign in</p>
                                </div>
                                <div class="card-body">
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email Address -->
                                        <x-input-label for="email" :value="__('Email')" />
                                        <div class="mb-3">
                                            <x-text-input id="email" class="form-control" type="email"
                                                name="email" :value="old('email')" required autofocus
                                                autocomplete="username" placeholder="Email" aria-label="Email"
                                                aria-describedby="email-addon" />

                                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                        </div>

                                        <!-- Password -->
                                        <x-input-label for="password" :value="__('Password')" />
                                        <div class="mb-3">
                                            <x-text-input id="password" class="form-control" type="password"
                                                name="password" required autocomplete="current-password"
                                                placeholder="Password" />
                                            <x-input-error :messages="$errors->get('password')" class="mt-2" />

                                        </div>


                                        <!-- Remember Me -->
                                        <div class="form-check form-switch d-flex justify-content-between">
                                            <div>

                                                <input id="remember_me" type="checkbox" class="form-check-input"
                                                    name="remember" checked="">
                                                <label class="form-check-label"
                                                    for="rememberMe">{{ __('Remember me') }}</label>
                                            </div>
                                            <div>
                                                @if (Route::has('password.request'))
                                                    <a class="form-check-label" href="{{ route('password.request') }}">
                                                        {{ __('Forgot your password?') }}
                                                    </a>
                                                @endif
                                            </div>

                                        </div>
                                        <div class="text-center">
                                                <x-primary-button class="btn bg-gradient-info w-100 mt-4 mb-0">
                                                    {{ __('Sign in') }}
                                                </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center pt-0 px-lg-2 px-1">
                                    <p class="mb-4 text-sm mx-auto">
                                        Don't have an account?

                                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Sign up</a>
                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                                <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6"
                                    style="background-image:url('{{ asset('assets/img/curved-images/curved6.jpg') }}')">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>



























</x-guest-layout>
