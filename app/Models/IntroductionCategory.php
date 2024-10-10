<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IntroductionCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'website_id'];

    public function website()
    {
        return $this->belongsTo(Website::class);
    }

    public function introductionPosts()
    {
        return $this->hasMany(IntroductionPost::class);
    }
}
