<?php
//класс называется как параметр гет запроса фильтра

namespace App\Models\Filters\Oders;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Builder;

class PaidFor implements Filterable{

    public static function apply(Builder $builder, $value)
    {
        return $builder->where('paidfor','LIKE', "0");

    }
}