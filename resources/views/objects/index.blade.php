@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 m-3 border-bottom">
        <h1 class="h2">Объекты</h1>
      <form action="{{route('AddFormObject')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button>
      </form>
      </div>
      <div class="table-responsive m-3">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Название</th>
              <th>Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($objects as $object)
            <tr>
              <td>{{$object->ObjName}}<a href = "{{route('thisObject', $object->ObjID)}}"><p>подробнее..</a></td>
              <td>
              {{Form::open(['route' => ['objectDelete', $object->ObjID],
                            'method' => 'delete'])}}
                            <button type="submit" class="btn btn-link" ><i class="bi bi-trash3-fill"></i> </button>
                          </td>
            </tr>
            {{Form::close()}}
            @endforeach
          </tbody>
        </table>
      </div>

@endsection