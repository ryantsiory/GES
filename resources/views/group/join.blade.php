@extends('blank')

@section('right-content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    @foreach($groupALL as $user)
                    <form method="POST" action="{{ url('/group/join') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">{{ $user->name }}</label>

                            <div class="col-md-6">
                                <input id="code" type="hidden" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ $user->code }}" required autocomplete="name" autofocus>
                            </div>
                        </div> <br>

                        <div class="form-group row mb-2">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Join {{ $user->name }}
                                </button>
                            </div>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
