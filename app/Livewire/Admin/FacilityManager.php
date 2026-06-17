<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Facility;
use Illuminate\Support\Facades\Storage;

class FacilityManager extends Component
{
    use WithFileUploads;

    public $facilities;
    
    // Form fields
    public $title;
    public $description;
    public $icon = 'fas fa-building';
    public $sort_order = 0;
    public $image; // file input
    public $existing_image_path;

    public $selectedFacilityId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'required|string|max:50',
        'sort_order' => 'integer',
        'image' => 'nullable|image|max:2048', // 2MB
    ];

    public function mount()
    {
        $this->loadFacilities();
    }

    public function loadFacilities()
    {
        $this->facilities = Facility::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->icon = 'fas fa-building';
        $this->sort_order = 0;
        $this->image = null;
        $this->existing_image_path = null;
        $this->selectedFacilityId = null;
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

        $path = $this->image->store('facilities', 'public');

        Facility::create([
            'image_path' => 'storage/' . $path,
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'Fasilitas berhasil ditambahkan!');
        $this->resetFields();
        $this->loadFacilities();
    }

    public function edit($id)
    {
        $fac = Facility::findOrFail($id);
        $this->selectedFacilityId = $fac->id;
        $this->title = $fac->title;
        $this->description = $fac->description;
        $this->icon = $fac->icon;
        $this->sort_order = $fac->sort_order;
        $this->existing_image_path = $fac->image_path;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $fac = Facility::findOrFail($this->selectedFacilityId);
        
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada dan bukan placeholder url
            if ($fac->image_path && !str_starts_with($fac->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $fac->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $fac->image_path));
            }
            
            $path = $this->image->store('facilities', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $fac->update($data);

        session()->flash('message', 'Fasilitas berhasil diperbarui!');
        $this->resetFields();
        $this->loadFacilities();
    }

    public function delete($id)
    {
        $fac = Facility::findOrFail($id);
        
        // Hapus file gambar
        if ($fac->image_path && !str_starts_with($fac->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $fac->image_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $fac->image_path));
        }

        $fac->delete();
        session()->flash('message', 'Fasilitas berhasil dihapus!');
        $this->loadFacilities();
    }

    public function render()
    {
        return view('livewire.admin.facility-manager')->layout('layouts.admin');
    }
}
