@extends('layout')
@section('content')
<form class="row g-3" action = "{{route('UpdatePribor', $pribor->PriborID)}}" method = "post">
{{csrf_field()}}
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название прибора</label>
    <input type="text" name="name" value="{{$pribor->name}}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Заводской номер прибора</label>
    <input type="text" name="number" value="{{ $pribor->number }}" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
  <label for="object" class="form-label">Выберите организацию, чей прибор</label>
<select id="object" name = "ObjID">
<option  value="{{$pribor->Objects->ObjID}}">{{$pribor->Objects->ObjName}}</option>
    @foreach ($objects as $obj)
  <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
    @endforeach
</select>
  </div>
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Дата текущей поверки</label>
    <input type="date" name="currentDate" value="{{ $pribor->currentDate  }}" class="form-control" id="inputAddress2">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Дата следующей поверки</label>
    <input type="date" name="nextDate" value="{{ $pribor->nextDate }}" class="form-control" id="inputCity" placeholder="Дата в формате гггг-мм-дд">
  </div>

  <div class="col-md-12">
  <label for="verifiers" class="form-label">Выберите где сейчас прибор</label>
  <select id="verifiers" name = "VID" >
                              <option value="{{$pribor->Verifier->VID}}">{{$pribor->Verifier->name}}</option>  
                              @foreach($verifiers as $verifier)
                                <option  value="{{$verifier->VID}}">{{$verifier->name}}</option>   
                                @endforeach  
                              </select>
  </div>

  <div class="col-12">
  <label for="inputAddress" class="form-label">Комментарии</label>
    <textarea class="form-control" name="comments">{{$pribor->comments}}</textarea>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Изменить</button>
  </div>
</form>
@endsection