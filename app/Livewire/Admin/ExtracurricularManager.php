<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\Storage;

class ExtracurricularManager extends Component
{
    use WithFileUploads;

    public $ekskuls;
    
    // Form fields
    public $name;
    public $category;
    public $description;
    public $icon = '⭐';
    public $sort_order = 0;
    public $image; // file input
    public $existing_image_path;

    public $selectedEkskulId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'required|string|max:50',
        'sort_order' => 'integer',
        'image' => 'nullable|image|max:2048', // 2MB
    ];

    public function mount()
    {
        $this->loadEkskuls();
    }

    public function loadEkskuls()
    {
        $this->ekskuls = Extracurricular::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->category = '';
        $this->description = '';
        $this->icon = '⭐';
        $this->sort_order = 0;
        $this->image = null;
        $this->existing_image_path = null;
        $this->selectedEkskulId = null;
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
        $this->validate();

        $data = [
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'icon' => $this->icon,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            $path = $this->image->store('extracurriculars', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        Extracurricular::create($data);

        session()->flash('message', 'Ekstrakurikuler berhasil ditambahkan!');
        $this->resetFields();
        $this->loadEkskuls();
    }

    public function edit($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        $this->selectedEkskulId = $ekskul->id;
        $this->name = $ekskul->name;
        $this->category = $ekskul->category;
        $this->description = $ekskul->description;
        $this->icon = $ekskul->icon;
        $this->sort_order = $ekskul->sort_order;
        $this->existing_image_path = $ekskul->image_path;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $ekskul = Extracurricular::findOrFail($this->selectedEkskulId);
        
        $data = [
            'name' => $this->name,
            'category' => $this->category,
            'description' => $this->description,
            'icon' => $this->icon,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada dan bukan external/placeholder url
            if ($ekskul->image_path && !str_starts_with($ekskul->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $ekskul->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $ekskul->image_path));
            }
            
            $path = $this->image->store('extracurriculars', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $ekskul->update($data);

        session()->flash('message', 'Ekstrakurikuler berhasil diperbarui!');
        $this->resetFields();
        $this->loadEkskuls();
    }

    public function delete($id)
    {
        $ekskul = Extracurricular::findOrFail($id);
        
        // Hapus file gambar
        if ($ekskul->image_path && !str_starts_with($ekskul->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $ekskul->image_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $ekskul->image_path));
        }

        $ekskul->delete();
        session()->flash('message', 'Ekstrakurikuler berhasil dihapus!');
        $this->loadEkskuls();
    }

    public function render()
    {
        return view('livewire.admin.extracurricular-manager')->layout('layouts.admin');
    }
}
