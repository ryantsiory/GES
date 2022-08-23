<div class="br-chat-header ">
    <div class="chat-name d-flex-row-reverse">
      <div class="p-1">
        <h6>Group Name: {{$group->name}}</h6>
      </div>
      <div>
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
 @else
    <!-- this is for unFollow -->
    <form action="/unFollow/{{ $group->id }}" method="POST">
        @csrf
        @method('Delete')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">unFollow</button>
    </form>
@endif
      </div>

    </div>
  </div><!-- br-msg-header -->

        <div class="br-chat-body">
            <div class="content-inner">
                @foreach ($messages as $mp )
                <div @if($mp->from == Auth::id()) class="media d-flex flex-row-reverse" @else  class="media d-flex flex-row"  @endif >
                    <div class="br-img-user online">
                        @if($mp->from == Auth::id())
                         <img src="{{ asset('images/'.Auth::user()->avatar) }}" alt="">
                        @else
                        @endif

                    </div>
                    <div class="media-body">
                        <div class="msg-wrapper">
                            <h6>{{ $mp->message }}</h6>
                        </div><!-- msg-wrapper -->
                        <div><span>{{ date('d M y, h:i a', strtotime($mp->created_at)) }}</span></div>
                    </div><!-- media-body -->
                </div>


                @endforeach
            </div>

        </div><!-- media -->




  <!-- this is for add new message -->
<div class="input-text">
    <input type="text" name="message" id='message' class="submit form-control" >
    <input type="hidden" name="id" id='id' class="submit form-control" value='{{$group->id}}' placeholder="Write your message here...">
</div>


