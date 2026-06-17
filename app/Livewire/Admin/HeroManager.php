<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\HeroSlide;
use Illuminate\Support\Facades\Storage;

class HeroManager extends Component
{
    use WithFileUploads;

    public $slides;
    
    // Form fields
    public $title;
    public $subtitle;
    public $welcome_tag;
    public $button_text;
    public $button_url;
    public $sort_order = 0;
    public $image; // file input
    public $existing_image_path;

    public $selectedSlideId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'subtitle' => 'nullable|string|max:255',
        'welcome_tag' => 'nullable|string|max:255',
        'button_text' => 'nullable|string|max:255',
        'button_url' => 'nullable|string|max:255',
        'sort_order' => 'integer',
        'image' => 'nullable|image|max:2048', // 2MB
    ];

    public function mount()
    {
        $this->loadSlides();
    }

    public function loadSlides()
    {
        $this->slides = HeroSlide::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->subtitle = '';
        $this->welcome_tag = '';
        $this->button_text = '';
        $this->button_url = '';
        $this->sort_order = 0;
        $this->image = null;
        $this->existing_image_path = null;
        $this->selectedSlideId = null;
        $this->isEditMode = false;
        $this->showModal = false;
    }

    public function openCreateModal()
    {
        $this->resetFields();
        $this->showModal = true;
    }

    public function store()
    {
        $this->validate(array_merge($this->rules, [
            'image' => 'required|image|max:2048'
        ]));

        $path = $this->image->store('hero', 'public');

        HeroSlide::create([
            'image_path' => 'storage/' . $path,
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'welcome_tag' => $this->welcome_tag,
            'button_text' => $this->button_text,
            'button_url' => $this->button_url,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'Slide Hero berhasil ditambahkan!');
        $this->resetFields();
        $this->loadSlides();
    }

    public function edit($id)
    {
        $slide = HeroSlide::findOrFail($id);
        $this->selectedSlideId = $slide->id;
        $this->title = $slide->title;
        $this->subtitle = $slide->subtitle;
        $this->welcome_tag = $slide->welcome_tag;
        $this->button_text = $slide->button_text;
        $this->button_url = $slide->button_url;
        $this->sort_order = $slide->sort_order;
        $this->existing_image_path = $slide->image_path;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $slide = HeroSlide::findOrFail($this->selectedSlideId);
        
        $data = [
            'title' => $this->title,
            'subtitle' => $this->subtitle,
            'welcome_tag' => $this->welcome_tag,
            'button_text' => $this->button_text,
            'button_url' => $this->button_url,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada
            if ($slide->image_path && Storage::disk('public')->exists(str_replace('storage/', '', $slide->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $slide->image_path));
            }
            
            $path = $this->image->store('hero', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $slide->update($data);

        session()->flash('message', 'Slide Hero berhasil diperbarui!');
        $this->resetFields();
        $this->loadSlides();
    }

    public function delete($id)
    {
        $slide = HeroSlide::findOrFail($id);
        
        // Hapus file gambar
        if ($slide->image_path && Storage::disk('public')->exists(str_replace('storage/', '', $slide->image_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $slide->image_path));
        }

        $slide->delete();
        session()->flash('message', 'Slide Hero berhasil dihapus!');
        $this->loadSlides();
    }

    public function render()
    {
        return view('livewire.admin.hero-manager')->layout('layouts.admin');
    }
}
