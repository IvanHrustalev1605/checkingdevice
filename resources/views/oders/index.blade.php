@extends('layout')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h2">Заказы</h1>
      </div>
      <form action="{{route('OderForm')}}" method="GET">
      <button type="submit" class="btn btn-info">Добавить</button><hr>
      </form>
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
                      <button type="submit" class="btn btn-info btn-mini ">Фильтр</button>
                      </form>

      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Объект</th>
              <th>Название оборудования</th>
              <th>Где заказано</th>
              <th>Когда заказано</th>
              <th>Оплачено или нет</th>
              <th>Когда оплачено</th>
              <th>Номер счета</th>
              <th>Примерная дата поставки</th>
              <th>Статус</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach($oders as $oder)
              <td>{{$oder->Object->ObjName}}</td>
              <td>{{$oder->name}}</td>
              <td>{{$oder->where}}</td>
              <td>{{$oder->ChangeDateFormat1($oder->when)}}</td>
              @IF ($oder->paidfor == 0)
              <td>Не оплачено</td>
              @else ($oder->paidfor == 1)
              <td>Оплачено</td>
              @endif

              @If($oder->togglePaid())
              <td>{{$oder->whenPaid}}</td>
              @else <td><div class = "bg-danger">Нужно оплатить</div></td>
              @endif

              <td>{{$oder->paidNumber}}</td>
              @IF($oder->DiffDate($oder->delivery))
              <td><div class = "bg-warning">{{$oder->delivery}}</div></td>
              @else
              <td><div class = "bg-info bg-gradient">{{$oder->delivery}}</div></td>
              @endif

              <td>{{$oder->OderStatus->status}}</td>
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

@endsection