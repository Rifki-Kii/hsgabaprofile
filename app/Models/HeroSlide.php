<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
    protected $fillable = [
        'image_path',
        'title',
        'subtitle',
        'welcome_tag',
        'button_text',
        'button_url',
        'sort_order',
    ];
}
