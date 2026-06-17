<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\AcademicSubject;

class AcademicSubjectManager extends Component
{
    public $subjects;
    
    // Form fields
    public $name;
    public $icon = 'fas fa-book';
    public $focus;
    public $description;
    public $sort_order = 0;
    
    public $selectedSubjectId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'icon' => 'required|string|max:255',
        'focus' => 'required|string|max:255',
        'description' => 'required|string',
        'sort_order' => 'integer',
    ];

    public function mount()
    {
        $this->loadSubjects();
    }

    public function loadSubjects()
    {
        $this->subjects = AcademicSubject::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->name = '';
        $this->icon = 'fas fa-book';
        $this->focus = '';
        $this->description = '';
        $this->sort_order = 0;
        $this->selectedSubjectId = null;
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

        AcademicSubject::create([
            'name' => $this->name,
            'icon' => $this->icon,
            'focus' => $this->focus,
            'description' => $this->description,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'Pelajaran akademik berhasil ditambahkan!');
        $this->resetFields();
        $this->loadSubjects();
    }

    public function edit($id)
    {
        $subject = AcademicSubject::findOrFail($id);
        $this->selectedSubjectId = $subject->id;
        $this->name = $subject->name;
        $this->icon = $subject->icon;
        $this->focus = $subject->focus;
        $this->description = $subject->description;
        $this->sort_order = $subject->sort_order;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $subject = AcademicSubject::findOrFail($this->selectedSubjectId);
        $subject->update([
            'name' => $this->name,
            'icon' => $this->icon,
            'focus' => $this->focus,
            'description' => $this->description,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'Pelajaran akademik berhasil diperbarui!');
        $this->resetFields();
        $this->loadSubjects();
    }

    public function delete($id)
    {
        AcademicSubject::findOrFail($id)->delete();
        session()->flash('message', 'Pelajaran akademik berhasil dihapus!');
        $this->loadSubjects();
    }

    public function render()
    {
        return view('livewire.admin.academic-subject-manager')->layout('layouts.admin');
    }
}
