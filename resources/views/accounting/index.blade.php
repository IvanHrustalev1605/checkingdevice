@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Объекты</h1>
      </div>
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>id</th>
              <th>Объект</th>
              <th>Номер счета</th>
              <th>Сумма</th>
              <th>Оплачено или нет</th>
              <th>Номер УПД</th>
              <th>Дата выставления</th>
              <th>Комментарии</th>
            </tr>
          </thead>
          <tbody>
            @foreach($accountings as $accounting)
            <tr>
              <td>{{$accounting->id}}</td>
              <td>{{$accounting->GetObjectName()}}</td>
              <td>{{$accounting->bill}}</td>
              <td>{{$accounting->sum}}</td>
              @if($accounting->pay == 0)
              <td>Не оплачено</td>
              @else
              <td>Оплачено</td>
              @endif
              <td>{{$accounting->UPD}}</td>
              
              <td>{{$accounting->dateOfIssue}}</td>
              <td>{{$accounting->comments}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

@endsection