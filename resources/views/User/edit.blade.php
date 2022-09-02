@extends('blank')

@section('main-content')

<div class="container">
    <div class="row">
        <div class="col-md-9">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
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

                                    <img  class="img-fluid text-center" src={{ asset('/images/'.$user->avatar) }} style="height:300px; width:300px;" alt="Image">

                                <div>
                                    <input type="file" name="avatar" class="btn btn-secondary btn-sm">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-4 ">
                            <div class="form-group mb-3">
                                <label for="">Nom</label>
                                <input type="text" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
                                @error('name')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Prénom</label>
                                <input type="text" name="lastname" value="{{$user->lastname}}" class="form-control @error('lastname') is-invalid @enderror">
                                @error('lastname')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Adresse e-mail</label>
                                <input type="text" name="email" value="{{$user->email}}" class="form-control @error('email') is-invalid @enderror">
                                @error('email')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                            {{-- <div class="form-group mb-3">
                                <label for="">Mot de passe</label>
                                <input type="password" name="password" value="{{ $user->password }}" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div> --}}


                        </div>
                        <div class="col-4 ">
                            <div class="form-group mb-3">
                                <label for="">Adresse</label>
                                <input type="text" name="adresse" value="@if (!empty($user->info->adresse)){{$user->info->adresse}}@endif" class="form-control @error('adresse') is-invalid @enderror">
                                @error('adresse')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Téléphone</label>
                                <input type="text" name="telephone" value="@if (!empty($user->info->telephone)){{$user->info->telephone}}@endif" class="form-control @error('telephone') is-invalid @enderror">
                                @error('telephone')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="">Date de naissance</label>
                                <input type="date" name="date_de_naissance" value="@if (!empty($user->info->date_de_naissance)){{$user->info->date_de_naissance}}@endif" class="form-control @error('date_de_naissance') is-invalid @enderror">
                                @error('date_de_naissance')
                                <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                            @enderror
                            </div>


                        </div>

                    </div>


                    <div class="form-group mb-3 ml-5">
                        <button type="submit" class="btn btn-primary">Mettre à jour mon profil</button>
                    </div>




                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
