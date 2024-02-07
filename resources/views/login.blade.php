@extends('Layouts.admin.app')

@section('main')
    {{-- {{ $errors }} --}}
    <section>
        <div class="page-header min-vh-75">
            <div class="container">
                <div class="row justify-content-between">
                    <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-50">
                        <div class="card card-plain mt-8">
                            <div class="card-header pb-0 text-left bg-transparent">
                                <h3 class="font-weight-bolder text-info text-gradient">Account Login</h3>
                                <p class="mb-0">Insert your username and password</p>
                            </div>
                            <div class="card-body">
                                <form role="form" action="{{ route('post.login') }}" method="post">
                                    @csrf
                                    <label>Email</label>
                                    <div class="mb-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Email" aria-label="Email" aria-describedby="email-addon"
                                            name="email" id="email"
                                            value="{{ old('email', (string) Session::get('email')) }}">
                                        {{-- error --}}
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <label>Password</label>
                                    <div class="mb-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            placeholder="Password" aria-label="Password" aria-describedby="password-addon"
                                            name="password" id="password">
                                        {{-- error --}}
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    {{-- <div class="form-check form-switch">
                  <input class="form-check-input" type="checkbox" id="rememberMe" checked="">
                  <label class="form-check-label" for="rememberMe">Remember me</label>
                </div> --}}
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">Sign in</button>
                                    </div>
                                </form>
                            </div>
                            {{-- <div class="card-footer text-center pt-0 px-lg-2 px-1">
              <p class="mb-4 text-sm mx-auto">
                Dont have an account?
                <a href="{{ route('register') }}" class="text-info text-gradient font-weight-bold">Sign up</a>
              </p>
            </div> --}}
                        </div>
                    </div>
                    <div class="col-md-6 text-center">
                        <div class="position-absolute d-md-block d-none me-n8 primary-color" style="top: 35%">
                            <h3 class="primary-color">Welcome</h3>
                            <p class="lead mb-6">
                                Admin in Login Dashboard Admin
                            </p>
                            <p class="text-muted">
                                Please enter your credentials to access the dashboard features and manage your system.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
