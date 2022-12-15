@extends('layout')
@section('content')
<h2>Войдите</h2>
@if (session('messageOK'))
   <div class="alert alert-info" role="alert">
  {{session('messageOK')}}
</div>
@endif
@include('errors.validErrors')
<form method="POST" action="{{route('AuthEmployee')}}">
{{csrf_field()}}
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Адрес электронной почты</label>
    <input type="email" class="form-control" name = "email" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">Мы никогда никому не передадим вашу электронную почту.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Пароль</label>
    <input type="password" class="form-control" name = "password" id="exampleInputPassword1">
  </div>
  <button type="submit" class="btn btn-primary">Отправить</button>
  <p class="mb-5 pb-lg-2" style="color: #393f81;">Еще не зарегистрированы? <a href="{{route('indexEmployee')}}"
                      style="color: #393f81;">Зарегистрируйтесь тут</a></p>
</form>
@endsection