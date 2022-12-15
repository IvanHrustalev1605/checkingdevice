@extends('layout')
@section('content')
<div class="navMain">
@include('supportViews.navbar')
</div>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 pribori">Приборы</h1>
      </div>
      <form action="{{route('AddFormPribor')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button><hr>
      </form>
                  <form class = "form-check-inline" action="{{route('Sort')}}"  method="GET">
                    <div class="row">
                      <label for="filters">Выбор организации</label>
                        <div class="col-6 col-sm-3">
                            <select id="filters" name = "sort"  >
                            <option  value="">Выберите...</option>
                                    @foreach ($objects as $obj)
                                <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
                                    @endforeach
                              </select><br>
                                  <label  class="form-label">Укажите год...</label>
                                <input class="form-control form-control-sm" name = "Year" value="{{old('Year')}}"  type="text" >
                          </div>     
                                    <div class="col-6 col-sm-3">
                                      <label  class="form-label">Дата от...</label>
                                      <input class="form-control form-control-sm" name = "SortDateUp"  type="text" >
                                      <label  class="form-label">Дата до...</label>
                                      <input class="form-control form-control-sm" name = "SortDateTo"  type="text" >
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name = "sortDESC" value="sortDESC" id="flexCheckDefault"  >
                                      <label class="form-check-label" for="flexCheckDefault">
                                        По убыванию
                                      </label>
                                    </div>
                                    <div class="form-check">
                                      <input class="form-check-input" type="checkbox" name = "sortASC" value="sortASC" id="flexCheckDefault"  >
                                      <label class="form-check-label" for="flexCheckDefault">
                                        По возрастанию
                                      </label>
                                    </div>
                      </div>
                      <button type="submit" class="btn btn-info btn-mini ">Фильтр</button>
                      </form>
   @if (session('message'))
   <div class="alert alert-info" role="alert">
  {{session('message')}}
</div>
@endif
@if (session('messageOK'))
   <div class="alert alert-info" role="alert">
  {{session('messageOK')}}
</div>
@endif
<div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Id</th>
              <th>Название</th>
              <th>Номер</th>
              <th>Объект</th>
              <th>Где находится</th>
              <th>Поверен до</th>
              <th>Дата следующей поверки</th>
              <th>Коментарии</th>
              <th>Кто вносил изменения</th>
              <th>Действия</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($pribors as $pribor)
            <tr>
              <td>{{$pribor->PriborID}}</td>
              <td>{{$pribor->name}}</td>
              <td>{{$pribor->number}}</td>
              <td>{{$pribor->Objects->ObjName}}</td>

              <td>{{$pribor->StatusDevice->status}}<a href="{{route('WhereIndex', $pribor->PriborID)}}"><p class = "moreInfo">(подробнее)</p></a></td>

              <td>{{ $pribor->currentDate}}</td> 
              <td>{{ $pribor->nextDate}}</td>
              <td>{{$pribor->comments}}</td>
              <td>{{$pribor->User->name}}</td>
              <td>
              <a class="bi bi-pencil-fill" href="{{route('EditPribor', $pribor->PriborID)}}"></a>
              {{Form::open(['route' => ['PriborDelete', $pribor->PriborID],
                            'method' => 'delete'])}}
                            <button type="submit" class="btn btn-link" ><i class="bi bi-trash3-fill"></i> </button>
                          </td>
            </tr>
            @endforeach

          </tbody>
        </table>
      </div>
</div>
@if (session('sortAlert'))
   <div class="alert alert-info" role="alert">
  {{session('sortAlert')}}
</div>
@endif
@endsection