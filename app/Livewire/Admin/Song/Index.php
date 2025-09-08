<?php

namespace App\Livewire\Admin\Song;

use App\Models\Category;
use App\Models\Song;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use WithFileUploads;

    public $categories = [];
    public $category;
    public $title;
    public $artist;
    public $name;
    public $link;
    public $image;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function submit()
    {
        $this->validate([
            'category' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'artist' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'link' => 'required|file|mimes:mp3,wav,ogg|max:10240',
        ], [
            '*.required' => 'این فیلد الزامی است.',
            '*.string' => 'فرمت اشتباه است.',
            '*.exists' => 'دسته بندی نا معتبر است.',
        ]);

        $path = $this->link->store('songs', 'public');

        $imageName = time() . '_' . $this->image->getClientOriginalName();
        $imagePath = $this->image->storeAs('covers',$imageName, 'public');
        Song::create([
            'category_id' => $this->category,
            'title' => $this->title,
            'artist' => $this->artist,
            'name' => $this->name,
            'download_link' => $path,
            'image' => $imagePath,
        ]);

        $this->reset();
        $this->dispatch('success', 'عملیات با موفقیت انجام شد.');
    }


    public function render()
    {
        $songs = Song::query()->with('category')->paginate(10);

        return view('livewire.admin.song.index', [
            'songs' => $songs
        ])->layout('layouts.admin.app');
    }
}
