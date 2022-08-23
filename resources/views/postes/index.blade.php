@extends('blank')

@section('page-title', 'Postes')
@section('page-description', 'Gestion des postes')

@section('main-content')

<div class="br-pagebody">
  <div class="br-section-wrapper">
    <h6 class="br-section-label">LISTE DES POSTES</h6>
    <p class="br-section-text">Données des postes de l'entreprise</p>

    <a href="{{ route('postes.create') }}" class="btn btn-info mb-2 float-right">Nouveau poste</a>
    <div class="bd bd-gray-300 rounded table-responsive">
      <div class="d-flex justify-content-center mt-3">
        {{ $postes->links() }}
      </div>
      <table class="table mg-b-0">
        <thead>
          <tr>
            <th>ID</th>
            <th>Nom</th>
            <th></th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($postes as $poste)
          <tr>
            <th scope="row">{{ $poste->id }}</th>
            <td>{{ $poste->nom }}</td>
            <td><a href="{{ route('postes.show',  $poste->id) }}">
                <x-far-eye style="height:21px" />
              </a></td>
            <td class="d-flex">
              <a href="{{ route('postes.edit', $poste->id) }}" class="btn btn-warning btn-sm mr-2">Modifier</a>

              <form method="post" action="{{ route('postes.destroy', $poste->id) }}">
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
        {{ $postes->links() }}
      </div>

    </div><!-- bd -->
  </div>
</div>

@endsection