@extends('layout')
@section('content')
@include('errors.validErrors')
<form class="row g-3" action = "{{route('AddPribor')}}" method = "POST">
    {{csrf_field()}}
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Название прибора</label>
    <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="inputEmail4">
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Заводской номер прибора</label>
    <input type="text" name="number" value="{{ old('number') }}" class="form-control" id="inputPassword4">
  </div>
  <div class="col-md-6">
  <label for="object" class="form-label">Выберите организацию, чей прибор</label>
<select id="object" name = "ObjID" value="{{ old('object') }}">
<option  value="">Выберите...</option>
    @foreach ($objects as $obj)
  <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
    @endforeach
</select>
  </div>
  <div class="col-md-6">
    <label for="inputAddress2" class="form-label">Дата текущей поверки</label>
    <input type="date" name="currentDate" value="{{ old('currentDate') }}" class="form-control" id="inputAddress2">
  </div>

  <div class="col-md-6">
    <label for="inputCity" class="form-label">Дата следующей поверки</label>
    <input type="date" name="nextDate" value="{{ old('nextDate') }}" class="form-control" id="inputCity" placeholder="Дата в формате гггг-мм-дд">
  </div>

  <div class="col-md-12">
  <label for="verifiers" class="form-label">Выберите где сейчас прибор</label>
  <select id="verifiers" name = "VID" >
                              <option  value="5">Установлен на объекте</option>    
                              @foreach($verifiers as $verifier)
                                <option  value="{{$verifier->VID}}">{{$verifier->name}}</option>   
                                @endforeach  
                              </select>
  </div>

  <div class="col-12">
  <label for="inputAddress" class="form-label">Комментарии</label>
    <textarea class="form-control" name="comments"></textarea>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Добавить</button>
  </div>
</form>

@endsection