<?php
//класс называется как параметр гет запроса фильтра

namespace App\Models\Filters\Device;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class SortDateUp implements Filterable{

    public static function apply(Builder $builder, $value)
    {
       return $builder->where('nextDate','>=', "$value");          
    }
}