@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Где находится</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>ID</th>
              <th>Прибор</th>
              <th>Где находится</th>
              <th>Когда отвезен</th>
              <th>Когда забрали</th>
              <th>Когда установлен</th>
              <th>Статус</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$w->WID}}</td>
              <td>{{$w->Pribor->name}}</td>
              <td>{{$w->Verifier->name}}</td>
              <td>{{$w->delivered}}</td>
              <td>{{$w->takenAway}}</td>
              <td>Дата установки</td>
              <td>@If($w->status == 0)
              Установлен на объекте
              @else
              {{$w->status}}
              @endif
              </td>
            </tr>
          </tbody>
        </table>
      </div>
      <form action="{{route('editWhereForm', $w->WID)}}" method="GET">
      <button type="submit" class="btn btn-info">Изменить</button><hr>
      </form>

@endsection