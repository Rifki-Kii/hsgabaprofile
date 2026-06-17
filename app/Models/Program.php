<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'icon',
        'badge_color',
        'sort_order',
    ];
}
