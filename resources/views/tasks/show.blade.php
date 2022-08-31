@extends('blank')

@section('page-title', 'Informations du congé');
@section('page-description', 'Gestion du congé');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Informations sur le congé</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}
        <div class="row" >
            <div class="col-lg-4 h4">
                {{  $conge->nom }}

            </div><!-- col -->
            <div class="col-lg-8 h5 text-center">
                <span>Status :
                @if ($conge->status === 0)
                <span class="text-info">En attente</span>
                @elseif ($conge->status === 1)
                <span class="text-success">Validée</span> @if ($conge->answered_at) <span style="font-size: 14px"> le {{  $conge->answered_at }}</span>@endif
                @else
               <span class="text-danger">Refusée</span> @if ($conge->answered_at) <span style="font-size: 14px"> le {{  $conge->answered_at }}</span>@endif
                @endif
            </div><!-- col -->

        </div><!-- row -->

        <div class="row">
            <div class="col-lg-4">
                Nom personnel : {{  $user->name }} {{  $user->lastname }}

            </div><!-- col -->
            <div class="col-lg-4">
                Poste : {{  $user->poste->nom }}

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
