@extends('layout')
@section('content')
<div class="container thisObj">
  <div class="row">
    <div class="obj-name col-sm">
    <p class=" h2">{{$object->ObjName}}</p>
    </div>
  </div>
</div>
<div class="filters-background">
<div class="container mt-2 ">
  <div class="row justify-content-end">
    <div class="col-3">
    <p class="h5 m-1" >Адрес объекта</p>
     </div>
        <div class="col-6">
        <p class="h5 m-1">  {{$object->adress}}</p>
      </div>
  </div>
  <div class="row justify-content-end">
    <div class="col-3">
    <p class="h5 m-1"> Контактное лицо</p>
    </div>
    <div class="col-6">
    <p class="h5 m-1"> {{$object->contactPerson}}</p>
    </div>
  </div>
  <div class="row justify-content-end">
    <div class="col-3">
    <p class="h5 m-1"> Контактный телефон</p>
    </div>
    <div class="col-6">
    <p class="h5 m-1">{{$object->phone}}</p>
    </div>
  </div>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
        Реквизиты
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <div class="row justify-content-end">
            <div class="col-3">
            <p class="h5 m-1"> ИНН</p>
             </div>
            <div class="col-6">
            <p class="h5 m-1">{{$object->INN}}</p>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3">
            <p class="h5 m-1">  КПП</p>
             </div>
            <div class="col-6">
            <p class="h5 m-1"> {{$object->KPP}}</p>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3">
            <p class="h5 m-1"> Расчетный счет</p>
             </div>
            <div class="col-6">
            <p class="h5 m-1"> {{$object->RSCH}}</p>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3">
            <p class="h5 m-1">Корр. счет</p>
             </div>
            <div class="col-6">
            <p class="h5 m-1"> {{$object->KSCH}}</p>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3">
            <p class="h5 m-1">ОКПО</p>
             </div>
            <div class="col-6">
            <p class="h5 m-1"> {{$object->OKPO}}</p>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-3">
            <p class="h5 m-1"> ОГРН</p>
             </div>
            <div class="col-6">
            <p class="h5 m-1">{{$object->OGRN}}</p>
            </div>
        </div>
      </div>
    </div>
  </div>

</div>
<div class="storage mt-4">
    <form method="post" action="{{route('addDoc', $object->ObjID)}}" enctype="multipart/form-data">
    {{csrf_field()}}
            <div class="col-sm-9 text-secondary">
				<input type="file" name="document" class="form-control">
			</div>
            <button type="submit" class="btn btn-primary px-4 mt-2">Добавить</button>
    </form>
    <div>
    @foreach($documents as $doc)
        <img src="\storage\{!!$doc->doc!!}" width="200" height="190">
    @endforeach
    </div>
</div>
</div>
@endsection