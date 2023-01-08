@extends('layout')
@section('content')
<div class="container">
    <div class="main-body">
    
          <!-- Breadcrumb -->
          <nav aria-label="breadcrumb" class="main-breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">User Profile</li>
            </ol>
          </nav>
          <!-- /Breadcrumb -->
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="\storage\{!!$user->avatar!!}" alt="Admin" class="rounded-circle" width="200" height="190">
                    <div class="mt-3">
                      <h4>{{$user->name}} {{$user->surname}}</h4>
                      <p class="text-secondary mb-1">{{$user->post}}</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row"> 
                    <div class="col-sm-3">
                      <h6 class="mb-0">Имя</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->name}}
                    </div>
                  </div>
                  <hr>
                  <div class="row"> 
                    <div class="col-sm-3">
                      <h6 class="mb-0">Фамилия</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->surname}}
                    </div>
                  </div>
                  <hr>
                  <div class="row"> 
                    <div class="col-sm-3">
                      <h6 class="mb-0">Должность</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->post}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->email}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Телефон</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{$user->mobile}}
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="{{route('userEdit', Auth::user()->uid)}}">Изменить</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
@endsection