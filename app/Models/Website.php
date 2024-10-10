<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Website extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description'];

    public function introductionCategories()
    {
        return $this->hasMany(IntroductionCategory::class);
    }
}
