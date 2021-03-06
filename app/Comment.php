<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
