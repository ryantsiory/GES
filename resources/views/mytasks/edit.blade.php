@extends('blank')

@section('page-title', 'Modifier tâche');
@section('page-description', 'Modifier tâche');

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Modifier tâche</h6>
      {{-- <p class="br-section-text">A basic form control with disabled and readonly mode.</p> --}}


      <form action="{{ route('task.update', $task->id) }}" method="post">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-lg-4">
                <input class="form-control"  name="title"  type="text" value="{{ $task->title }}" >
            </div><!-- col -->
            <div class="col-lg-4">
                <input class="form-control"  name="description"  type="text" value="{{ $task->description }}" >
            </div><!-- col -->
        </div><!-- row -->
        <div class="row mt-2 mx-auto">
            <button type="submit" class="btn btn-success">Mettre à jour le tâche</button>
        </div>
     </form>
    </div>
</div>

@endsection
