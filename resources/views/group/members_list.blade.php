@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Remove user</div>

                <div class="card-body">
                    @foreach ($group_members as $group_member)
                        @if ($group_member->id == auth()->user()->id)
                            <p>{{$group_member->name}} </p>
                        @else
                            <p>{{$group_member->name}}  {{$group_id}}/{{$group_member->id}}<small > <a class="text-danger" href="/remove_user/{{$group_id}}/{{$group_member->id}}" onclick="return confirm('Are  you sure?')"> Remove </a></small> </p>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
