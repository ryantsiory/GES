@extends('blank')

@section('page-title', 'Client information');
@section('page-description', 'Gestion de client');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Poste Member Information</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

        <div class="row">
            <div class="col-lg-4">
                Nom poste : <h4 class="text-uppercase">{{  $poste->nom }}</h4>

            </div><!-- col -->
            <div class="col-lg-8">
                Personnel :
                <ul>
                    @foreach ($personnels as $personnel)
                    <li>{{ $personnel->nom }}</li>
                    @endforeach
                </ul>

            </div><!-- col -->
        </div><!-- row -->
</div>

@endsection
