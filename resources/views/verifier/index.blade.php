@extends('layout')
@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Поверители</h1>
      </div>
      <form action="{{route('verifierCreateForm')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button><hr>
      </form>
      <div class = "container">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Название</th>
              <th>Адресс</th>
              <th>Телефон</th>
              <th>Email</th>
            </tr>
          </thead>
          <tbody>
            @foreach($verifiers as $verifier)
            <tr>
              @if($verifier->VID == 5 ||$verifier->VID == 6 ||
                  $verifier->VID == 7 ||$verifier->VID == 8 ||
                  $verifier->VID == 9)
              @else
              <td>{{$verifier->name}}</td>
              <td>{{$verifier->adress}}</td>
              <td>{{$verifier->phone}}</td>
              <td>{{$verifier->email}}</td>
            </tr>
            @endif
            @endforeach
          </tbody>
        </table>
      </div>
      </div>
@endsection