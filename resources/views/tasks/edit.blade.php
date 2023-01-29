@extends('layout')
@section('content')
<form class="row g-3" action = "{{route('addTask', $object->ObjID)}}" method = "post">
    {{csrf_field()}}

  <div class="col-md-6">
    <label for="taskName" class="form-label">Что нужно сделать</label>
    <input type="text" name="taskName" class="form-control" id="taskName" value="{{$object->taskName}}" >
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
</form>
@endsection