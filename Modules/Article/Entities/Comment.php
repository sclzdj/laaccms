<?php

namespace Modules\Article\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id','content_id','content'];
    
    public function content(){
        return $this->belongsTo(Content::class);
    }
    
    public function user(){
        return $this->belongsTo(User::class);
    }
}
