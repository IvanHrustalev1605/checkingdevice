@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Где находится</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Прибор</th>
              <th>Где находится</th>
              <th>Когда отвезен</th>
              <th>Когда забрали</th>
              <th>Статус</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$w->Pribor->name}}</td>
              @IF($w->Verifier->VID === 5)
              <td>Установлен на объекте</td>
              @else
              <td>{{$w->Verifier->name}}
              <a href = "{{route('VerifierIndex')}}"><p class="moreInfo">(подробнее о поверители)</a></p>
              </td>
              @endif
              <td>{{$w->delivered}}</td>
              <td>{{$w->takenAway}}</td>  
              @IF($w->Verifier->VID === 5)
              <td>Поверен, установлен</td>
              @else  
              <td>{{$w->status}}</td>
              @endif
            </tr>
          </tbody>
        </table>
      </div>
      <form action="{{route('editWhereForm', $w->PriborID)}}" method="GET">
      <button type="submit" class="btn btn-info">Изменить</button><hr>
      </form>

@endsection