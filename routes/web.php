<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\EnrolledStudentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegistrarDashboardController;
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

/* teacher login */
/* Route::post('/teacher/login', 'TeacherLoginController@authenticate')->name('teacher.login'); */
/* student login */
/* Route::post('/student/login', 'StudentLoginController@authenticate')->name('student.login'); */
/* admin login */
/* Route::post('/admin/login', 'AdminLoginController@authenticate')->name('admin.login');  */

/* ============================== Home Page ================================ */

Route::middleware(['middleware' => 'PreventBackMiddleware'])->group(function () {
    Auth::routes();
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
});
Route::get('/about us', [HomeController::class, 'about'])->name('about.index');
Route::get('/academics', [HomeController::class, 'academics'])->name('academics.index');
Route::get('/calendar', [HomeController::class, 'calendar'])->name('calendar.index');
Route::get('/enroll', [HomeController::class, 'enroll'])->name('enroll.index');
Route::post('/enroll', [HomeController::class, 'store'])->name('enroll.store');

/* ============================== Portal ================================ */
Route::get('/portal', [HomeController::class, 'portal'])->name('portal.index');
Route::get('/portal/student', [HomeController::class, 'studentPortal'])->name('student.portal.index');
Route::get('/portal/teacher', [HomeController::class, 'teacherPortal'])->name('teacher.portal.index');
Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin.login.index');

/* ============================== Student ================================ */
Route::group(['prefix' => 'student', 'middleware' => ['isStudent', 'auth', 'PreventBackMiddleware']], function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('student.dashboard.index');
});
/* ============================== Teacher ================================ */
Route::group(['prefix' => 'teacher', 'middleware' => ['isTeacher', 'auth', 'PreventBackMiddleware']], function () {
    Route::get('/dashboard', [TeacherDashboardController::class, 'index'])->name('teacher.dashboard.index');
});



/* ============================== Admin ================================ */
Route::group(['prefix' => 'admin', 'middleware' => ['isAdmin', 'auth', 'PreventBackMiddleware']], function () {
    Route::get('/dashboard',  [AdminController::class, 'index'])->name('admin.dashboard.index');
    /* users */
    Route::get('/user', [UsersController::class, 'index'])->name('users.index');
});


/* ============================== Registrar ================================ */
Route::group(['prefix' => 'registrar', 'middleware' => ['isRegistrar', 'auth', 'PreventBackMiddleware']], function () {
    Route::get('/dashboard', [RegistrarDashboardController::class, 'index'])->name('registrar.dashboard.index');
    /* registrar|student */
    Route::get('/students/enrolled', 'EnrolledStudentController@index')->name('enrolled.index');
    Route::get('/students/create', 'EnrolledStudentController@create')->name('enrollees.create');
    Route::post('/students', 'EnrolledStudentController@store')->name('enrollees.store');
    Route::get('/students/enrollee', 'EnrolleesController@index')->name('enrollees.index');
    Route::get('/students/enrollee/{id}', 'EnrolleesController@show')->name('enrollees.show');
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
