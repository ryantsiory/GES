@extends('blank')

@section('page-title', 'Informations sur le client');
@section('page-description', 'Gestion des clients');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Informations Personnel du Client</h6>

        <div class="row">
            <div class="col-lg-4">
                Nom : {{ $client->nom }}

            </div><!-- col -->
            <div class="col-lg-8">
                Description : {{ $client->description }}

            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-lg-4">
                Téléphone : {{ $client->telephone }}

            </div><!-- col -->
            <div class="col-lg-8">
                Adresse : {{ $client->adresse }}

            </div><!-- col -->
        </div><!-- row -->
    </div>

    @endsection