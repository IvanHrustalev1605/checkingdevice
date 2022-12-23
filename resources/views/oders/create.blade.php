@extends('layout')
@section('content')
<br>
<form class="row g-3" action = "{{route('OderAdd')}}" method = "POST">
    {{csrf_field()}}
    <div class="col-md-6">
  <label for="object" class="form-label">Выберите объект</label>
<select id="object" name = "ObjID">
<option  value="">Выберите...</option>
    @foreach ($objects as $obj)
  <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
    @endforeach
</select>
  </div>
  <div class="col-md-6">
  <label for="object" class="form-label">Статус заказа...</label>
<select id="object" name = "osid">
<option  value="">Выберите...</option>
    @foreach ($oderstatus as $status)
  <option  value="{{$status->osid}}">{{$status->status}}</option>
    @endforeach
</select>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название оборудования</label>
    <input type="text" name="name" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Где заказано</label>
    <input type="text" name="where" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Когда заказано</label>
    <input type="date" name="when" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
  <label for="paidfor" class="form-label"></label>
<select id="object" name = "paidfor">
<option  value="0">Не оплачено</option>
<option  value="0">Оплачено</option>
</select>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Когда оплачено</label>
    <input type="date" name="whenPaid" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Номер счета</label>
    <input type="text" name="paidNumber" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Примерная дата поставки</label>
    <input type="date" name="delivery" class="form-control" id="inputEmail4">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Добавить</button>
  </div>
 
</form>

@endsection