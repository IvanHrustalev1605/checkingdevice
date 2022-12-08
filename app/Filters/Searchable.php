<?php

namespace App\Filters;

use Illuminate\Http\Request;

//для базовых классов фильтрации
interface Searchable{
//применяет фильтры классов для определенной модели
    public function apply(Request $request);


}