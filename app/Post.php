<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    use Sluggable;
    use SluggableScopeHelpers;

    protected $fillable = [
        'title', 'body', 'user_id', 'category_id', 'photo_id', 'slug'];

    public function photo(){
        return $this->belongsTo('App\Photo');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function comments(){
        return $this->hasMany('App\PostComment');
    }

    public function sluggable(){
        return ['slug' => ['source' => 'title']];
    }

}
