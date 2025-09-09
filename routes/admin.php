<?php


use App\Livewire\Admin\Auth\Index as AdminIndex;
use App\Livewire\Admin\Cart\Index as CartIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\CopyRight\Index as CopyRightIndex;
use App\Livewire\Admin\Dashboard\Index as dashboardIndex;
use App\Livewire\Admin\FooterSection\Index as footerSectionIndex;
use App\Livewire\Admin\Header\Index as headerIndex;
use App\Livewire\Admin\Song\Index as SongIndex;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {

    Route::get('/auth', AdminIndex::class)->name('auth.login');

    Route::middleware('auth:admin')->group(function () {

        Route::get('/dashboard', dashboardIndex::class)->name('dashboard.index');
        Route::get('/cart', CartIndex::class)->name('cart.index');
        Route::get('/category', CategoryIndex::class)->name('category.index');
        Route::get('/song', SongIndex::class)->name('song.index');
        Route::get('/footerSection', footerSectionIndex::class)->name('footerSection.index');
        Route::get('/copyRight', CopyRightIndex::class)->name('copyRight.index');
        Route::get('/header', headerIndex::class)->name('header.index');

    });

});

