<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    use HasFactory;
    protected $fillable = ['logo', 'icon', 'title', 'address', 'phone', 'section_1', 'section_2', 'section_3', 'section_4'];
    
    protected $table = 'general_settings';
}
