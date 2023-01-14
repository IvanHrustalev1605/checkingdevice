@extends('layout')
@section('content')

<div class="row m-4 justify-content-center">
@foreach($users as $user)
    <div class="col-sm-4">
        <div class="card text-center" style="width: 18rem;">
        <a href="{{route('userIndex', $user->uid)}}">
            <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                
                    <h5 class="card-title">{{$user->name}} {{$user->surname}}</h5>
                    <p class="card-text">{{$user->post}}</p>
                    <p class="card-text">{{$user->mobile}}</p>
                    </a>
                </div>
        </div>
    </div>
@endforeach    
</div>
@endsection