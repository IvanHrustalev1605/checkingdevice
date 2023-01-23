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
                    <img src="/public/storage/{!!$user->avatar!!}" alt="Admin" class="rounded-circle" width="200" height="190">
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
                  @if((Auth::user()->uid == $user->uid) || (Auth::user()->is_admin == 1))
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="{{route('userEdit', Auth::user()->uid)}}">Изменить</a>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            <div class="row gutters-sm">
            <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " href="{{route('EmergencyCreate', Auth::user()->uid)}}">Добавить аварийный выезд</a>
                    </div>
                  </div>
                  @endif
                  @if((Auth::user()->uid == $user->uid) || (Auth::user()->is_admin == 1))
                <div class="col-md-12 mb-3">
                    <div class="card-body">
                      <small>Аварийный выезды</small>
                      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Дата</th>
              <th scope="col">Объект</th>
              <th scope="col">Время вызова</th>
              <th scope="col">Время выезда</th>
              <th scope="col">Время окончания работ</th>
              <th scope="col">Время на объете</th>
              <th scope="col">Оплата</th>
              <th scope="col">Кто ездил</th>
            </tr>
          </thead>
          <tbody>
            @foreach($emergencys as $emergency)
            <tr>
           <td>{{$emergency->date}}</td>
           <td>{{$emergency->GetObjects->ObjName}}</td>
           <td>{{$emergency->time_call}}</td>
           <td>{{$emergency->time_departure}}</td>
           <td>{{$emergency->time_end}}</td>
           @if($emergency->DiffTime($emergency->time_end,$emergency->time_departure) == 0)
            <td>Время на объекте меньше 1 часа, оплата только за выезд</td>
           @else
           <td>{{$emergency->DiffTime($emergency->time_end,$emergency->time_departure)}}</td>
           @endif          
           <td>{{$emergency->sum}}</td>
           <td>{{$user->name}}</td>
           @if((Auth::user()->uid == $user->uid) || (Auth::user()->is_admin == 1))
           <td><a class="bi bi-pencil-fill" href="{{route('EmergencyEdit', $emergency->eid)}}"></a></td>@endif
            </tr>
            @endforeach
          </tbody>
        </table>
        @if(isset($emergency))
        <div class="row justify-content-end">
          <div class="col-3">
          Итого:{{$emergency->FinalSum($user->uid)}}
          </div>
        </div>
        @endif
      </div>
      @endif
                      </div>
                    </div>
                  </div>
                </div>
            </div>
@endsection