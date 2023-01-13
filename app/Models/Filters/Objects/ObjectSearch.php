<?php
namespace App\Models\Filters\Objects;

use App\Filters\BaseSearch;
use App\Filters\Searchable;
use App\Models\Objects;
use App\Models\Oders;
use App\Models\Pribori;

//базовый класс фильтрации
class ObjectSearch implements Searchable
{
    const MODEL = Objects::class;
    
    use BaseSearch;

}