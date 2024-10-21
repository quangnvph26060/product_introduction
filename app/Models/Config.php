<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    use HasFactory;
    protected $table = 'config';

    protected $fillable = [
        'title_seo',
        'meta_seo',
        'description_seo',
        'description',
        'name',
        'address',
        'email',
        'constant_hotline',
        'sale_phone_number',
        'zalo_phonenumber',
        'website',
        'facebook_url',
        'instagram_url',
        'youtube_url',
        'banner',
        'slider1',
        'slider2',
        'slider3',
        'footer',
        'representative'
    ];
}
