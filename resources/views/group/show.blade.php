@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">  <h1>Show</h1>
                <div class="card-header">
                    <h3> Group: {{$group->name}} </h3>
                    <span class="text-danger">Code to join: {{$group->code}}</span>
                    @if ($group->admin_id == auth()->user()->id)

                        <div class="row">
                            <div class="col-md-4">
                                <p>
                                    <a class="btn btn-info" href="/group/edit/{{$group->id}}" style="color:white;">Edit</a>
                                </p>
                            </div>

                            <div class="col-md-4">
                                <form action="/group/delete/{{$group->id}}" method="POST">
                                    @csrf
                                    @method('Delete')

                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete group</button>
                                </form>
                            </div>

                            <div class="col-md-4">
                                <p>
                                    <a class="btn btn-warning" href="/group/members_list/{{$group->id}}" style="color:white;">Remove users</a>
                                </p>
                            </div>
                        </div>
                    @endif

                </div>

                <div class="card-body container">
                    <div class="message-container mb-5" id="message-container" style="overflow-y: scroll; height:400px;" v-chat-scroll>
                        <message v-for="(message, id) in chat "
                        v-bind:key="id"
                        v-bind:message = "message.message"
                        v-bind:username = "message.user.username"
                        v-bind:user_id = "message.user.id"
                        v-bind:created_at = "message.created_at"
                        >
                        </message>
                    </div>

                    <form action="/send_message/{{$group->id}}" method="post" v-on:submit='send_message'>
                        @csrf

                        <textarea name="message" id="message" v-model="message" class="col-md-12 form-control @error('message') is-invalid @enderror" cols="20" rows="5"></textarea>
                        @error('message')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{$message}}</strong>
                            </span>
                        @enderror
                        <button class="btn btn-primary" type="submit">Send message</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--script>
    window.onload=function () {
     var objDiv = document.getElementById("message-container");
     objDiv.scrollTop = objDiv.scrollHeight;
}
</script-->
@endsection
