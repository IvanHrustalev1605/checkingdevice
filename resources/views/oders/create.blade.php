@extends('layout')
@section('content')

<form class="row g-3" action = "{{route('OderAdd')}}" method = "POST">
    {{csrf_field()}}
    <div class="col-md-6">
  <label for="object" class="form-label">Выберите объект</label>
<select id="object" name = "ObjID" value="{{ old('object') }}">
<option  value="">Выберите...</option>
    @foreach ($objects as $obj)
  <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
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
    <input type="text" name="when" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Оплачено или нет</label>
    <input type="text" name="paidfor" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Когда оплачено</label>
    <input type="text" name="whenPaid" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Номер счета</label>
    <input type="text" name="paidNumber" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Примерная дата поставки</label>
    <input type="text" name="delivery" class="form-control" id="inputEmail4">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Добавить</button>
  </div>
 
</form>

@endsection