@extends('blank')

@section('page-title', 'Ajout personnel');
@section('page-description', 'Gestion du personnel');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Créer un nouveau personnel</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

      <form action="{{ route('personnels.store') }}" method="post">
        @csrf
        <div class="row mb-4">
            <div class="col-lg-4">
                <input id="name" type="text"
                       class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter your full name">

                @error('name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div><!-- col -->
            <div class="col-lg-4">
                <input id="lastname" type="text"
                class="form-control @error('lastname') is-invalid @enderror" name="lastname" placeholder="Enter your full name">

                @error('lastname')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div><!-- col -->

        </div><!-- row -->

        <div class="row mb-4">
            <div class="col-lg-4">
                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                name="email" placeholder="Enter your email">

                @error('email')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div><!-- col -->
            <div class="col-lg-4">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Enter your password">

                @error('password')
                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                @enderror
            </div><!-- col -->
            <div class="col-lg-4">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm your password">

            </div><!-- col -->

        </div><!-- row -->

        <div class="row mb-4">
            <div class="col-lg-8">
                <select class="form-control @error('poste') is-invalid @enderror" name="poste" >
                    <option value="" default selected disabled>--Choisir le poste--</option>
                    @foreach ($postes as $poste)
                     <option value="{{ $poste->id}}" >{{ $poste->nom}}</option>
                    @endforeach
                </select>

                @error('poste')
                    <div class="invalid-feedback">
                        {{ $errors->first('poste') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Ajouter un personnel</button>
        </div>
     </form>
</div>

@endsection
