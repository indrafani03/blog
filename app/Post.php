<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    protected $fillable = ['judul','slug','category_id','content','gambar','deleted_at', 'users_id'];
    use SoftDeletes;

    public function category()
    {
        return $this->BelongsTo('App\Category');
    }
    public function tags(){
        return $this->belongsToMany('App\Tag');
    } 
    public function users(){
        return $this->belongsTo('App\User');
    } 
}
