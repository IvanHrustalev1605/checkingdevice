@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 m-3 border-bottom">
        <h1 class="h2">Объекты</h1>
      <form action="{{route('AddFormObject')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button>
      </form>
      </div>
      <div class="row justify-content-between">
      <div class="col-sm-2 m-3">
      <form  action="{{route('ObjectSort')}}" method="GET">
            
                <label  class="form-label">Поиск по названию</label>
                <input class="form-control form-control-sm" name = "ObjName" type="text" >
                <br>
                <button type="submit" class="btn btn-info">Выбрать</button>
            </form>
            </div>
                    <div class="col-sm-2 mr-3">
                       <form method="get" action="{{route('ObjectsIndex')}}">
                            <button type="submit" class="btn btn-info btn-mini ">Сбросить все фильтры</button>
                       </form>
                    </div>
         </div>
         @if(Auth::user()->is_admin == 0)
         <div class="table-responsive m-3">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Название</th>
            </tr>
          </thead>
          <tbody>
            @foreach($objects as $object)
            <tr>
              <td>{{$object->ObjName}}<a href = "{{route('thisObject', $object->ObjID)}}"><p>открыть полную информацию..</a></td>
            </tr>
            {{Form::close()}}
            @endforeach
          </tbody>
        </table>
      </div>
         @else
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
              <td>{{$object->ObjName}}<a href = "{{route('thisObject', $object->ObjID)}}"><p>открыть полную информацию..</a></td>
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
         @endif
     

@endsection