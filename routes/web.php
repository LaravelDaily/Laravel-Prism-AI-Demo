<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\CreatePost;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts/create', CreatePost::class)->name('posts.create');
