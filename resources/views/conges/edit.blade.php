@extends('blank')

@section('page-title', 'Modifier conges');
@section('page-description', 'Gestion de conges');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Modifier congés</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}


      <form action="{{ route('conges.update', $conge->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-4">
                <label for="personnel">Nom du personnel</label>
                <select class="form-control @error('poste') is-invalid @enderror" name="personnel" >
                    <option value="{{ $conge->personnel->id}}" default selected disabled>{{ $conge->personnel->nom}}</option>
                </select>
                @error('personnel')
                    <div class="invalid-feedback">
                        {{ $errors->first('personnel') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="nom">Conge</label>
                <input class="form-control @error('nom') is-invalid @enderror"  name="nom" placeholder="Entrez le nom " type="text" value="{{ $conge->nom }}">
                @error('nom')
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="motif">Motif du congés</label>
                <input class="form-control @error('motif') is-invalid @enderror"  name="motif" placeholder="Entrez le motif" type="text" value="{{ $conge->motif }}">
                @error('motif')
                    <div class="invalid-feedback">
                        {{ $errors->first('motif') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="depart_date">Date départ</label>
                <input class="form-control @error('depart_date') is-invalid @enderror"  name="depart_date" placeholder="Date départ" type="date" value="{{ $conge->depart_date }}">
                @error('depart_date')
                    <div class="invalid-feedback">
                        {{ $errors->first('depart_date') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="retour_date">Retour départ</label>
                <input class="form-control @error('retour_date') is-invalid @enderror"  name="retour_date" placeholder="Retour départ" type="date" value="{{ $conge->retour_date }}">
                @error('retour_date')
                    <div class="invalid-feedback">
                        {{ $errors->first('retour_date') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Modifier un conges</button>
        </div>
     </form>






    </div>
</div>

@endsection
