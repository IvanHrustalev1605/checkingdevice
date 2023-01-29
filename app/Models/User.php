<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Emergency;
use App\Models\Tasks;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $primaryKey = 'uid';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'password',
        'orgid',
        'name',
        'surname',
        'post',
        'mobile'
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
    public function organisation(){
        return $this->belongsTo(Organisation::class, 'orgid');
    }
    public function GetEmergency(){
        return $this->hasOne(Emergency::class, 'eid');
    }
    public function oders(){
        return $this->hasMany(Oders::class, 'odid');
    }
    public function device(){
        return $this->hasMany(Pribori::class, 'pid');
    }
    public function Tasks(){
        return $this->hasOne(Tasks::class, 'tid');
    }
    public static function add($fields){
        $user = new static;
        $user->fill($fields);
        $user->save(); 
        return $user;
}
public function edit($fields){
        $this->fill($fields);
        $this->save();
}
public function GeneratePassword($password){
    If ($password !== null){
        $this->password = bcrypt($password);
        $this->save();
    }
}
public function GetAvatar($value){
    $url = Storage::url($value);
    return $url;
}
}
