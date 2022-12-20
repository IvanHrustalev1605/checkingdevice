@extends('layout')
@section('content')
<form class="row g-3" action = "{{route('dashboardUpdate', $org->orgid)}}" method = "post">
    {{csrf_field()}}
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название организации</label>
    <input type="text" name="name" value="{{$org->name}}" class="form-control" id="inputEmail4" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Адрес</label>
    <input type="text" name="adress" value="{{$org->adress}}" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">ИНН</label>
    <input type="text" name="INN" class="form-control" id="inputAddress2" value="{{$org->INN}}">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">КПП</label>
    <input type="text" name="KPP" class="form-control" id="inputCity"value="{{$org->KPP}}">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Расчетный счет</label>
    <input type="text" name="RSCH" class="form-control" id="inputCity"value="{{$org->RSCH}}">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Корр. счет</label>
    <input type="text" name="KSCH" class="form-control" id="inputCity"value="{{$org->KSCH}}">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">ОКПО</label>
    <input type="text" name="OKPO" class="form-control" id="inputCity"value="{{$org->OKPO}}">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">ОГРН</label>
    <input type="text" name="OGRN" class="form-control" id="inputCity"value="{{$org->OGRN}}">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Телефон</label>
    <input type="text" name="phone" class="form-control" id="inputCity"value="{{$org->phone}}">
  </div>

  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
</form>
@endsection