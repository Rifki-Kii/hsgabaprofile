<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Faq;

class FaqManager extends Component
{
    public $faqs;
    public $question;
    public $answer;
    public $sort_order = 0;
    public $selectedFaqId;
    public $isEditMode = false;
    public $showModal = false;

    protected $rules = [
        'question' => 'required|string|max:255',
        'answer' => 'required|string',
        'sort_order' => 'integer',
    ];

    public function mount()
    {
        $this->loadFaqs();
    }

    public function loadFaqs()
    {
        $this->faqs = Faq::orderBy('sort_order')->orderBy('id')->get();
    }

    public function resetFields()
    {
        $this->question = '';
        $this->answer = '';
        $this->sort_order = 0;
        $this->selectedFaqId = null;
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

        Faq::create([
            'question' => $this->question,
            'answer' => $this->answer,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'FAQ berhasil ditambahkan!');
        $this->resetFields();
        $this->loadFaqs();
    }

    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        $this->selectedFaqId = $faq->id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->sort_order = $faq->sort_order;
        $this->isEditMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        $faq = Faq::findOrFail($this->selectedFaqId);
        $faq->update([
            'question' => $this->question,
            'answer' => $this->answer,
            'sort_order' => $this->sort_order,
        ]);

        session()->flash('message', 'FAQ berhasil diperbarui!');
        $this->resetFields();
        $this->loadFaqs();
    }

    public function delete($id)
    {
        Faq::findOrFail($id)->delete();
        session()->flash('message', 'FAQ berhasil dihapus!');
        $this->loadFaqs();
    }

    public function render()
    {
        return view('livewire.admin.faq-manager')->layout('layouts.admin');
    }
}
