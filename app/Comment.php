<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Student;
class Comment extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    protected $fillable = [
        'comment','user_id','student_id',
    ];
}
