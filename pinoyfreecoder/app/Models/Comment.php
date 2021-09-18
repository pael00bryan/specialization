<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['comment','user_id','post_id'];
    protected $dates = ['created_at', 'updated_at'];

    public function comment(){
        return $this->hasMany(Comment::class);
    }

    
}
