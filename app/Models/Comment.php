<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'comment_text',
        'comment_date',
        'news_id',
        'user_id',
    ];

    public function news() {
        return $this->hasMany(News::class, 'news_id','id');
    }
    public function usersComment() {
        return $this->belongsTo(User::class, 'user_id','id');
    }
}
