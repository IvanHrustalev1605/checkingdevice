@extends('layout')
@section('content')
<form class="row g-3" action = "{{route('UpdatePribor', $pribor->PriborID)}}" method = "post">
    {{csrf_field()}}
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название прибора</label>
    <input type="text" name="name" value="{{$pribor->name}}" class="form-control" id="inputEmail4" >
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Заводской номер прибора</label>
    <input type="text" name="number" value="{{$pribor->number}}" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
  <label for="exampleDataList" class="form-label">Datalist example</label>
<input class="form-control" name = "object" list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
<datalist  id="datalistOptions">
    @foreach ($objects as $object)
  <option  value="{{$object->	ObjName}}">
@endforeach
</datalist>
  </div>
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Дата текущей поверки</label>
    <input type="text" name="currentDate" class="form-control" id="inputAddress2" value="{{$pribor->currentDate}}" placeholder="Дата в формате гггг-мм-дд">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Дата следующей поверки</label>
    <input type="text" name="nextDate" class="form-control" id="inputCity"value="{{$pribor->nextDate}}" placeholder="Дата в формате гггг-мм-дд">
  </div>

  <div class="col-12">
  <label for="inputAddress" class="form-label">Комментарии</label>
    <textarea class="form-control" name="comments" >{{$pribor->comments}}</textarea>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
</form>
@endsection