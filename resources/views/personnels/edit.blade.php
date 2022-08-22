@extends('blank')

@section('page-title', 'Modifier un personnel');
@section('page-description', 'Gestion de personnel');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
        <h6 class="br-section-label">Modifier le personnel</h6>

        <form action="{{ route('personnels.update', $personnel->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="row">
                <div class="col-lg-4">
                    <input class="form-control" name="nom" type="text" value="{{ $personnel->nom }}">
                </div><!-- col -->
                <div class="col-lg-8">
                    <select class="form-control @error('poste') is-invalid @enderror" name="poste">
                        <option value="{{ $personnel->poste->nom }}" default selected>{{ $personnel->poste->nom }}</option>

                        @foreach ($postes as $poste)
                        <option value="{{ $poste->id}}">{{ $poste->nom}}</option>
                        @endforeach


                    </select>
                </div><!-- col -->
            </div><!-- row -->
            <div class="row mt-2 mx-auto">
                <button type="submit" class="btn btn-success">Mettre à jour le client</button>
            </div>
        </form>
    </div>
</div>

@endsection