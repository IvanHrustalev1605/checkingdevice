@extends('layout')
@section('content')

    <h1>{{Auth::user()->name}}</h1>
<div class="dashboard">
  <div class="list">
    <div class="num">
      <h3>{{Auth::user()->adress}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->INN}} </h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->KPP}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->RSCH}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->KSCH}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->OKPO}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->OGRN}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->phone}}</h3>
    </div>
  </div>
</div>
<form method="GET" action="{{route('dashboardEdit', Auth::user()->uid)}}">
<div class="col-12">
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </div>
  </form>
@endsection