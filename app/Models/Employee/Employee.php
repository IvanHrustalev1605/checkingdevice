<?php

namespace App\Models\Employee;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Employee extends  Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'eid';
    protected $guard = 'employee';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public static function add($fields){
        $employee = new static;
        $employee->fill($fields);
        $employee->save(); 
        return $employee;
}
public function edit($fields){
        $this->fill($fields);
        $this->save();
}
public function remove(){
    $this->delete();
}
public function GeneratePassword($password){
    If ($password !== null){
        $this->password = bcrypt($password);
        $this->save();
    }
}
}
