@extends('layout')
@section('content')

<form class="row g-3" action = "{{route('OderUpdate', $oder->odid)}}" method = "POST">
    {{csrf_field()}}
    <div class="col-md-6">
  <label for="object" class="form-label">Выберите объект</label>
<select id="object" name = "ObjID">
<option  value="{{$oder->Object->ObjID}}">{{$oder->Object->ObjName}}</option>
    @foreach ($objects as $obj)
  <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
    @endforeach
</select>
  </div>
  <div class="col-md-6">
  <label for="object" class="form-label">Статус заказа...</label>
<select id="object" name = "osid">
<option  value="{{$oder->OderStatus->osid}}">{{$oder->OderStatus->status}}</option>
    @foreach ($oderstatus as $status)
  <option  value="{{$status->osid}}">{{$status->status}}</option>
    @endforeach
</select>
  </div>
    <input type="hidden" name="uid" value="{{Auth::user()->uid}}" class="form-control" id="inputEmail4">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название оборудования</label>
    <input type="text" name="name" value = "{{$oder->name}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Где заказано</label>
    <input type="text" name="where" value = "{{$oder->where}}"  class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Когда заказано</label>
    <input type="date" name="when" value = "{{$oder->when}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Оплачено или нет</label>
    <input type="text" name="paidfor" value = "{{$oder->paidfor}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
  <label for="paidfor" class="form-label">Оплата поставщику</label>
<select id="object" name = "paidfor">
<option  value="0">Не оплачено</option>
<option  value="1">Оплачено</option>
</select>
  </div>
  <div class="col-md-6">
  <label for="customerPaid" class="form-label">Оплата заказчиком</label>
<select id="object" name = "customerPaid">
<option  value="0">Не оплачено</option>
<option  value="1">Оплачено</option>
</select>
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Номер счета</label>
    <input type="text" name="paidNumber" value = "{{$oder->paidNumber}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Примерная дата поставки</label>
    <input type="date" name="delivery" value = "{{$oder->delivery}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Когда установлено</label>
    <input type="date" name="installed" value = "{{$oder->installed}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
 
</form>

@endsection