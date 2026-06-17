<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\GalleryItem;
use Illuminate\Support\Facades\Storage;

class GalleryManager extends Component
{
    use WithFileUploads;

    public $galleryItems;
    
    // Form fields
    public $title;
    public $description;
    public $sort_order = 0;
    public $image; // file input
    public $existing_image_path;

    public $selectedItemId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'sort_order' => 'integer',
        'image' => 'nullable|image|max:2048', // 2MB
    ];

    public function mount()
    {
        $this->loadItems();
    }

    public function loadItems()
    {
        $this->galleryItems = GalleryItem::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->sort_order = 0;
        $this->image = null;
        $this->existing_image_path = null;
        $this->selectedItemId = null;
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

        $path = $this->image->store('gallery', 'public');

        GalleryItem::create([
            'image_path' => 'storage/' . $path,
            'title' => $this->title,
            'description' => $this->description,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'Foto momen galeri berhasil ditambahkan!');
        $this->resetFields();
        $this->loadItems();
    }

    public function edit($id)
    {
        $item = GalleryItem::findOrFail($id);
        $this->selectedItemId = $item->id;
        $this->title = $item->title;
        $this->description = $item->description;
        $this->sort_order = $item->sort_order;
        $this->existing_image_path = $item->image_path;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $item = GalleryItem::findOrFail($this->selectedItemId);
        
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada dan bukan placeholder url
            if ($item->image_path && !str_starts_with($item->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $item->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $item->image_path));
            }
            
            $path = $this->image->store('gallery', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $item->update($data);

        session()->flash('message', 'Foto momen galeri berhasil diperbarui!');
        $this->resetFields();
        $this->loadItems();
    }

    public function delete($id)
    {
        $item = GalleryItem::findOrFail($id);
        
        // Hapus file gambar
        if ($item->image_path && !str_starts_with($item->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $item->image_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $item->image_path));
        }

        $item->delete();
        session()->flash('message', 'Foto momen galeri berhasil dihapus!');
        $this->loadItems();
    }

    public function render()
    {
        return view('livewire.admin.gallery-manager')->layout('layouts.admin');
    }
}
