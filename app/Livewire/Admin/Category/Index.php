<?php

namespace App\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $name;

    public function submit($formData)
    {
        $validator = Validator::make($formData, [
            'name' => 'required|string',
        ], [
            '*.required' => 'این فیلدالزامی است.'
        ]);
        $validator->validate();

        Category::query()->create($formData);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
    }

    public function delete($category_id)
    {
        Category::query()->where('id', $category_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $categories = Category::query()->paginate(10);
        return view('livewire.admin.category.index', [
            'categories' => $categories
        ])->layout('layouts.admin.app');
    }
}
