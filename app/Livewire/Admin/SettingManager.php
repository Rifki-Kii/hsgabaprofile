<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Setting;
use Illuminate\Support\Facades\Storage;

class SettingManager extends Component
{
    use WithFileUploads;

    public $setting;
    
    // Form variables
    public $site_name;
    public $whatsapp_number;
    public $address;
    public $operational_mon_fri;
    public $operational_sat;
    public $operational_sun;
    public $instagram_url;
    public $facebook_url;
    public $youtube_url;
    public $google_maps_embed_url;
    public $google_maps_large_url;

    // Founder
    public $founder_name;
    public $founder_quote;
    public $founder_bio;
    public $founder_facebook_url;
    public $founder_instagram_url;
    public $founder_youtube_url;
    public $new_founder_image;
    public $founder_image_path;

    // Profile
    public $profile_title;
    public $profile_description_1;
    public $profile_description_2;
    public $profile_feature_1;
    public $profile_feature_2;
    public $profile_feature_3;
    public $profile_feature_4;
    public $new_profile_image;
    public $profile_image_path;
    public $profile_image_caption;

    protected $rules = [
        'site_name' => 'required|string|max:255',
        'whatsapp_number' => 'required|string',
        'address' => 'required|string',
        'operational_mon_fri' => 'required|string',
        'operational_sat' => 'required|string',
        'operational_sun' => 'required|string',
        'instagram_url' => 'nullable|url',
        'facebook_url' => 'nullable|url',
        'youtube_url' => 'nullable|url',
        'google_maps_embed_url' => 'nullable|string',
        'google_maps_large_url' => 'nullable|url',
        
        'founder_name' => 'nullable|string|max:255',
        'founder_quote' => 'nullable|string',
        'founder_bio' => 'nullable|string',
        'founder_facebook_url' => 'nullable|url',
        'founder_instagram_url' => 'nullable|url',
        'founder_youtube_url' => 'nullable|url',
        'new_founder_image' => 'nullable|image|max:2048', // Max 2MB

        'profile_title' => 'nullable|string|max:255',
        'profile_description_1' => 'nullable|string',
        'profile_description_2' => 'nullable|string',
        'profile_feature_1' => 'nullable|string|max:255',
        'profile_feature_2' => 'nullable|string|max:255',
        'profile_feature_3' => 'nullable|string|max:255',
        'profile_feature_4' => 'nullable|string|max:255',
        'new_profile_image' => 'nullable|image|max:2048', // Max 2MB
        'profile_image_caption' => 'nullable|string|max:255',
    ];

    public function mount()
    {
        $this->setting = Setting::first() ?? Setting::create(['id' => 1]);
        
        $this->site_name = $this->setting->site_name;
        $this->whatsapp_number = $this->setting->whatsapp_number;
        $this->address = $this->setting->address;
        $this->operational_mon_fri = $this->setting->operational_mon_fri;
        $this->operational_sat = $this->setting->operational_sat;
        $this->operational_sun = $this->setting->operational_sun;
        $this->instagram_url = $this->setting->instagram_url;
        $this->facebook_url = $this->setting->facebook_url;
        $this->youtube_url = $this->setting->youtube_url;
        $this->google_maps_embed_url = $this->setting->google_maps_embed_url;
        $this->google_maps_large_url = $this->setting->google_maps_large_url;

        $this->founder_name = $this->setting->founder_name;
        $this->founder_quote = $this->setting->founder_quote;
        $this->founder_bio = $this->setting->founder_bio;
        $this->founder_facebook_url = $this->setting->founder_facebook_url;
        $this->founder_instagram_url = $this->setting->founder_instagram_url;
        $this->founder_youtube_url = $this->setting->founder_youtube_url;
        $this->founder_image_path = $this->setting->founder_image_path;

        $this->profile_title = $this->setting->profile_title;
        $this->profile_description_1 = $this->setting->profile_description_1;
        $this->profile_description_2 = $this->setting->profile_description_2;
        $this->profile_feature_1 = $this->setting->profile_feature_1;
        $this->profile_feature_2 = $this->setting->profile_feature_2;
        $this->profile_feature_3 = $this->setting->profile_feature_3;
        $this->profile_feature_4 = $this->setting->profile_feature_4;
        $this->profile_image_path = $this->setting->profile_image_path;
        $this->profile_image_caption = $this->setting->profile_image_caption;
    }

    public function save()
    {
        $this->validate();

        $data = [
            'site_name' => $this->site_name,
            'whatsapp_number' => $this->whatsapp_number,
            'address' => $this->address,
            'operational_mon_fri' => $this->operational_mon_fri,
            'operational_sat' => $this->operational_sat,
            'operational_sun' => $this->operational_sun,
            'instagram_url' => $this->instagram_url,
            'facebook_url' => $this->facebook_url,
            'youtube_url' => $this->youtube_url,
            'google_maps_embed_url' => $this->google_maps_embed_url,
            'google_maps_large_url' => $this->google_maps_large_url,
            
            'founder_name' => $this->founder_name,
            'founder_quote' => $this->founder_quote,
            'founder_bio' => $this->founder_bio,
            'founder_facebook_url' => $this->founder_facebook_url,
            'founder_instagram_url' => $this->founder_instagram_url,
            'founder_youtube_url' => $this->founder_youtube_url,

            'profile_title' => $this->profile_title,
            'profile_description_1' => $this->profile_description_1,
            'profile_description_2' => $this->profile_description_2,
            'profile_feature_1' => $this->profile_feature_1,
            'profile_feature_2' => $this->profile_feature_2,
            'profile_feature_3' => $this->profile_feature_3,
            'profile_feature_4' => $this->profile_feature_4,
            'profile_image_caption' => $this->profile_image_caption,
        ];

        if ($this->new_founder_image) {
            // Hapus gambar lama jika ada
            if ($this->setting->founder_image_path && !str_starts_with($this->setting->founder_image_path, 'assets') && Storage::disk('public')->exists(str_replace('storage/', '', $this->setting->founder_image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $this->setting->founder_image_path));
            }
            
            $path = $this->new_founder_image->store('settings', 'public');
            $data['founder_image_path'] = 'storage/' . $path;
            $this->founder_image_path = 'storage/' . $path;
            $this->new_founder_image = null;
        }

        if ($this->new_profile_image) {
            // Hapus gambar lama jika ada
            if ($this->setting->profile_image_path && !str_starts_with($this->setting->profile_image_path, 'assets') && Storage::disk('public')->exists(str_replace('storage/', '', $this->setting->profile_image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $this->setting->profile_image_path));
            }
            
            $path = $this->new_profile_image->store('settings', 'public');
            $data['profile_image_path'] = 'storage/' . $path;
            $this->profile_image_path = 'storage/' . $path;
            $this->new_profile_image = null;
        }

        $this->setting->update($data);

        session()->flash('message', 'Pengaturan website berhasil diperbarui!');
    }

    public function render()
    {
        return view('livewire.admin.setting-manager')->layout('layouts.admin');
    }
}
