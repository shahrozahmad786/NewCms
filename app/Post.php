<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
  use SoftDeletes;
  protected $guarded=[];

  protected $dates=[

  	'published_at'
  ];




  public function category()
  {

  	 return $this->belongsTo('App\Category');
  }


  public function tags()
  {
    return $this->belongsToMany('App\Tag');	
  }
  

  public function hasTag($tagId)
  {
       return in_array($tagId,$this->tags->pluck('id')->toArray());
  }

  public function user()
  {
       return $this->belongsTo('App\User');
  }

  public function scopePublished($query)
  {
  	  	return $query->where('published_at','<=',now());
  }
}
