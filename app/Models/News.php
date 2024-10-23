<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'status', 'image', 'news_category_id'];
    public function newsCategory()
    {
        return $this->belongsTo(NewsCategory::class);
    }
}
