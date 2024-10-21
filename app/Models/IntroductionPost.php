<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionPost extends Model
{
    use HasFactory;
    protected $fillable = ['introduction_category_id', 'title', 'content', 'image', 'status'];

    public function introductionCategory()
    {
        return $this->belongsTo(IntroductionCategory::class,'introduction_category_id');
    }
}
