<?php
namespace App\Filters;


use Illuminate\Database\Eloquent\Builder;

interface Filterable
{
    public static function apply(Builder $builder, $value);
}