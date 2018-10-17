<?php

namespace Modules\Article\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $fillable = ['title','category_id','author','content','thumb','click','is_top'];

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
