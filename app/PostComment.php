<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    //
    protected $fillable = ['post_id', 'author', 'photo', 'body', 'email', 'is_active' ];

    public function replies(){
        return $this->hasMany('App\CommentReply');
    }

}
