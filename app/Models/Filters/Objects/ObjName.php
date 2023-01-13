<?php
//класс называется как параметр гет запроса фильтра

namespace App\Models\Filters\Objects;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class ObjName implements Filterable{

    public static function apply(Builder $builder, $value)
    {   
            return $builder->where('ObjName', 'LIKE', "%$value%");
    }
}