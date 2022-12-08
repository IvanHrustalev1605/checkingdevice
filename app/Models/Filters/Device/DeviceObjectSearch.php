<?php
namespace App\Models\Filters\Device;

use App\Filters\BaseSearch;
use App\Filters\Searchable;
use App\Models\Pribori;

//базовый класс фильтрации
class DeviceObjectSearch implements Searchable
{
    const MODEL = Pribori::class;
    
    use BaseSearch;

}