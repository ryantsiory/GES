@extends('blank')

@section('page-title', 'Conges information');
@section('page-description', 'Gestion du conges');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Conge Member Information</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}
      <h3>{{  $conge->nom }}</h3>
        <div class="row">
            <div class="col-lg-4">
                Nom personnel : {{  $personnel->nom }}

            </div><!-- col -->
            <div class="col-lg-4">
                Poste : {{  $personnel->poste->nom }}

            </div><!-- col -->
            <div class="col-lg-8">
                Motif : {{  $conge->motif }}

            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-lg-4">
                Départ : {{  date('d-m-Y', strtotime($conge->depart_date )) }}

            </div><!-- col -->
            <div class="col-lg-4">
                Retour : {{  date('d-m-Y', strtotime($conge->retour_date )) }}

            </div><!-- col -->
        </div><!-- row -->
</div>

@endsection
