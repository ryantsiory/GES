@extends('blank')


@section('page-title', 'Demander un Congé')
@section('page-description', 'Gestion du congé')
@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Demander un Congé</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

      <form action="{{ route('conges.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <label for="personnel">Nom du personnel</label>
                <select class="form-control @error('poste') is-invalid @enderror" name="personnel" >
                    <option value="" default selected disabled>--Choisir le personnel--</option>

                    @foreach ($users as $user)
                    <option value="{{ $user->id}}" >{{ $user->name}} {{ $user->lastname}}</option>
                  @endforeach
                </select>
                @error('personnel')
                    <div class="invalid-feedback">
                        {{ $errors->first('personnel') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="nom">Congé</label>
                <input class="form-control @error('nom') is-invalid @enderror"  name="nom" placeholder="Entrez le nom " type="text" value="Demande congés">
                @error('nom')
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="motif">Motif du congé</label>
                <input class="form-control @error('motif') is-invalid @enderror"  name="motif" placeholder="Entrez le motif" type="text">
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
                <input class="form-control @error('depart_date') is-invalid @enderror"  name="depart_date" placeholder="Date départ" type="date">
                @error('depart_date')
                    <div class="invalid-feedback">
                        {{ $errors->first('depart_date') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="retour_date">Retour départ</label>
                <input class="form-control @error('retour_date') is-invalid @enderror"  name="retour_date" placeholder="Retour départ" type="date">
                @error('retour_date')
                    <div class="invalid-feedback">
                        {{ $errors->first('retour_date') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Demander un congé</button>
        </div>
     </form>
</div>

@endsection
