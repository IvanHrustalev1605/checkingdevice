@extends('layout')
@section('content')
<form class="row g-3" action="{{route('UpdateDashboard', Auth::user()->uid)}}" method="post">
    {{csrf_field()}}
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Адресс</label>
        <input type="text" name="adress" value="{{Auth::user()->adress}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">ИНН</label>
        <input type="text" name="INN" value="{{Auth::user()->INN}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">КПП</label>
        <input type="text" name="KPP" value="{{Auth::user()->KPP}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Р/СЧ</label>
        <input type="text" name="RSCH" value="{{Auth::user()->RSCH}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">К/СЧ</label>
        <input type="text" name="KSCH" value="{{Auth::user()->KSCH}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">ОКПО</label>
        <input type="text" name="OKPO" value="{{Auth::user()->OKPO}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">ОГРН</label>
        <input type="text" name="OGRN" value="{{Auth::user()->OGRN}}" class="form-control" id="inputEmail4">
    </div>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Телефон</label>
        <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" id="inputEmail4">
    </div>

    <div class="col-12">
        <button type="submit" class="btn btn-primary">Изменить</button>
    </div>
</form>
@endsection