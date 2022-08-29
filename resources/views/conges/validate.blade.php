@extends('blank')



@section('page-title', 'Congés')
@section('page-description', 'Gestion du congé')

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">TABLE Congés</h6>
      <p class="br-section-text">Données concernant les congés de l'entreprise en attente.</p>

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
                <td>{{ $conge->user?->name }} {{ $conge->user?->lastname }}</td>
                <td>{{ $conge->nom }}</td>
                <td>{{ $conge->motif }}</td>
                        @if ($conge->status === 0)
                        <td class="text-info">En attente</td>
                        @endif

                <td>{{  date('d-m-Y', strtotime($conge->depart_date )) }}</td>
                <td>{{  date('d-m-Y', strtotime($conge->retour_date )) }}</td>
                <td><a href="{{ route('conges.show',  $conge->id) }}"><x-far-eye style="height:21px"/></a></td>
                <td class="d-flex">

                    <form method="post" action="{{ route('conges.accept', $conge->id) }}" >
                        @csrf
                        <button type="submit" class="btn btn-success btn-sm mr-2">Accepter</button>
                    </form>

                    <form method="post" action="{{ route('conges.reject', $conge->id) }}" >
                        @csrf
                        <button type="submit" class="btn btn-danger btn-sm">Refuser</button>
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


@endsection
