<?php


use App\Livewire\Admin\Cart\Index as CartIndex;
use App\Livewire\Admin\Category\Index as CategoryIndex;
use App\Livewire\Admin\Dashboard\Index as dashboardIndex;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {

    Route::get('/dashboard', dashboardIndex::class)->name('dashboard.index');
    Route::get('/cart', CartIndex::class)->name('cart.index');
    Route::get('/category', CategoryIndex::class)->name('category.index');

});

