@extends('blank')

@section('page-title', 'Projets')
@section('page-description', 'Gestion de projet')

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">TABLE Projet</h6>
      <p class="br-section-text">Données des Projet de l'entreprise</p>

      <a href="{{ route('postes.create') }}" class="btn btn-info mb-2 float-right">Nouveau projet</a>
      <div class="bd bd-gray-300 rounded table-responsive">
        <div class="d-flex justify-content-center mt-3">
            {{ $projects->links() }}
        </div>
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Description</th>
              <th></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($projects as $project)
                <tr>
                    <th scope="row">{{ $project->id }}</th>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->description }}</td>
                    <td><a href="{{ route('projects.show',  $project->id) }}"><x-far-eye style="height:21px"/></a></td>
                    <td class="d-flex">
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm mr-2">Modifier</a>

                        <form method="post" action="{{ route('projects.destroy', $project->id) }}" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                        </form>


                    </td>

                </tr>
            @endforeach
          </tbody>
        </table>
        <div class="d-flex justify-content-center mt-3">
            {{ $projects->links() }}
        </div>

      </div><!-- bd -->
    </div>
</div>

@endsection
