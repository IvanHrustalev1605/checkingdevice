@extends('layout')
@section('content')

<form class="row g-3" action = "{{route('verifierCreate')}}" method = "POST">
    {{csrf_field()}}
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название</label>
    <input type="text" name="name" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Адресс</label>
    <input type="text" name="adress" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Телефон</label>
    <input type="text" name="phone" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Email</label>
    <input type="email" name="email" class="form-control" id="inputEmail4">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Добавить</button>
  </div>
</form>

@endsection