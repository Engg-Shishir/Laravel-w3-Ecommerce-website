@extends('Frontend.master')
@section('title') User SignIn @endsection
@section('frontend_content')
@include('Frontend.include.category')

<div class="mt-3"></div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <!--======== Include Success Message =========-->
                @include('include.error')
                @include('include.success')

                <div class="card-body bg-dark text-light">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="email">{{ __('E-Mail Address') }}</label>
                            </div>
                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="password">{{ __('Password') }}</label>
                            </div>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0 text-right">
                            <div class="col-md-12 m-auto">
                                <div class="col-md-10"></div>
                                <div class="col-m-2">
                                    <button type="submit" class="btn btn-light mr-2">
                                        {{ __('Login') }}
                                    </button>
                                </div>
                            </div>
                        </div>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                        <a class="btn btn-link" href="{{ route('register') }}">
                            {{ __('SignUp here ..') }}
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="mb-3"></div>
@endsection
