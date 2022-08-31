@extends('blank')

@section('page-title', 'Mes tâches')
@section('page-description', 'Mes tâches')

@section('main-content')

<div class="br-pagebody">
    <div class="br-section-wrapper">
      <h6 class="br-section-label">Mes tâches</h6>
      {{-- <p class="br-section-text">Données des postes de l'entreprise</p> --}}


      <ul class="list-group">

        @foreach ($tasks as $task)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            {{ $task->project->title }}
          <span class="badge badge-primary badge-pill">14</span>
        </li>

        @endforeach
      </ul>



@endsection
