<?php
//класс называется как параметр гет запроса фильтра

namespace App\Models\Filters\Oders;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class Osid6 implements Filterable{

    public static function apply(Builder $builder, $value)
    {
        return $builder->where('osid','LIKE', "6");

    }
}