<meta charset="UTF-8">
<div><b>Обратите внимание!!!</b></div>
@foreach ($DeviceAll as $device)
   @foreach ($device as $key => $el)
      @foreach ($el as $e => $k)
     ## <div><p><b>Объект:</b> <u>{{ $key }}</u>, <b>номер:</b> <u>{{ $e }}</u>, <b>название:</b> <u>{{ $k }}</u></p></div>##
      @endforeach
   @endforeach
@endforeach

<p>"Это письмо создано автоматически и не требует ответа"</p>
<p>Все интересующие вопросы Вы можете адресовать на</p>
<p>khrustalev16@bk.ru</p>


