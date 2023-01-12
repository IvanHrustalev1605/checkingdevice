@extends('layout')
@section('content')
<form class="row g-3" action = "{{route('UpdateDeviceLocation', $w->PriborID)}}" method = "post">
    {{csrf_field()}}
  <div class="col-md-6">
    <label for="verifiers" class="form-label">Где находится</label>
    <select id="verifiers" name = "VID"  >
                              <option  value="{{$w->Verifier->VID}}">{{$w->Verifier->name}}</option>    
                              @foreach($verifiers as $verifier)
                                <option  value="{{$verifier->VID}}">{{$verifier->name}}</option>   
                                @endforeach  
                              </select>
  </div>
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Когда отвезен</label>
    <input type="date" name="delivered" class="form-control" id="inputAddress2" value="{{$w->delivered}}" placeholder="Дата в формате гггг-мм-дд">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Когда забрали</label>
    <input type="date" name="takenAway" class="form-control" id="inputCity"value="{{$w->takenAway}}" placeholder="Дата в формате гггг-мм-дд">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Когда установлен</label>
    <input type="date" name="" class="form-control" id="inputCity"value="" placeholder="Дата в формате гггг-мм-дд">
  </div>
  <div class="col-md-6">
    <label for="inputCity" class="form-label">Статус</label>
    <input type="text" name="status" class="form-control" id="inputCity"value="" placeholder="Что с прибором щас">
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
</form>
@endsection