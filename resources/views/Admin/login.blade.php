<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet"><!--===bootstrap===-->
    <link href="{{asset('backend')}}/lib/Ionicons/css/ionicons.css" rel="stylesheet">
    <!-- Starlight CSS -->
    <link rel="stylesheet" href="{{asset('backend')}}/css/starlight.css">
</head>
<body>
    <div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">
        <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white">
            <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"> PSTU <span class="tx-info tx-normal">Admin</span></div>

            <div class="tx-center mg-b-60">Professional Ecommerce  Admin Site Management</div>
            <!--======== Admin Login Form Start=========-->
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                <div class="form-group"><!-- form-group -->
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus  placeholder="Enter your email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group"><!-- form-group -->
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter your password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <a href="" class="tx-info tx-12 d-block mg-t-10">Forgot password?</a>
                </div>
                <button type="submit" class="btn btn-info btn-block">Login In</button>
            </form>
            <!--======== Admin Login Form End=========-->
        </div>
    </div>
</body>
</html>