@extends('blank')

@section('main-content')

<div class="container d-flex justify-content-center">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12 d-flex justify-content-center">



            <div class="card">
                @if (session('status'))
                    <h6 class="alert alert-success">{{ session('status') }}</h6>
                @endif
                <div class="card-header">
                    <h4>User Profil
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update-user/'.$user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group mb-3">

                                    <img style="width:193px; height:166px" class="img-fluid text-center rounded-circle" src={{ asset('/images/'.$user->avatar) }} alt="Image">

                                <div class="form-group mb-3">
                                    <input class="form-control" type="file" name="avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-6 d-inline-block">
                            <div class="form-group mb-3">
                                <label for="">User Full Name</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
                            </div>
                            <div class="form-group mb-3 d-inline-block">
                                <label for="">User Email</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
                            </div>
                            <div class="form-group mb-3 d-inline-block">
                                <label for="">Password</label>
                                <input type="password" name="password" value="{{ $user->password }}" class="form-control @error('password') is-invalid @enderror">
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-primary">Update User</button>
                            </div>

                        </div>
                    </div>







                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
