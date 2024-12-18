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
use App\Http\Controllers\resume\ResumeController;
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

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('city/{city_id}/regions', [DashboardController::class, 'regions'])->name('city.regions');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::name('user-management.')->middleware('role:administrator')->group(function () {
        Route::resource('/user-management/users', UserManagementController::class);
    });
    Route::get('resume', [ResumeController::class, 'index'])->name('resume');
    Route::resource('schools', SchoolsController::class);

    Route::get('/schools/{id}/gallery', [GalleryController::class, 'index'])->name('school.gallery');
    Route::post('/schools/gallery/store', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/{id}/remove/', [GalleryController::class, 'remove'])->name('school.remove');

    Route::resource('suppliers', SuppliersController::class);

    Route::get('/suppliers/{id}/gallery', [SupplierGalleryController::class, 'index'])->name('suppliers.gallery');
    Route::post('/suppliers/gallery/store', [SupplierGalleryController::class, 'store'])->name('suppliers.gallery.store');
    Route::get('/suppliers/gallery/{id}/remove/', [SupplierGalleryController::class, 'remove'])->name('suppliers.gallery.remove');

    Route::name('schools.')
        ->prefix('schools/{school_id}/')->group(function () {
            Route::resource('transportations', TransportationController::class)->except('show');
            Route::resource('grades', GradeController::class)->except('show');
            Route::resource('news', NewsController::class)->except('show');
        });

    Route::resource('teachers', TeacherController::class);

    Route::get('teachers/{id}/resume', [TeacherController::class, 'showResume'])->name('teacher.resume');


    Route::resource('vacancies', VacancyController::class);
    Route::get('vacancies/{vacancy}/edit', [VacancyController::class, 'edit'])->name('vacancies.edit');




    Route::resource('news', MainNewsController::class)->except('show');

    Route::resource('contacts', ContactsController::class)->only('index', 'edit', 'destroy');

    Route::resource('subscriptions', SubscriptionsController::class)->only('index', 'edit', 'destroy');
});

Route::get('/error', function () {
    abort(500);
});






Route::get('/auth/redirect/{provider}', [SocialiteController::class, 'redirect']);

require __DIR__ . '/auth.php';
