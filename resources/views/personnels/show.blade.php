@extends('blank')

@section('page-title', 'Personnel information');
@section('page-description', 'Gestion du personnel');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Personnal Member Information</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

        <div class="row">
            <div class="col-lg-4">
                Nom : {{  $personnel->nom }}

            </div><!-- col -->
            <div class="col-lg-8">
                Poste : {{  $personnel->poste->nom }}

            </div><!-- col -->
        </div><!-- row -->
</div>

@endsection
