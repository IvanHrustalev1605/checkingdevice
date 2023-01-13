@extends('layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Заказы</h1>
      </div>
      <div class="row">
        <div class="col-2">
      <form action="{{route('OderForm')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button><hr>
      </form>
      </div>
      <!--<div class="col-3">
      <form action="{{route('lessOdersIndex')}}" method="GET">
      <button type="submit" class="btn btn-info">Cкрыть лишние столбцы</button><hr>
      </form>
      </div>-->
                        <div class="col-5">
                        
                              <form method="get" action="{{route('OderIndex')}}">
                                 <button type="submit" class="btn btn-info btn-mini ">Сбросить все фильтры</button><hr>
                              </form>
                          
                        </div>
      </div>
      <form class = "form-check-inline" action="{{route('OderSort')}}"  method="GET">
      <div class="row">
      <label for="filters">Выбор объекта</label>
                        <div class="col-12 col-sm-12">
                            <select id="filters" name = "sort">
                            <option  value="">Выберите...</option>
                                    @foreach ($objects as $object)
                                <option  value="{{$object->ObjID}}">{{$object->ObjName}}</option>
                                    @endforeach
                              </select><br>
                          </div> 
                          </div>
                      <br>
                      <div class="form-check col-sm-2">
                                    <input class="form-check-input" type="checkbox" name = "PaidFor" id="flexCheckDefault"  >
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Неоплаченные поставщику
                                      </label>
                                    </div>
                                    <br>
                                    <div class="form-check col-sm-2">
                                    <input class="form-check-input" type="checkbox" name = "customerPaid" id="flexCheckDefault"  >
                                      <label class="form-check-label" for="flexCheckDefault">
                                        Неоплаченные заказчиком
                                      </label>
                                    </div>
                                    <br>
                      <button type="submit" class="btn btn-info btn-mini ">Фильтр</button>
                      </form>
    <div class="container-fluid">
      <div class="table-responsive">
        <table class="table table-striped table-sm caption-top">
        <caption>Таблица заказов</caption>
          <thead>
            <tr>
              <th>Объект</th>
              <th>Название оборудования</th>
              <th>Где заказано</th>
              <th>Когда заказано</th>
              <th>Оплата поставщику</th>
              <th>Оплата заказчиком</th>
              <th>Когда установлено</th>
              <th>Примерная дата поставки</th>
              <th>Статус</th>
              <th>Номер счета</th>
              <th>Кто вносил изменения</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($oders as $oder)
              <td>{{$oder->Object->ObjName}}</td>
              <td>{{$oder->name}}</td>
              <td>{{$oder->where}}</td>
              @IF($oder->when === null)
              <td>Ждет заказа</td>
              @else
              <td>{{$oder->ChangeDateFormat1($oder->when)}}</td>
              @endif
              @IF ($oder->paidfor == 0)
              <td><div class = "bg-warning">Не оплачено</div></td>
              @else ($oder->paidfor == 1)
              <td>Оплачено</td>
              @endif
              @IF ($oder->customerPaid == 0)
              <td><div class = "bg-warning">Не оплачено</div></td>
              @else ($oder->customerPaid == 1)
              <td>Оплачено</td>
              @endif
              @if($oder->installed == 0)
              <td>Не установлено</td>
              @else
              <td>{{$oder->installed}}</td>
              @endif
             
              @IF($oder->DiffDate($oder->delivery))
              <td><div class = "bg-warning">{{$oder->delivery}}</div></td>
              @else
              <td><div class = "bg-info bg-gradient">{{$oder->delivery}}</div></td>
              @endif
              @If($oder->OderStatus->osid == 1 )
              <td><div class = "bg-danger">{{$oder->OderStatus->status}}</div></td>
              @elseif($oder->OderStatus->osid == 7 )
              <td><div class = "bg-oder-ok">{{$oder->OderStatus->status}}</div></td>
              @else
              <td>{{$oder->OderStatus->status}}</td>
              @endif
              <td>{{$oder->paidNumber}}</td>
              <td>{{$oder->Users->name}}</td>
              <td>
              
              <a class="bi bi-pencil-fill" href="{{route('OderEdit', $oder->odid)}}"></a>
              {{Form::open(['route' => ['OderDelete', $oder->odid],
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