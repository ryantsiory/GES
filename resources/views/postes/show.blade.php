@extends('blank')

@section('page-title', 'Informations sur un poste');
@section('page-description', 'Gestion du poste');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Informations sur le poste</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

        <div class="row">
            <div class="col-lg-4">
                Nom poste : <h5 class="text-uppercase">{{  $poste->nom }}</h5>

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
