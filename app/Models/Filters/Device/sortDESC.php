<?php
//класс называется как параметр гет запроса фильтра

namespace App\Models\Filters\Device;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class sortDESC implements Filterable{

    public static function apply(Builder $builder, $value)
    {
        return $builder->orderBy('nextDate', 'DESC');

    }
}