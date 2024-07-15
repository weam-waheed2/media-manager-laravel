<?php
use App\Http\Controllers\MediaController;
use Illuminate\Support\Facades\Route;

Route::controller(MediaController::class)->group(function(){
    // Route::get('media', 'index')->name('media.index');
    Route::post('media/store', 'store')->name('media.store');
    Route::get('media/create', 'create')->name('media.create');
    Route::put('media/{id}', 'update')->name('media.update');
    Route::get('media/{id}/edit', 'edit')->name('media.edit');
    Route::post('media_crop', 'store_crop')->name('media.store_crop');
    
    Route::put('updatemedia', 'updatemedia');
    Route::get('fileedit/{id}', 'fileEdit');
    Route::get('delete/{id}', 'delete');
    Route::delete('deleteallmediaforever', 'deleteallforever');
    Route::get('form/{id}/edit', 'editAjax');
    Route::get('fileeditmedia/{id}', 'fileeditmedia');
    Route::get('fileselectmedia/{id}', 'fileselectmedia');
    Route::get('/ajax-paginate', 'ajax_paginate')->name('ajax.paginate');
    Route::get('/search', 'search');
    Route::post('image' ,'imageupload')->name('image.upload');
});
    