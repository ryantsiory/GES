@extends('blank')

@section('page-title', 'Modifier poste');
@section('page-description', 'Gestion de poste');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Modifier poste</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}


      <form action="{{ route('projects.update', $project->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-4">
                <input class="form-control @error('title') is-invalid @enderror"  name="title"  type="text" value="{{ $project->title }}" >
            </div><!-- col -->
            @error('title')
            <div class="invalid-feedback">
                {{ $errors->first('title') }}
            </div>
            @enderror

            <div class="col-lg-4">
                <input class="form-control  @error('description') is-invalid @enderror"  name="description"  type="text" value="{{ $project->description }}">
            </div><!-- col -->
            @error('description')
            <div class="invalid-feedback">
                {{ $errors->first('description') }}
            </div>
            @enderror

        </div><!-- row -->
        <div class="row mt-3">
            <div class="col-lg-6">
                <label for="personnel">Client propriétaire</label>
                <select class="form-control @error('client') is-invalid @enderror" name="client" >
                <option value="{{ $project->client->id }}">{{ $project->client->nom }}</option>
                @foreach ($clients as $client)
                    <option value="{{ $client->id }}" selected>{{ $client->nom }}</option>
                @endforeach
                </select>
                @error('client')
                    <div class="invalid-feedback">
                        {{ $errors->first('client') }}
                    </div>
                @enderror
            </div>
                {{-- <div class="col-lg-4">
                    <input class="form-control"  name="description"  type="text" value="{{ $project->description }}">
                </div><!-- col --> --}}
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Mettre à jour le projet</button>
        </div>
     </form>
    </div>
</div>

@endsection
