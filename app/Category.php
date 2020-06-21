<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name','slug'];
    protected $table = 'Category';
    public function posts(){
        return $this->hasMany('App\Post');
    }
    public function getRouteKeyName()
   {
    return 'slug';
   }
}
