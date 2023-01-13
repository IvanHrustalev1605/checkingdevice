<meta charset="UTF-8">
<div><b>Обратите внимание!!!</b></div>
@foreach ($DeviceAll as $device)
   @foreach ($device as $key => $el)
      @foreach ($el as $e => $k)
   ##<div>Объект: {{ $key }}, номер: {{ $e }}, название: {{ $k }}</div>
      @endforeach
   @endforeach
@endforeach




