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
<div class="storage mt-4 mb-4">

    <div>
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#doc">
        Галлерея
      </button>
    </h2>
    <div id="doc" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body"> 
    <div id="file-container" class="row"> 
      </div>
    </div>
    </div>
    </div>
</div>
<hr>
@include('errors.validErrors')
<form method="post" action="{{route('addDoc', $object->ObjID)}}" enctype="multipart/form-data">
    {{csrf_field()}}
            <div class="col-sm-9 text-secondary">
				<input type="file" name="document" class="form-control">
			</div>
            <button type="submit" class="btn btn-primary px-4 mt-2">Добавить</button>
    </form>
</div>

  <script>
    const types = {
      img:['jpg', 'png', 'jpeg', 'bmp'],
      docs:['txt', 'docx']
    }
    var documents = @json($documents->toArray());
    const container = document.getElementById('file-container'); 

    documents.forEach((item) => {
    
      const ext = item.doc.split('.').pop();
      const itemContainer = document.createElement('div');
      const figure = document.createElement('figure');
      const figcaption = document.createElement('figcaption');
      const link = document.createElement('a');
      link.href = '\\storage\\' + item.doc;
      link.target = '_blank';

      const img = document.createElement('img');

      itemContainer.classList.add('col-lg-3', 'col-md-4', 'col-6');
      figure.classList.add('figure', 'm-4');
      figcaption.classList.add('figure-caption');
      figcaption.innerText = "Открыть";
      img.classList.add('img-fluid');
      img.width = 200;
      img.height = 190;

      if (types.img.includes(ext)) {
        img.src = '\\storage\\' + item.doc;
      }
      else if(types.docs.includes(ext)){
        img.src = '\\storage\\icons\\icon_doc.jpg';
      }
      figure.appendChild(img);
      link.appendChild(figcaption);
      figure.appendChild(link);
      itemContainer.appendChild(figure);
      container.appendChild(itemContainer);

    })

  </script>
@endsection