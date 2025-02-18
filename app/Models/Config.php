<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'config';

    protected $fillable = [
        'company_name',
        'title_seo',
        'meta_seo',
        'description_seo',
        'description',
        'phone',
        'name',
        'address',
        'email',
        'constant_hotline',
        'banner',
        'path',
        'icon',

        'footer',
        'representative'
    ];
}
