@extends('blank')

@section('page-title', 'Ajout poste');
@section('page-description', 'Gestion de poste');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Ajout poste</h6>
      <p class="br-section-text">A basic form control with disabled and readonly mode.</p>

      <form action="{{ route('postes.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <input class="form-control @error('nom') is-invalid @enderror"  name="nom" placeholder="Entrez le nom du poste" type="text">
                @error('nom')
                    <div class="invalid-feedback">
                        {{ $errors->first('nom') }}
                    </div>
                @enderror

            </div><!-- col -->

        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Créer poste</button>
        </div>
     </form>
    </div>
</div>

@endsection
