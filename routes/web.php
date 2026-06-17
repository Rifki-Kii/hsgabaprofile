<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Login;
use App\Livewire\Admin\Dashboard;
use App\Livewire\Admin\HeroManager;
use App\Livewire\Admin\ProgramManager;
use App\Livewire\Admin\FacilityManager;
use App\Livewire\Admin\GalleryManager;
use App\Livewire\Admin\FaqManager;
use App\Livewire\Admin\SettingManager;
use App\Models\Setting;
use App\Models\HeroSlide;
use App\Models\Program;
use App\Models\Facility;
use App\Models\GalleryItem;
use App\Models\Faq;
use Illuminate\Support\Facades\Auth;

// Main Homepage Route (Dynamic Content Loader)
Route::get('/', function () {
    $settings = Setting::first() ?? Setting::create(['id' => 1]);
    $heroSlides = HeroSlide::orderBy('sort_order')->orderBy('id')->get();
    $programs = Program::orderBy('sort_order')->orderBy('id')->get();
    $facilities = Facility::orderBy('sort_order')->orderBy('id')->get();
    $galleryItems = GalleryItem::orderBy('sort_order')->orderBy('id')->get();
    $faqs = Faq::orderBy('sort_order')->orderBy('id')->get();

    return view('pages.home', compact('settings', 'heroSlides', 'programs', 'facilities', 'galleryItems', 'faqs'));
});

// Admin Panel Routes
Route::redirect('/login', '/admin/login')->name('login');

Route::middleware('guest')->group(function () {
    Route::get('/admin/login', Login::class)->name('admin.login');
});

Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/heroes', HeroManager::class)->name('heroes');
    Route::get('/programs', ProgramManager::class)->name('programs');
    Route::get('/facilities', FacilityManager::class)->name('facilities');
    Route::get('/gallery', GalleryManager::class)->name('gallery');
    Route::get('/faqs', FaqManager::class)->name('faqs');
    Route::get('/settings', SettingManager::class)->name('settings');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect(route('admin.login'));
    })->name('logout');
});
