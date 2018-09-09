<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','description','content','user_id','slug'];

    public function category(){
    	return $this->belongsTo('App\Category');
    }
    public function tags(){
    	return $this->belongsToMany('App\Tag','post_tags','post_id','tag_id');
    }
}
