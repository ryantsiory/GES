@extends('blank')

@section('page-title', 'Conges information');
@section('page-description', 'Gestion du conges');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Congé Information</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}
        <div class="row" >
            <div class="col-lg-4 h4">
                {{  $conge->nom }}

            </div><!-- col -->
            <div class="col-lg-8 h5 text-center">
                Status :
                @if ($conge->status === 0)
                <span class="text-info">En attente</span>
                @elseif ($conge->status === 1)
                <span class="text-success">Validée</span>
                @else
               <span class="text-danger">Refusée</span>
                @endif
            </div><!-- col -->

        </div><!-- row -->

        <div class="row">
            <div class="col-lg-4">
                Nom personnel : {{  $personnel->nom }}

            </div><!-- col -->
            <div class="col-lg-4">
                Poste : {{  $personnel->poste->nom }}

            </div><!-- col -->
            <div class="col-lg-4">
                Motif : {{  $conge->motif }}

            </div><!-- col -->
        </div><!-- row -->
        <div class="row pt-2">
            <div class="col-lg-4">
                Départ : {{  date('d-m-Y', strtotime($conge->depart_date )) }}

            </div><!-- col -->
            <div class="col-lg-4">
                Retour : {{  date('d-m-Y', strtotime($conge->retour_date )) }}

            </div><!-- col -->
        </div><!-- row -->
</div>

@endsection
