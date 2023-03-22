<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $fillable = [
        'guid',
        'title',
        'article_url',
        'pic_url',
        'pic_type',
        'categories',
        'published_at',
    ];
}
