<?php
//класс называется как параметр гет запроса фильтра

namespace App\Models\Filters\Device;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Sort implements Filterable{

    public static function apply(Builder $builder, $value)
    {
        return $builder->where('ObjID','LIKE', "$value");

    }
}