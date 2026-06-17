<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Program;
use Illuminate\Support\Facades\Storage;

class ProgramManager extends Component
{
    use WithFileUploads;

    public $programs;
    
    // Form fields
    public $title;
    public $description;
    public $icon = '📖';
    public $badge_color = 'blue';
    public $sort_order = 0;
    public $image; // file input
    public $existing_image_path;

    public $selectedProgramId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'icon' => 'required|string|max:50',
        'badge_color' => 'required|string|max:50',
        'sort_order' => 'integer',
        'image' => 'nullable|image|max:2048', // 2MB
    ];

    public function mount()
    {
        $this->loadPrograms();
    }

    public function loadPrograms()
    {
        $this->programs = Program::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->title = '';
        $this->description = '';
        $this->icon = '📖';
        $this->badge_color = 'blue';
        $this->sort_order = 0;
        $this->image = null;
        $this->existing_image_path = null;
        $this->selectedProgramId = null;
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
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'badge_color' => $this->badge_color,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            $path = $this->image->store('programs', 'public');
            $data['image_path'] = 'storage/' . $path;
        } else {
            // Default placeholder if no image uploaded
            $data['image_path'] = 'https://placehold.co/600x400/1E3A8A/FFFFFF?text=' . urlencode($this->title);
        }

        Program::create($data);

        session()->flash('message', 'Program berhasil ditambahkan!');
        $this->resetFields();
        $this->loadPrograms();
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        $this->selectedProgramId = $program->id;
        $this->title = $program->title;
        $this->description = $program->description;
        $this->icon = $program->icon;
        $this->badge_color = $program->badge_color;
        $this->sort_order = $program->sort_order;
        $this->existing_image_path = $program->image_path;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $program = Program::findOrFail($this->selectedProgramId);
        
        $data = [
            'title' => $this->title,
            'description' => $this->description,
            'icon' => $this->icon,
            'badge_color' => $this->badge_color,
            'sort_order' => $this->sort_order,
        ];

        if ($this->image) {
            // Hapus gambar lama jika ada dan bukan placeholder url
            if ($program->image_path && !str_starts_with($program->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $program->image_path))) {
                Storage::disk('public')->delete(str_replace('storage/', '', $program->image_path));
            }
            
            $path = $this->image->store('programs', 'public');
            $data['image_path'] = 'storage/' . $path;
        }

        $program->update($data);

        session()->flash('message', 'Program berhasil diperbarui!');
        $this->resetFields();
        $this->loadPrograms();
    }

    public function delete($id)
    {
        $program = Program::findOrFail($id);
        
        // Hapus file gambar
        if ($program->image_path && !str_starts_with($program->image_path, 'http') && Storage::disk('public')->exists(str_replace('storage/', '', $program->image_path))) {
            Storage::disk('public')->delete(str_replace('storage/', '', $program->image_path));
        }

        $program->delete();
        session()->flash('message', 'Program berhasil dihapus!');
        $this->loadPrograms();
    }

    public function render()
    {
        return view('livewire.admin.program-manager')->layout('layouts.admin');
    }
}
