<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = ['body'];
    
    public function topic()
    {
    	return $this->belongsTo('App\Topic');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

}
