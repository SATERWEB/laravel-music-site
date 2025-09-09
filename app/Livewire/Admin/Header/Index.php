<?php

namespace App\Livewire\Admin\Header;

use App\Models\Header;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $title;
    public $image;

    public function submit($formData)
    {
        $formData['image'] = $this->image;

        $validator = Validator::make($formData, [
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            '*.required' => 'این فیلد الزامی است  ',
            'image.image' => 'فرمت ناهعتبر است ',
        ]);
        $validator->validate();


        $imageName = time() . '_' . $this->image->getClientOriginalName();
        $imagePath = $this->image->storeAs('header-image', $imageName, 'public');

        Header::query()->create([
            'title' => $this->title,
            'image' => $imagePath,
        ]);

        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
    }

    public function delete($header_id)
    {
        Header::query()->where('id', $header_id)->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد');
    }

    public function render()
    {
        $headers = Header::query()->paginate(10);
        return view('livewire.admin.header.index', [
            'headers' => $headers
        ])->layout('layouts.admin.app');
    }
}
