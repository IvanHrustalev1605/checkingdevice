<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Tasks extends Model
{
    use HasFactory;
    protected $primaryKey = 'tid';

    public function Object(){
        return $this->belongsTo(Objects::class, 'ObjID');
    }
    public function user(){
        return $this->belongsTo(User::class, 'uid');
    }
    protected $fillable = [ 
        'taskName',
    ];
    public static function add($fields){
        $task = new static;
        $task->fill($fields);
        $task->uid = Auth::user()->uid;
        $task->save(); 
        return $task;
}
public function changeIsDone($value){
    If($value == 0){
        $value = 1;
       return $value;   
    }
    If($value == 1){
        $value = 0;
       return $value;   
    }
}
}
