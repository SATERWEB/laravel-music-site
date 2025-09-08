<?php

namespace App\Livewire\Admin\Cart;

use App\Models\Cart;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $name;
    public $title;
    public $image;
    public $photo;


    public function submit()
    {

        $formData = [
            'name' => $this->name,
            'title' => $this->title,
            'image' => $this->photo,
        ];

        $formData['photo'] = $this->photo;

        $validator = Validator::make($formData, [
            'name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'image' => 'required|image|mimes:png,jpg,webp,jpeg',
        ], [
            '*.required' => 'این فیلد الزامی است ',
            '*.string' => 'فرمت اشتباه است',
            'image.mimes' => 'png,webp,jpg,jpeg:فرمت های مجاز تصویر',
            'image.image' => ' فرمت نامعتبراست'
        ]);

        $validator->validate();

        $imageName = time() . '_' . $this->photo->getClientOriginalName();
        $photoPath = $this->photo->storeAs('carts', $imageName, 'public');

        Cart::query()->create([
            'name' => $this->name,
            'title' => $this->title,
            'image' => $photoPath,
        ]);

        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
        return redirect()->route('admin.cart.list.index');
    }

    public function changeStatus(Cart $cart)
    {
        if ($cart->status) {
            $cart->update(['status' => false]);
        } else {
            $cart->update(['status' => true]);
        }
        $this->dispatch('success', 'عملیات با موفقیت انجام شد');
    }

    public function delete(Cart $cart)
    {
        $image = $cart->image;
        File::delete('carts/' . $image);
        $cart->delete();
        $this->dispatch('success', 'عملیات حذف با موفقیت انجام شد');

    }

    public function render()
    {
        $carts = Cart::query()->paginate(1);
        return view('livewire.admin.cart.index', [
            'carts' => $carts
        ])->layout('layouts.admin.app');
    }
}
