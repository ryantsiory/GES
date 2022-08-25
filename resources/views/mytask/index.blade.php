@extends('blank')

@section('page-title', 'Mes tâches')
@section('page-description', 'Mes tâches')

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Mes tâches</h6>
      {{-- <p class="br-section-text">Données des postes de l'entreprise</p> --}}

      <div class="bd bd-gray-300 rounded table-responsive px-2">
        <div class="d-flex justify-content-center mt-3 ">
        </div>
              {{ $user->name }} {{ $user->lastname }}
              {{ $user->poste->nom }}
              <br>
              <ul>
                @foreach ($tasks as $task)
                <li>
                    {{ $task->project->title }}<br>
                    {{ $task->title }} :
                    {{ $task->description }}
                    <span class="ml-5 pl-5">{{ $task->date_end }}<span><br>

                    <div class="row">
                      <div class="col-2">
                        <form action="{{ route('mytask.updateTaskCompleted', $task->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <select class="form-control  form-control-sm" name="task_completed">
                            @if ($task->completed === 0)
                                <option value={{ $task->completed }} default selected>A faire</option>
                                <option value=30>En cours</option>
                                <option value=60>A tester</option>
                                <option value=100>Terminé</option>
                            @elseif ($task->completed === 30)
                                <option value=0>A faire</option>
                                <option value={{ $task->completed }} default selected>En cours</option>
                                <option value=60>A tester</option>
                                <option value=100>Terminé</option>
                            @elseif ($task->completed === 60)
                                <option value=0>A faire</option>
                                <option value=30>En cours</option>
                                <option value={{ $task->completed }} default selected>A tester</option>
                                <option value=100>Terminé</option>
                            @elseif ($task->completed === 100)
                                <option value=0>A faire</option>
                                <option value=30>En cours</option>
                                <option value=60>A tester</option>
                                <option value={{ $task->completed }} default selected>Terminé</option>
                            @endif

                          </select>
                          <button type="submit" class="btn btn-sm mt-1">Mettre à jour l'avancement</button>
                        </form>
                        </div>
                        <div class="col-3">
                            <div class="progress mt-1" style="height: 5px;">
                                <div class="progress-bar bg-success" role="progressbar" style="width: {{ $task->completed }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                    </div>

                    <br>
                </li>

            @endforeach
              </ul>

        <div class="d-flex justify-content-center mt-3">
        </div>

      </div><!-- bd -->
    </div>
</div>

@endsection
