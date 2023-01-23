@extends('layout')
@section('content')
@include('errors.validErrors')
<br>
<form class="row g-3" action = "{{route('EmergencyEdit', $emergency->eid)}}" method = "POST">
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
    <label for="inputEmail4" class="form-label">Дата выезда</label>
    <input type="date" name="date" class="form-control" id="inputEmail4" value="{{$emergency->date}}">
  </div>
    <input type="hidden" name="uid" value="{{Auth::user()->uid}}" class="form-control" id="uid">
  <div class="col-md-6">
    <label for="time_call" class="form-label">Время звонка или смс</label>
    <input type="time" name="time_call" class="form-control" id="time_call" value="{{$emergency->time_call}}">
  </div>
  <div class="col-md-6">
    <label for="time_departure" class="form-label">Время выезда</label>
    <input type="time" name="time_departure" class="form-control" id="time_departure" value="{{$emergency->time_departure}}">
  </div>
  <div class="col-md-6">
    <label for="time_end" class="form-label">Время окончания работ</label>
    <input type="time" name="time_end" class="form-control" id="time_end" value="{{$emergency->time_end}}">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
 
</form>

@endsection