<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Like;

class News extends Model
{
    use HasFactory;

    protected $fillable =[
        'title',
        'content',
        'category_id',
        'publish_date',
        'is_blocked'
    ];

    public function categorieNews() {
        return $this->belongsTo(Categorie::class, 'category_id');
    }
    public function likePost() {
        return $this->hasMany(Like::class, 'news_id','id');
    }
    public function likesCount()
    {
        return $this->likePost->count();
    }
    public function commentPost() {
        return $this->hasMany(Comment::class, 'news_id','id');
    }
    public function news()
{
    return $this->hasMany(News::class);
}
}
