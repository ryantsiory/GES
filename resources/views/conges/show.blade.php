@extends('blank')

@section('page-title', 'Informations sur le Congé');
@section('page-description', 'Gestion des congés');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Information sur le Congé </h6>
        <div class="row">
            <div class="col-lg-4 h4">
                {{ $conge->nom }}

            </div><!-- col -->
            <div class="col-lg-8 h5 text-center">
                <span>Status :
                    @if ($conge->status === 0)
                    <span class="text-info">En attente</span>
                    @elseif ($conge->status === 1)
                    <span class="text-success">Validée</span> @if ($conge->answered_at) <span style="font-size: 14px"> le {{ $conge->answered_at }}</span>@endif
                    @else
                    <span class="text-danger">Refusée</span> @if ($conge->answered_at) <span style="font-size: 14px"> le {{ $conge->answered_at }}</span>@endif
                    @endif
            </div><!-- col -->

        </div><!-- row -->

        <div class="row">
            <div class="col-lg-4">
                Nom personnel : {{ $personnel->nom }}

            </div><!-- col -->
            <div class="col-lg-4">
                Poste : {{ $personnel->poste->nom }}

            </div><!-- col -->
            <div class="col-lg-4">
                Motif : {{ $conge->motif }}

            </div><!-- col -->
        </div><!-- row -->
        <div class="row pt-2">
            <div class="col-lg-4">
                Départ : {{ date('d-m-Y', strtotime($conge->depart_date )) }}

            </div><!-- col -->
            <div class="col-lg-4">
                Retour : {{ date('d-m-Y', strtotime($conge->retour_date )) }}

            </div><!-- col -->
        </div><!-- row -->
    </div>

    @endsection