<?php

namespace App;
use App\Traits\Orderable;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    //
    use Orderable;
    
    protected $fillable = ['title'];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function posts()
    {
    	return $this->hasMany('App\Post');
    }
}
