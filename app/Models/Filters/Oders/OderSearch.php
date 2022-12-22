<?php
namespace App\Models\Filters\Oders;

use App\Filters\BaseSearch;
use App\Filters\Searchable;
use App\Models\Oders;
use App\Models\Pribori;

//базовый класс фильтрации
class OderSearch implements Searchable
{
    const MODEL = Oders::class;
    
    use BaseSearch;

}