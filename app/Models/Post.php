<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iluminate\Support\Str;

class Post extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['title','slug','body','author_id','category_id','status','thumbnail'];    

    protected static function boot(){
        parent::boot();

        static::saving(function($post){
            if(empty($post->slug) || $post->isDirty('title')){
                $post->slug = \Str::slug($post->title);
            }
        });

        static::creating(function($post){
            $post->author_id = Auth::id();
        });
    }

    public function categories(){
        return $this->belongsTo(Category::class);
    }   

    public function author(){
        return $this->belongsTo(User::class);
    }
}
