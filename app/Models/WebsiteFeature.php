<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteFeature extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'icon_image', 'description', 'status'];
    public static function rules($id = null)
    {
        return [
            'name' => 'required|string|max:255',
            'icon_image' => 'nullable|string|max:255',
            'description' => 'required|string',
            'status' => 'required|in:active,inactive'
        ];
    }
}
