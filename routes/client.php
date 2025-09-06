<?php


use App\Livewire\Client\Home\Index as HomeIndex;
use Illuminate\Support\Facades\Route;

Route::name('client.')->group(function () {

    Route::get('/home', HomeIndex::class)->name('home.index');

});

