@extends('layout')
@section('content')

<div class="row justify-content-evenly">
@foreach($users as $user)
    <div class="col-sm-3">
    <div class="card text-dark bg-light mb-3" style="max-width: 10rem">
        <a href="{{route('userIndex', $user->uid)}}">
            <img src="/public/storage/{!!$user->avatar!!}" class="card-img-top" alt="...">
            <div class="card-header">{{$user->post}}</div>
                <div class="card-body">
                    <h5 class="card-title">{{$user->name}} {{$user->surname}}</h5>
                    <p class="card-text">{{$user->mobile}}</p>
                    </a>
                </div>
        </div>
    </div>
@endforeach    
</div>
@endsection