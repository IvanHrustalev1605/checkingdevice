@extends('layout')
@section('content')

<form class="row g-3" action = "{{route('AddObject')}}" method = "POST">
    {{csrf_field()}}
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Объект</label>
    <input type="text" name="ObjName" class="form-control" id="inputEmail4">
  </div>
  <div class="col-12">
  <label for="inputAddress" class="form-label">Комментарии</label>
    <textarea class="form-control" name="comments">Добавить комментарий </textarea>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Добавить</button>
  </div>
</form>

@endsection