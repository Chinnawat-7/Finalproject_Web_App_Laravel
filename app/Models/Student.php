<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'student_subject',
        'student_id',
        'student_name',
    ];

    public function user(){
        return $this->hasOne(User::class,'id','user_id');
    }
    

}
