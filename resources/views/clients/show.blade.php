@extends('blank')

@section('page-title', 'Client information');
@section('page-description', 'Gestion de client');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Client Member Information</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

        <div class="row">
            <div class="col-lg-4">
                Nom : {{  $client->nom }}

            </div><!-- col -->
            <div class="col-lg-8">
                Description : {{ $client->description }}

            </div><!-- col -->
        </div><!-- row -->
        <div class="row">
            <div class="col-lg-4">
                Téléphone : {{  $client->telephone }}

            </div><!-- col -->
            <div class="col-lg-8">
                Adresse : {{ $client->adresse }}


            </div><!-- col -->
        </div><!-- row -->
        <br>
        @if ($client->projects)
                Projets :
                <ul>
                    @foreach ($client->projects as $project)
                    <li>
                        <div class="row">
                            <div class="col-3 vfrr">{{  $project->title }}</div>
                            <div class="col"> {{ $project->date_echeance->format('j F, Y') }}</div>
                        </div>
                    </li>
                    @endforeach
                </ul>
        @endif

</div>

@endsection
