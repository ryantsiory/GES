@extends('blank')

@section('page-title', 'Ajout personnel');
@section('page-description', 'Gestion du personnel');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Ajouter Personnal Member</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

      <form action="{{ route('personnels.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <input class="form-control @error('nom') is-invalid @enderror"  name="nom" placeholder="Entrez le nom du personnel" type="text">
                @error('nom')
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-8">
                <select class="form-control @error('poste') is-invalid @enderror" name="poste" >
                    <option value="" default selected disabled>--Choisir le poste--</option>

                    @foreach ($postes as $poste)
                    <option value="{{ $poste->id}}" >{{ $poste->nom}}</option>
                  @endforeach


                </select>

                @error('poste')
                    <div class="invalid-feedback">
                        {{ $errors->first('poste') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Ajouter un personnel</button>
        </div>
     </form>
</div>

@endsection
