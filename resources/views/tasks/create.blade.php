@extends('blank')


@section('page-title', 'Ajout tâche')
@section('page-description', 'Ajout tâche')
@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Ajouter une tâhes</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

      <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-lg-4">
                <label for="personnel">assigner à </label>
                <select class="form-control @error('user') is-invalid @enderror" name="user" >
                    <option value="" default selected disabled>-- --</option>

                    @foreach ($users as $user)
                    <option value="{{ $user->id}}" >{{ $user->name}} {{ $user->lastname}}</option>
                  @endforeach
                </select>
                @error('user')
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="personnel">Nom du projet</label>
                <select class="form-control @error('project') is-invalid @enderror" name="project" >
                    <option value="" default selected disabled>--Choisir le projet--</option>

                    @foreach ($projects as $project)
                    <option value="{{ $project->id}}" >{{ $project->title}}</option>
                  @endforeach
                </select>
                @error('project')
                    <div class="invalid-feedback">
                        {{ $errors->first('project') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="motif">Titre </label>
                <input class="form-control @error('title') is-invalid @enderror"  name="title" placeholder="Entrez le titre" type="text">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @enderror

            </div><!-- col -->

            <div class="col-lg-4">
                <label for="motif">Description</label> </label>
                <input class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="Entrez la description" type="textarea" rows="3">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        {{-- <div class="row mt-3">
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
        </div><!-- row --> --}}
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Créer tâche</button>
        </div>
     </form>
</div>

@endsection
