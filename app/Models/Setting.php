<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [
        'site_name',
        'whatsapp_number',
        'address',
        'operational_mon_fri',
        'operational_sat',
        'operational_sun',
        'instagram_url',
        'facebook_url',
        'youtube_url',
        'google_maps_embed_url',
        'google_maps_large_url',
        'founder_name',
        'founder_quote',
        'founder_bio',
        'founder_facebook_url',
        'founder_instagram_url',
        'founder_youtube_url',
        'logo_path',
        'favicon_path',
        'founder_image_path',
        'profile_title',
        'profile_description_1',
        'profile_description_2',
        'profile_feature_1',
        'profile_feature_2',
        'profile_feature_3',
        'profile_feature_4',
        'profile_image_path',
        'profile_image_caption',
    ];
}
