<meta charset="UTF-8">

<div>Нужно заказать</div>
@foreach ($CurrentDate as $oders)
   @foreach ($oders as $key => $el)
   <div><p><b>Объект:</b> {{ $key }}, <b>оборудование:</b> {{ $el }}</p></div>
   @endforeach
@endforeach
<hr>
<br>
<p>"Это письмо создано автоматически и не требует ответа"</p>
<p>Все интересующие вопросы Вы можете адресовать на</p>
<p>khrustalev16@bk.ru</p>

