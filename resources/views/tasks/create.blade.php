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
                <label for="user">assigner à </label>
                <select class="form-control @error('user') is-invalid @enderror" name="user" >
                    <option value="" default selected disabled>-- --</option>

                    @foreach ($users as $user)
                    <option value="{{ $user->id}}" >{{ $user->name}} @if (!empty($user->lastname)){{ $user->lastname }}@endif</option>
                  @endforeach
                </select>
                @error('user')
                    <div class="invalid-feedback">
                        {{ $errors->first('user') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="project">Nom du projet</label>
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
                <label for="title">Titre </label>
                <input class="form-control @error('title') is-invalid @enderror"  name="title" placeholder="Entrez le titre" type="text">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $errors->first('title') }}
                    </div>
                @enderror

            </div><!-- col -->

            <div class="col-lg-4">
                <label for="description">Description</label> </label>
                <input class="form-control @error('description') is-invalid @enderror"  name="description" placeholder="Entrez la description" type="textarea" rows="3">
                @error('description')
                    <div class="invalid-feedback">
                        {{ $errors->first('description') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-3">
            <div class="col-lg-4">
                <label for="date_start">Date début</label>
                <input class="form-control @error('date_start') is-invalid @enderror"  name="date_start" placeholder="Date début" type="date">
                @error('date_start')
                    <div class="invalid-feedback">
                        {{ $errors->first('date_start') }}
                    </div>
                @enderror

            </div><!-- col -->
            <div class="col-lg-4">
                <label for="date_echeance">Date fin</label>
                <input class="form-control @error('date_echeance') is-invalid @enderror"  name="date_echeance" placeholder="Date écheante" type="date">
                @error('date_echeance')
                    <div class="invalid-feedback">
                        {{ $errors->first('date_echeance') }}
                    </div>
                @enderror

            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Créer tâche</button>
        </div>
     </form>
</div>

@endsection
