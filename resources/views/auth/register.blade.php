@extends('layouts.app1')

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>GES</title>

    <!-- vendor css -->
    <link href="../lib/%40fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="../lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="../lib/select2/css/select2.min.css" rel="stylesheet">

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-400 pd-25 pd-xs-40 bg-white rounded shadow-base">
        <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> GE<span class="tx-info">S</span> <span class="tx-normal">]</span></div>
        <div class="tx-center mg-b-40">The Admin is Bg</div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('register') }}">
            @csrf
            <div class="form-group">
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name">

                @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                       name="email" placeholder="Enter your email">

                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div><!-- form-group -->

            <div class="form-group">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
            </div>

            <div class="form-group">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">
            </div>

    {{--        <input type="file" class="form-control @error('avatar') is-invalid @enderror" name="avatar" >--}}

    {{--        @error('avatar')--}}
    {{--        <span class="invalid-feedback" role="alert">--}}
    {{--                                        <strong>{{ $message }}</strong>--}}
    {{--                                    </span>--}}
    {{--        @enderror--}}

            <div class="form-group tx-12">By clicking the Sign Up button below, you agreed to our privacy policy and terms of use of our website.</div>
            <button type="submit" class="btn btn-info btn-block">
                Sign Up
            </button>
        </form>

        @if (Route::has('login'))
        <div class="mg-t-40 tx-center">Have an account? <a class="tx-info" href="{{ route('login') }}">Sign In</a></div>
        @endif
    </div><!-- login-wrapper -->

</div><!-- d-flex -->


<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../lib/select2/js/select2.min.js"></script>

</body>

</html>
