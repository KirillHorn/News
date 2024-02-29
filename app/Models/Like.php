<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'news_id',
    ];

    public function newsPost() {
        return $this->hasMany(News::class, 'news_id','id');
    }
}
