@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Объекты</h1>
      </div>
      <form action="{{route('AddFormObject')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button>
      </form>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Номер</th>
              <th>Название</th>
              <th>Комментарии</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($objects as $object)
            <tr>
              <td>{{$object->ObjID}}</td>
              <td>{{$object->ObjName}}</td>
              <td>{{$object->comments}}</td>
              <td><a href="">Изменить</a>
              {{Form::open(['route' => ['objectDelete', $object->ObjID],
                            'method' => 'delete'])}}
                            <button type="submit" class="btn btn-link" >Удалить </button>
                          </td>
            </tr>
            {{Form::close()}}
            @endforeach
          </tbody>
        </table>
      </div>

@endsection