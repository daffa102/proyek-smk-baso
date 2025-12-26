<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Login Register Route
Route::get('/login', function () {
    return view('livewire.auth.login');
})->name('login');


Route::get('/register', function () {
    return view('livewire.auth.register');
})->name('register');

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', function () {
        auth()->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken(); 
        return redirect('/');
    })->name('logout');

    Route::get('/dashboard', function () {
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('guru.dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', \App\Livewire\Admin\Dashboard::class)->name('dashboard');

        // Data Guru
        Route::get('/guru', \App\Livewire\Admin\DataGuru\Index::class)->name('guru.index');
        Route::get('/guru/create', \App\Livewire\Admin\DataGuru\Create::class)->name('guru.create');
        Route::get('/guru/{id}/edit', \App\Livewire\Admin\DataGuru\Edit::class)->name('guru.edit');

        // Data Kelas
        Route::get('/kelas', \App\Livewire\Admin\DataKelas\Index::class)->name('kelas.index');
        Route::get('/kelas/create', \App\Livewire\Admin\DataKelas\Create::class)->name('kelas.create');
        Route::get('/kelas/{id}/edit', \App\Livewire\Admin\DataKelas\Edit::class)->name('kelas.edit');

        // Data Mapel
        Route::get('/mapel', \App\Livewire\Admin\DataMapel\Index::class)->name('mapel.index');
        Route::get('/mapel/create', \App\Livewire\Admin\DataMapel\Create::class)->name('mapel.create');
        Route::get('/mapel/{id}/edit', \App\Livewire\Admin\DataMapel\Edit::class)->name('mapel.edit');

        // Data Murid
        Route::get('/murid', \App\Livewire\Admin\DataMurid\Index::class)->name('murid.index');
        Route::get('/murid/create', \App\Livewire\Admin\DataMurid\Create::class)->name('murid.create');
        Route::get('/murid/{id}/edit', \App\Livewire\Admin\DataMurid\Edit::class)->name('murid.edit');
    });

    Route::middleware(['role:guru'])->prefix('guru')->name('guru.')->group(function () {
        Route::get('/dashboard', \App\Livewire\Guru\Dashboard::class)->name('dashboard');
        Route::get('/profile', \App\Livewire\Guru\Profile::class)->name('profile');
    });
});
