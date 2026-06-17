<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\HeroSlide;
use App\Models\Program;
use App\Models\Facility;
use App\Models\GalleryItem;
use App\Models\Faq;

class Dashboard extends Component
{
    public function render()
    {
        $stats = [
            'heroes' => HeroSlide::count(),
            'programs' => Program::count(),
            'facilities' => Facility::count(),
            'gallery' => GalleryItem::count(),
            'faqs' => Faq::count(),
        ];

        return view('livewire.admin.dashboard', compact('stats'))->layout('layouts.admin');
    }
}
