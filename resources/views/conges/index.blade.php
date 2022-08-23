@extends('blank')



@section('page-title', 'Congés')
@section('page-description', 'Gestion des conges')

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">TABLE Conges</h6>
      <p class="br-section-text">Données concernant les congés de l'entreprise.</p>

      <a href="{{ route('conges.create') }}" class="btn btn-info mb-2 float-right">Ajouter un conges</a>
      <div class="bd bd-gray-300 rounded table-responsive">
        <div class="d-flex justify-content-center mt-3">
            {{ $conges->links() }}
        </div>
        <table class="table mg-b-0">
          <thead>
            <tr>
              <th>ID</th>
              <th>Personnel</th>
              <th>Nom</th>
              <th>Motif</th>
              <th>Status</th>
              <th>Départ</th>
              <th>Retour</th>
              <th></th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($conges as $conge)
              <tr>
                <th scope="row">{{ $conge->id }}</th>
                <td>{{ $conge->user->name }} {{ $conge->user->lastname }}</td>
                <td>{{ $conge->nom }}</td>
                <td>{{ $conge->motif }}</td>
                        @if ($conge->status === 0)
                        <td class="text-info">En attente</td>
                        @elseif ($conge->status === 1)
                        <td class="text-success">Validée</td>
                        @else
                        <td class="text-danger">Refusée</td>
                        @endif

                <td>{{  date('d-m-Y', strtotime($conge->depart_date )) }}</td>
                <td>{{  date('d-m-Y', strtotime($conge->retour_date )) }}</td>
                <td><a href="{{ route('conges.show',  $conge->id) }}"><x-far-eye style="height:21px"/></a></td>
                <td class="d-flex">
                    <a href="{{ route('conges.edit', $conge->id) }}" class="btn btn-warning btn-sm mr-2">Modifier</a>

                    <form method="post" action="{{ route('conges.destroy', $conge->id) }}" >
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
            {{ $conges->links() }}
        </div>
      </div><!-- bd -->
    </div>
</div>


{{--
<form >
{{-- <form action="{{ route('store.product') }}" method="POST"> --}}
  {{-- @csrf
  <label for="name">Nom du produit : </label>
  <input type="text" name="name">

  <label for="price">Prix du produit : </label>
  <input type="number" name="price" step="0.01">

  <label for="description">Description du produit : </label>
  <textarea name="description">
  </textarea>

  <input type="submit" value="Envoyer">
</form>

@if ( $errors->has('title') )
    <p class="error-message">{{ $errors->first('title') }}</p>
@endif


@error('description')
    <p> {{  $message  }} </p>
@enderror


<form action="{{ route('file.upload.post') }}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="row">
      <div class="col-md-6">
          <input type="file" name="file" class="form-control">
      </div>
      <div class="col-md-6">
          <button type="submit" class="btn btn-success">Upload</button>
      </div>
  </div>
</form>

<div class="container">
  @foreach ($users as $user)
      {{ $user->name }}
  @endforeach
</div>

{{ $users->links() }} --}}





@endsection
