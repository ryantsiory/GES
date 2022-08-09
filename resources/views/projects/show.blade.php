@extends('blank')

@section('page-title', 'Poste information');
@section('page-description', 'Gestion de poste');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Poste Member Information</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}

        <div class="row">
            <div class="col-lg-4">
                Nom projet : <h5 class="text-uppercase">{{  $project->title }}</h5>
                <span>{{ $project->description }}</span>

            </div><!-- col -->
        </div><!-- row -->
        <br>
            <div class="col-lg-8">
                Tâches :
                <ul>
                    @foreach ($project->tasks as $task)
                    <li>
                        <div class="row">
                            <div class="col-5">
                                {{ $task->title }}
                            </div>
                            <div class=" col-3">
                                <div class="progress mt-1" style="height: 5px;">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: {{ $task->completed }}%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                            <div class=" col-1">
                                @if(empty($task->user->avatar))
                                    <img  class="img-fluid text-center" src={{ asset('/images/default-avatar-profile.png') }} style="height:20px; width:20px; border-radius:50%" alt="Image">
                                @elseif ($task->user->avatar)
                                    <img  class="img-fluid text-center" src={{ asset('/images/'.$task->user->avatar) }} style="height:20px; width:20px; border-radius:50%" alt="Image">
                                @endif
                            </div>
                            <div class=" col-3">
                                <form action="{{ route('projects.updateTaskAssignTo', $task->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <select class="form-control form-control-sm" name="assign_to">
                                        @if(empty($task->user->id))
                                            <option value="" selected disabled>Assigner à </option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        @elseif ($task->user->id)
                                            <option value="{{ $task->user->id }}">{{ $task->user->name }}</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach
                                        @endif

                                    </select>
                                    <button type="submit" class="btn btn-sm">Valider</button>
                                </form>
                            </div>
                        </div>
                        {{ $task->description }}
                        {{ $task->user_id }}


                    </li>
                    <br>
                    @endforeach
                </ul>
            </div><!-- col -->


</div>

@endsection
