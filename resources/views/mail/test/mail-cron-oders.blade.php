<meta charset="UTF-8">

<div>Не оплачено!</div>
@foreach ($CurrentDate as $key => $el)
   <div>Объект: {{ $key }}, оборудование: {{ $el }}</div>
@endforeach


