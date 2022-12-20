@extends('layout')
@section('content')

    <h1>{{Auth::user()->organisation->name}}</h1>
<div class="dashboard">
  <div class="list">
    <div class="num">
      <h3>{{Auth::user()->organisation->adress}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->organisation->INN}} </h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->organisation->RSCH}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->organisation->KSCH}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->organisation->OKPO}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->organisation->OGRN}}</h3>
    </div>
    <div class="num">
      <h3>{{Auth::user()->organisation->phone}}</h3>
    </div>
  </div>
  <form method="GET" action="{{route('dashboardEdit', Auth::user()->organisation->orgid)}}">
<div class="col-12">
        <button type="submit" class="btn btn-primary">Редактировать</button>
    </div>
  </form>
</div>

@endsection