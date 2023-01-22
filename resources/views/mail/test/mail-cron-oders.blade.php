<meta charset="UTF-8">

<div>Не оплачено!</div>
@foreach ($CurrentDate as $oders)
   @foreach ($oders as $key => $el)
   <div>Объект: {{ $key }}, оборудование: {{ $el }}</div>
   @endforeach
@endforeach
<p>"Это письмо создано автоматически и не требует ответа"</p>
<p>Все интересующие вопросы Вы можете адресовать на</p>
<p>khrustalev16@bk.ru</p>

