<?php

namespace App\Livewire\Admin\CopyRight;

use App\Models\CopyRight;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $title;

    public function submit($formData)
    {
        $validator = Validator::make($formData, [
            'title' => 'required|string',
        ], [
            '*.required' => 'این فیلدالزامی است.'
        ]);
        $validator->validate();

        CopyRight::query()->create($formData);
        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
    }

    public function delete($copyRight_id)
    {
        CopyRight::query()->where('id', $copyRight_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $copyRights = CopyRight::query()->paginate(10);
        return view('livewire.admin.copyRight.index', [
            'copyRights' => $copyRights
        ])->layout('layouts.admin.app');
    }
}
