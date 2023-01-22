@extends('layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2 pribori">Приборы</h1>
      </div>
      <form action="{{route('AddFormPribor')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button><hr>
      </form>
      <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
        Фильтры
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
      <div class="filters-background  p-3">
                  <form class = "form-check-inline" action="{{route('Sort')}}"  method="GET">
                  <div class="col-sm-2 m-2">
                        <label for="filters">Выберите объект</label>
                            <select id="filters" name = "sort">
                            <option  value="">Выберите...</option>
                                    @foreach ($objects as $obj)
                                <option  value="{{$obj->ObjID}}">{{$obj->ObjName}}</option>
                                    @endforeach
                              </select>
                   </div>
                    <div class="row m-2">
                    <div class="col-6 col-sm-2">
                        <label class="form-label">Укажите номер прибора</label>
                            <input class="form-control form-control-sm" name = "SortDeviceNumber" value = "{{$request->query('SortDeviceNumber')}}"type="text" >
                          </div>
                     
                              <div class="col-6 col-sm-2">
                                  <label  class="form-label">Укажите год поверки...</label>
                                <input class="form-control form-control-sm" name = "Year" value="{{$request->query('Year')}}"  type="text" >
                              </div>
                                <div class="col-6 col-sm-2">
                                <label  class="form-label">Поиск по названию прибора</label>
                                <input class="form-control form-control-sm" name = "name" value="{{$request->query('name')}}"  type="text" >
                                
                          </div>  
                    </div>   
                          <div class="row m-2">
                                    <div class="col-sm-2">
                                      <label  class="form-label">Дата следующей поверки от...</label>
                                      <input class="form-control form-control-sm" name = "SortDateUp"  value="{{$request->query('SortDateUp')}}"  type="date" >
                                    </div> 
                                      <div class="col-sm-2">  
                                      <label  class="form-label">Дата следующей поверки до...</label>
                                      <input class="form-control form-control-sm" name = "SortDateTo"  value="{{$request->query('SortDateTo')}}" type="date" >
                                    </div>
                                    <div class="row m-2">
                                    <div class="form-check col-sm-2">
                                      <input class="form-check-input" type="checkbox" name = "sortDESC" id="sortDESC"  >
                                      <label class="form-check-label" for="sortDESC">
                                        По убыванию
                                      </label>
                                    </div>
                                    <div class="form-check col-sm-2">
                                      <input class="form-check-input" type="checkbox" name = "sortASC"  id="sortASC"  >
                                      <label class="form-check-label" for="sortASC">
                                        По возрастанию
                                      </label>
                                    </div>
                                    <div class="form-check col-sm-2">
                                    <input class="form-check-input" type="checkbox" name = "comments" id="comments"  >
                                      <label class="form-check-label" for="comments">
                                        Где есть комментарии
                                      </label>
                                    </div>
                                    <div class="form-check col-sm-2">
                                    <input class="form-check-input" type="checkbox" name = "Vid" id="VID"  >
                                      <label class="form-check-label" for="VID">
                                        Которые лежат в офисе и нужно отвезти в поверку
                                      </label>
                                    </div>
                                    </div>
                      </div>
                      <br>
                      <button type="submit" class="btn btn-info btn-mini m-2 ">Фильтр</button>
                      </form>
                          <div class="reset-filters m-2">
                              <form method="get" action="{{route('PriboriIndex')}}">
                                 <button type="submit" class="btn btn-info btn-mini ">Сбросить все фильтры</button>
                              </form>
                          </div>
                        </div>
      </div>
    </div>
  </div>
</div>

@if (session('messageOK'))
   <div class="alert alert-info p-1" role="alert">
  {{session('messageOK')}}
</div>
@endif
<!------------------------------------------------------->
@if(Auth::user()->is_admin == 0)
<div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Название</th>
              <th scope="col">Номер</th>
              <th scope="col">Объект</th>
              <th scope="col">Где находится</th>
              <th scope="col">Дата следующей поверки</th>
              <th scope="col">Коментарии</th>
              <th scope="col">Кто вносил изменения</th>
              <th scope="col">Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pribors as $pribor)
            <tr>
              <td>{{$pribor->name}}</td>
              <td>{{$pribor->number}}</td>
              <td>{{$pribor->Objects->ObjName}}</td>
              <td>{{$pribor->Where->Verifier->name}}<a href="{{route('WhereIndex', $pribor->PriborID)}}"><p class = "moreInfo">(подробнее)</p></a></td> 
              <td>{{ $pribor->nextDate}}</td>
              <td>{{$pribor->comments}}</td>
              <td>{{$pribor->Users->name}}</td>
              <td>
              <a class="bi bi-pencil-fill" href="{{route('EditPribor', $pribor->PriborID)}}"></a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
  </div>
@else
<!---------------------------------------------------->
<div class="container">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">Название</th>
              <th scope="col">Номер</th>
              <th scope="col">Объект</th>
              <th scope="col">Где находится</th>
              <th scope="col">Дата следующей поверки</th>
              <th scope="col">Коментарии</th>
              <th scope="col">Кто вносил изменения</th>
              <th scope="col">Действия</th>
            </tr>
          </thead>
          <tbody>
            @foreach($pribors as $pribor)
            <tr>
              <td>{{$pribor->name}}</td>
              <td>{{$pribor->number}}</td>
              <td>{{$pribor->Objects->ObjName}}</td>
              <td>{{$pribor->Where->Verifier->name}}<a href="{{route('WhereIndex', $pribor->PriborID)}}"><p class = "moreInfo">(подробнее)</p></a></td> 
              <td>{{ $pribor->nextDate}}</td>
              <td>{{$pribor->comments}}</td>
              <td>{{$pribor->Users->name}}</td>
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
@endif

                
@endsection