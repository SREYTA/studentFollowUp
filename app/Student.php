<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
class Student extends Model
{
    public function user(){
        return $this->belongsTo('User::class');
    }

    public function users(){
        return $this->belongsToMany('Student::class')->withPivot('comment');
    }

    public function comments(){
        return $this->hasMany('App\Comment'); 
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstname','lastname', 'class', 'description','picture','activeFolloup','user_id',
    ];
}
