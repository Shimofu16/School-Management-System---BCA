<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\UsersController;

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

/* ============================== Home Page ================================ */

Route::middleware(['middleware' => 'PreventBackMiddleware'])->group(function () {
    Auth::routes();
});
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/about us', 'HomeController@about')->name('about.index');
Route::get('/academics', 'HomeController@academics')->name('academics.index');
Route::get('/calendar', 'HomeController@calendar')->name('calendar.index');
Route::get('/enroll', 'HomeController@enroll')->name('enroll.index');
Route::post('/enroll', 'HomeController@store')->name('enroll.store');
/* ============================== Portal ================================ */
Route::group(['prefix' => 'portal'], function () {
    Route::get('/', 'HomeController@portal')->name('portal.index');
    Route::get('/admin', 'AdminLoginController@index')->name('admin.login.index');
    Route::post('/admin', 'AdminLoginController@login')->name('admin.login');
    Route::post('/logout', 'Auth\LoginController@logout')->name('logout');
});
/* ============================== Student ================================ */
Route::group(['prefix' => 'student', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard.index');
});
/* ============================== Teacher ================================ */
Route::group(['prefix' => 'teacher', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard.index');
});



/* ============================== Admin ================================ */
Route::group(['prefix' => 'admin', 'middleware' => ['auth','isAdmin']], function () {
    Route::get('/dashboard',  [AdminController::class, 'index'])->name('admin.dashboard.index');
    /* users */
    Route::get('/user', [UsersController::class, 'index'])->name('users.index');
});


/* ============================== Registrar ================================ */
Route::group(['prefix' => 'registrar', 'middleware' => ['auth','isRegistrar']], function () {
    /* Dashboard */
    Route::get('/dashboard', 'RegistrarDashboardController@index')->name('registrar.dashboard.index');
    /* registrar|student */
    //Enrollee
    Route::get('/students/create', 'EnrolledStudentController@create')->name('enrollees.create');
    Route::post('/students', 'EnrolledStudentController@store')->name('enrollees.store');
    Route::get('/students/enrollee', 'EnrolleesController@index')->name('enrollees.index');
    //Enrolled
    Route::get('/students/enrollee/{id}', 'EnrolleesController@show')->name('enrollees.show');
    Route::get('/students/enrolled', 'EnrolledStudentController@index')->name('enrolled.index');
    Route::get('/students/enrolled/{id}', 'EnrolledStudentController@show')->name('enrolled.show');
    Route::put('/students/enrollee/{id}', 'EnrolledStudentController@update')->name('enrolled.update');
    /* Registrar|teacher */
    Route::get('/teachers', 'RTeachersController@index')->name('teachers.index');
    Route::get('/teachers/create', 'RTeachersController@create')->name('teachers.create');
    Route::post('/teachers', 'RTeachersController@store')->name('teachers.store');
    Route::get('/teachers/{id}/edit', 'RTeachersController@edit')->name('teachers.edit');
    Route::put('/teachers/{id}', 'RTeachersController@update')->name('teachers.update');
    /* Registrar|section */
    Route::get('/sections', 'RSectionsController@index')->name('section.index');
    Route::get('/sections/{id}', 'RSectionsController@show')->name('section.show');
    Route::post('/sections', 'RSectionsController@store')->name('section.store');
    Route::put('/section/{id}', 'RSectionsController@update')->name('section.update');
    Route::delete('/sections/{id}', 'RSectionsController@destroy')->name('section.destroy');
    /* Registrar|subject */
    Route::get('/subjects', 'SubjectController@index')->name('subject.index');
    Route::post('/subjects', 'SubjectController@store')->name('subject.store');
    Route::delete('/subjects/{id}', 'SubjectController@destroy')->name('subject.destroy');
});
