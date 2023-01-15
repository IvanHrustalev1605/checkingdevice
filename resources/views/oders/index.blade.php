@extends('layout')
@section('content')
<style>
@media (max-width: 400px) {
        .pay {
          padding: 1px;
          margin: 1px;
        }
      }
  </style>
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Заказы</h1>
      </div>
      <div class="row">
        <div class="col-sm-2">
      <form action="{{route('OderForm')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button><hr>
      </form>
      </div>
       <div class="col-sm-2">
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
                      <div class = "row  m-3">
                      <div class="form-check pay col-sm-4 m-1">
                                    <input class="form-check-input" type="checkbox" name = "PaidFor" id="PaidFor"  >
                                      <label class="form-check-label" for="PaidFor">
                                        Неоплаченные поставщику
                                      </label>
                                    </div>
                                    <br>
                                    <div class="form-check pay col-sm-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "customerPaid" id="customerPaid"  >
                                      <label class="form-check-label" for="customerPaid">
                                        Неоплаченные заказчиком
                                      </label>
                                    </div>
                                    <br>
                        </div>
                        <div class = "row  m-3">
                      <div class="form-check col-sm-4 pay mb-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "PaidForOk" id="PaidForOk"  >
                                      <label class="form-check-label" for="PaidForOk">
                                        Оплаченные поставщику
                                      </label>
                                    </div>
                                    <br>
                                    <div class="form-check pay col-sm-3  m-1">
                                    <input class="form-check-input" type="checkbox" name = "customerPaidOk" id="customerPaidOk"  >
                                      <label class="form-check-label" for="customerPaidOk">
                                        Оплаченные заказчиком
                                      </label>
                                    </div>
                                    <br>
                        </div>
                        <div class = "row  m-3">
                      <div class="form-check col-sm-4 pay mb-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "Osid1" id="osid1"  >
                                      <label class="form-check-label" for="osid1">
                                        Нужно заказать
                                      </label>
                                    </div>
                                    <br>
                                    <div class="form-check pay col-sm-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "Osid3" id="osid3"  >
                                      <label class="form-check-label" for="osid3">
                                        Не отправлено поставщиком
                                      </label>
                                    </div>
                                    <div class="form-check pay col-sm-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "Osid4" id="osid4"  >
                                      <label class="form-check-label" for="osid4">
                                        Нужно забрать
                                      </label>
                                    </div>
                                    <div class="form-check pay col-sm-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "Osid5" id="osid5"  >
                                      <label class="form-check-label" for="osid5">
                                        В офисе
                                      </label>
                                    </div>
                                    <div class="form-check pay col-sm-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "Osid6" id="osid6"  >
                                      <label class="form-check-label" for="osid6">
                                       Устанавливается на объекте
                                      </label>
                                    </div>  
                                    <div class="form-check pay col-sm-3 m-1">
                                    <input class="form-check-input" type="checkbox" name = "Osid7" id="osid7"  >
                                      <label class="form-check-label" for="osid7">
                                        Установлено на объекте
                                      </label>
                                    </div>
                                    <br>
                        </div>
                      <button type="submit" class="btn btn-info btn-mini m-1 ">Фильтр</button>
                      </form>
         @if(Auth::user()->is_admin == 0)
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
              <th>Когда установлено</th>
              <th>Примерная дата поставки</th>
              <th>Статус</th>
              <th>Кто вносил изменения</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($oders as $oder)
            @if($oder->installed == 0)
            <tr >
              @else
              <tr class="table-success">
                @endif
              <td>{{$oder->Object->ObjName}}</td>
              <td>{{$oder->name}}</td>
              <td>{{$oder->where}}</td>
              @IF($oder->when === null)
              <td>Ждет заказа</td>
              @else
              <td>{{$oder->ChangeDateFormat1($oder->when)}}</td>
              @endif
              @if($oder->installed == 0)
              <td>Не установлено</td>
              @else
              <td>{{$oder->installed}}</td>
              @endif
              @if($oder->OderStatus->osid > 4)
              <td>{{$oder->delivery}}</td>)
              @elseif($oder->DiffDate($oder->delivery))
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
              <td>{{$oder->Users->name}}</td>
              <td><a class="bi bi-pencil-fill" href="{{route('OderEdit', $oder->odid)}}"></a></td>
            </tr>
            @endforeach
            
          </tbody>
        </table>
      </div>
    </div>
         @else
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
            @if($oder->installed == 0)
            <tr >
              @else
              <tr class="table-success">
                @endif
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
              @if($oder->OderStatus->osid > 4)
              <td>{{$oder->delivery}}</td>)
              @elseif($oder->DiffDate($oder->delivery))
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
         @endif

@endsection