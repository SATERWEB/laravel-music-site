<?php


use App\Livewire\Admin\Dashboard\Index as dashboardIndex;
use Illuminate\Support\Facades\Route;

Route::name('admin.')->group(function () {

    Route::get('/dashboard', dashboardIndex::class)->name('dashboard.index');

});

