<?php

use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\Auth\SocialiteController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MainNewsController;
use App\Http\Controllers\Schools\GalleryController;
use App\Http\Controllers\Schools\GradeController;
use App\Http\Controllers\Schools\NewsController;
use App\Http\Controllers\Schools\SchoolsController;
use App\Http\Controllers\Schools\TransportationController;
use App\Http\Controllers\SubscriptionsController;
use App\Http\Controllers\Suppliers\SupplierGalleryController;
use App\Http\Controllers\Suppliers\SuppliersController;
use App\Http\Controllers\Job\TeacherController;
use App\Http\Controllers\Job\VacancyController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard Routes
    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('city/{city_id}/regions', [DashboardController::class, 'regions'])->name('city.regions');

    // User Management Routes
    Route::name('user-management.')
        ->middleware('role:administrator')
        ->group(function () {
            Route::resource('/user-management/users', UserManagementController::class);
        });

    // Schools Routes
    Route::resource('schools', SchoolsController::class);
    Route::get('/schools/{id}/gallery', [GalleryController::class, 'index'])->name('school.gallery');
    Route::post('/schools/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/remove/', [GalleryController::class, 'remove'])->name('school.remove');

    Route::name('schools.')
        ->prefix('schools/{school_id}')
        ->group(function () {
            Route::resource('transportations', TransportationController::class)->except('show');
            Route::resource('grades', GradeController::class)->except('show');
            Route::resource('news', NewsController::class)->except('show');
        });

    // Suppliers Routes
    Route::resource('suppliers', SuppliersController::class);
    Route::get('/suppliers/{id}/gallery', [SupplierGalleryController::class, 'index'])->name('suppliers.gallery');
    Route::post('/suppliers/gallery/store', [SupplierGalleryController::class, 'store'])->name('suppliers.gallery.store');
    Route::get('/suppliers/gallery/{id}/remove/', [SupplierGalleryController::class, 'remove'])->name('suppliers.gallery.remove');

    // Teachers Routes
    Route::resource('teachers', TeacherController::class);
    Route::get('teachers/{id}/resume', [TeacherController::class, 'showResume'])->name('teacher.resume');

    // Vacancies Routes
    Route::resource('vacancies', VacancyController::class);
    Route::get('vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');

    // News Routes
    Route::resource('news', MainNewsController::class)->except('show');

    // Contacts Routes
    Route::resource('contacts', ContactsController::class)->only('index', 'edit', 'destroy');

    // Subscriptions Routes
    Route::resource('subscriptions', SubscriptionsController::class)->only('index', 'edit', 'destroy');
});

// Error Route
Route::get('/error', function () {
    abort(500);
});

// Socialite Authentication
Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

// Authentication Routes
require __DIR__ . '/auth.php';
