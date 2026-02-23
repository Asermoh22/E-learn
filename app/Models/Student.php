<?php

namespace App\Models;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = [
        'user_id'
    ];

     public static function totalStudent()
    {
        return self::count();
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
}
