@extends('layouts.app')

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

    <!-- Bracket CSS -->
    <link rel="stylesheet" href="../css/bracket.css">
</head>

<body>

<div class="d-flex align-items-center justify-content-center bg-br-primary ht-100v">
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white rounded shadow-base">
            <div class="signin-logo tx-center tx-28 tx-bold tx-inverse"><span class="tx-normal">[</span> GE<span class="tx-info">S</span> <span class="tx-normal">]</span></div>
            {{-- <div class="tx-center mg-b-60">The Admin is Bg</div> --}}

            <div class="form-group">
                <input id="email" type="text"
                       class="form-control @error('email') is-invalid @enderror"
                       name="email" value="{{ old('email') }}"
                       placeholder="Enter your username">
                @error('email')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div><!-- form-group -->
            <div class="form-group">
                <input id="password" type="password"
                       class="form-control @error('password') is-invalid @enderror"
                       name="password" placeholder="Enter your password">

                @error('password')
                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror


                @if (Route::has('password.request'))
                    <a class="tx-info tx-12 d-block mg-t-10" href="{{ route('password.request') }}">
                        {{ __('Mot de passe oublié?') }}
                    </a>
                @endif

            </div><!-- form-group -->
            <button type="submit" class="btn btn-info btn-block">
                Se Connecter
            </button>


{{--            @if (Route::has('register'))--}}
{{--                <div class="mg-t-60 tx-center"><a href="{{ route('register') }}" class="tx-info">Sign Up</a></div>--}}
{{--            @endif--}}
        </div>
    </form><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery-ui/ui/widgets/datepicker.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

