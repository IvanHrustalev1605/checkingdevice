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
      <div class="filters-background  p-3">
                  <form class = "form-check-inline" action="{{route('Sort')}}"  method="GET">
                    <div class="row">
                    <div class="col-6 col-sm-3"><label  class="form-label">Укажите номер прибора</label>
                                <input class="form-control form-control-sm" name = "SortDeviceNumber" type="text" ></div>
                        <div class="col-6 col-sm-4">
                        <label for="filters">Выбор объект</label>
                            <select id="filters" name = "sort"  >
                            <option  value="">Выберите...</option>
                                    @foreach ($objects as $obj)
                                <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
                                    @endforeach
                              </select><br>
                              
                                  <label  class="form-label">Укажите год следующей поверки...</label>
                                <input class="form-control form-control-sm" name = "Year" value="{{old('Year')}}"  type="text" ><br>

                          </div>  
                    </div>   
                          <div class="row">
                                    <div class="col-sm-5">
                                      <label  class="form-label">Дата следующей поверки от...</label>
                                      <input class="form-control form-control-sm" name = "SortDateUp"  type="date" >
                                      <label  class="form-label">Дата следующей поверки до...</label>
                                      <input class="form-control form-control-sm" name = "SortDateTo"  type="date" >
                                    </div>
                                    <div class="col-sm-5">
                                      <label  class="form-label">Дата текущей поверки от...</label>
                                      <input class="form-control form-control-sm" name = "SortCurrentDateUp"  type="date" >
                                      <label  class="form-label">Дата текущей поверки до...</label>
                                      <input class="form-control form-control-sm" name = "SortCurrentDateTo"  type="date" >
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
                      <br>
                      <button type="submit" class="btn btn-info btn-mini ">Фильтр</button>
                      </form>
                        <div class="reset-filters-parent">
                          <div class="reset-filters">
                              <form method="get" action="{{route('PriboriIndex')}}">
                                 <button type="submit" class="btn btn-info btn-mini ">Сбросить все фильтры</button>
                              </form>
                          </div>
                        </div>
                        </div>
   @if (session('message'))
   <div class="alert alert-info p-1" role="alert">
  {{session('message')}}
</div>
@endif
@if (session('messageOK'))
   <div class="alert alert-info p-1" role="alert">
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

              <td>{{$pribor->Where->Verifier->name}}<a href="{{route('WhereIndex', $pribor->PriborID)}}"><p class = "moreInfo">(подробнее)</p></a></td>

              <td>{{ $pribor->currentDate}}</td> 
              <td>{{ $pribor->nextDate}}</td>
              <td>{{$pribor->comments}}</td>
              <td>{{Auth::user()->name}}</td>
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
@endsection