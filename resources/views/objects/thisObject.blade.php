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
<div class="container m-4 ">
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
  <div class="accordion" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne">
        <h4>Реквизиты</h4>
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
  <form method="get" action = "{{route('addTaskForm', $object->ObjID)}}">
    <button type="submit" class="btn btn-primary px-4 m-4">Добавить задачу</button>
  </form>
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne">
      <h4>Задачи по объекту</h4>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        @foreach($tasks as $task)
        @if($task->is_done == 1)
        <div class="row bg-success bg-opacity-50 text-wrap p-n4">
            <div class="col-7 m-2 h6">
            <p>{{$task->taskName}}</p>
            </div>
            <div class="col-1 m-2 h6">
            <p>Выполнено</p>
            </div>
            <div class="col-1 m-2 h6">
            <i class="bi bi-check-square h3"></i>
            </div>
            <div class="col-1 m-2 h6">
            <p>{{$task->user->name}}</p>
            </div>
        </div>
      </div>
      @else
      <div class="row ">
            <div class="col-7 h5 text-wrap">
            <p>{{$task->taskName}}</p>
            </div>
            <div class="col-1 m-2 h6">
            <p>Не выполнено</p>
            </div>
            <div class="col-1 m-2 h6">
              <form method="get" action="{{route('changeStatus', $task->tid)}}">
              <button class="btn btn-outline-info btn-sm">Выполнить 
              <i class="bi bi-check-lg"></i></button>
              </form>
            </div>
            <div class="col-1 m-2 h6">
            <p>{{$task->user->name}}</p>
            </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
  </div>
 </div>

@include('errors.validErrors')
<form method="post" action="{{route('addDoc', $object->ObjID)}}" enctype="multipart/form-data">
    {{csrf_field()}}
            <div class="col-sm-9 text-secondary m-4">
				<input type="file" name="document" class="form-control">
			</div>
             
    </form>
    <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#doc">
        <h4>Галерея</h4>
      </button>
    </h2>
    <div id="doc" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
    <div class="accordion-body"> 
    <div id="file-container" class="row"> 
      </div>
    </div>
    </div>
    </div>
<hr>
<form method="get" action="{{route('editDoc', $object->ObjID)}}">
    {{csrf_field()}}
            <button type="submit" class="btn btn-primary px-4 m-4">Заполнить(изменить) данные</button>
    </form>
</div>

  <script>
    const types = {
      img:['jpg', 'png', 'jpeg', 'bmp'],
      docs:['txt', 'docx']
    }
    var objDocs = @json($objDocs->toArray());
    var documents = @json($documents->toArray());
    const container = document.getElementById('file-container'); 

    documents.forEach((item) => {
      console.log(item);
          const ext = item.doc.split('.').pop();
          const itemContainer = document.createElement('div');
          const figure = document.createElement('figure');
          const figcaption = document.createElement('figcaption');
          const link = document.createElement('a');
          const dateCreated = item.created_at;
          link.href = '/public/storage/' + item.doc;
          link.target = '_blank';

          const img = document.createElement('img');

          itemContainer.classList.add('col-lg-3', 'col-md-4', 'col-6');
          figure.classList.add('figure', 'm-4');
          figcaption.classList.add('figure-caption', 'text-center');
          figcaption.innerText = item.docName ;
          img.classList.add('img-fluid');
          img.width = 200;
          img.height = 190;

          if (types.img.includes(ext)) {
            img.src = '/public/storage/' + item.doc;
          }
          else if(types.docs.includes(ext)){
            img.src = '/public/storage/icons/icon_doc.jpg';
          }
          figure.appendChild(img);
          link.appendChild(img);
          figure.appendChild(link);
          figure.appendChild(figcaption);
          itemContainer.appendChild(figure);
          container.appendChild(itemContainer);
                 
      });
  </script>
@endsection