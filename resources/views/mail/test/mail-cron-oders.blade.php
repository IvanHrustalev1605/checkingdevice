<meta charset="UTF-8">

<div>Не оплачено!</div>
@foreach ($CurrentDate as $oders)
   @foreach ($oders as $key => $el)
   <div>Объект: {{ $key }}, оборудование: {{ $el }}</div>
   @endforeach
@endforeach


