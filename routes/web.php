<?php

use App\Grade_level;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminLoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\TeacherDashboardController;
use App\Http\Controllers\UsersController;
use App\Mail\acceptedMessage;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

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
Route::get('/back', 'HomeController@back')->name('back');
Route::get('/', 'HomeController@index')->name('home.index');
Route::get('/about us', 'HomeController@about')->name('about.index');
Route::get('/academics', 'HomeController@academics')->name('academics.index');
Route::get('/academics/primary', 'HomeController@primary')->name('primary.index');
Route::get('/academics/primary/nursery', 'HomeController@nursery')->name('nursery.index');
Route::get('/academics/Elementary', 'HomeController@elementary')->name('elementary.index');
Route::get('/academics/Junior Highschool', 'HomeController@juniorhighschool')->name('juniorhighschool.index');
Route::get('/calendar', 'HomeController@calendar')->name('calendar.index');
Route::get('/enroll', 'HomeController@enroll')->name('enroll.index');
Route::post('/enroll', 'HomeController@store')->name('enroll.store');
/* ============================== Portal ================================ */
Route::group(['prefix' => 'portal', 'middleware' => 'PreventBackMiddleware'], function () {
    Route::get('/', 'HomeController@portal')->name('portal.index');
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
    /* Manage | Photo Gallery */
    Route::get('manage/photo gallery', 'PhotoGalleryController@index')->name('gallery.index');
    Route::get('manage/photo gallery/test', 'PhotoGalleryController@test')->name('gallery.test');
    Route::get('image/{filename}', 'PhotoGalleryController@displayImage')->name('image.displayImage');
    Route::post('manage/photo gallery', 'PhotoGalleryController@store')->name('gallery.store');
});
/* ============================== Registrar ================================ */
Route::group(['prefix' => 'registrar', 'middleware' => ['auth','isRegistrar']], function () {
    /* Dashboard */
    Route::get('/dashboard', 'RegistrarDashboardController@index')->name('registrar.dashboard.index');
    /* registrar|student */
    //Enrollee
    Route::get('/students/create', 'EnrolledStudentController@create')->name('enrollees.create');
    Route::post('/students', 'EnrolleesController@store')->name('enrollees.store');
    Route::get('/students/enrollee', 'EnrolleesController@index')->name('enrollees.index');
    Route::get('/students/enrollee/{id}/show', 'EnrolleesController@show')->name('enrollees.show');
    Route::get('/students/enrollee/{id}/requirements', 'EnrolleesController@show')->name('enrollees.show.requirements');
    Route::post('/students/requirements', 'EnrolleeRequirementController@store')->name('enrollees.store.requirements');
    Route::get('/students/requirements/download/{filename}', 'EnrolleeRequirementController@download')->name('enrollees.download.requirements');
    //Enrolled
    Route::get('/students/enrolled', 'EnrolledStudentController@index')->name('enrolled.index');
    Route::get('/students/enrolled/{id}/show', 'EnrolledStudentController@show')->name('enrolled.show');
    Route::put('/students/enrolled/{id}', 'EnrolledStudentController@update')->name('enrolled.update');
    Route::get('/students/enrolled/{id}/requirements', 'EnrolledStudentController@show')->name('enrolled.show.requirements');
    Route::post('/students/requirements', 'EnrolledRequirementController@store')->name('enrolled.store.requirements');
    /* Registrar|teacher */
    Route::get('/teachers', 'RTeachersController@index')->name('teachers.index');
    Route::get('/teachers/create', 'RTeachersController@create')->name('teachers.create');
    Route::post('/teachers', 'RTeachersController@store')->name('teachers.store');
    Route::get('/teachers/{id}/edit', 'RTeachersController@edit')->name('teachers.edit');
    Route::put('/teachers/{id}', 'RTeachersController@update')->name('teachers.update');
    /* Registrar|section */
    Route::get('/sections', 'RSectionsController@section')->name('section.index');
    Route::get('/sections/{id}', 'RSectionsController@show')->name('section.show');
    Route::post('/sections', 'RSectionsController@store')->name('section.store');
    Route::put('/section/{id}', 'RSectionsController@update')->name('section.update');
    Route::delete('/sections/{id}', 'RSectionsController@destroy')->name('section.destroy');
    /* Registrar | Sections in grade level */
    $gradeLevels = Grade_level::all();
    foreach ($gradeLevels as $gradeLevel) {
        $grade = str_replace(' ','',Str::lower($gradeLevel->grade_name));
        Route::get('/section/'.$grade, 'RSectionsController@index')->name('section.'.$grade.'.index');
    }
    /* Registrar|subject */
    Route::get('/subjects', 'SubjectController@index')->name('subject.index');
    Route::post('/subjects', 'SubjectController@store')->name('subject.store');
    Route::put('/subjects/{id}', 'SubjectController@update')->name('subject.update');
    Route::delete('/subjects/{id}', 'SubjectController@destroy')->name('subject.destroy');
});
Route::get('email', function(){
    Mail::to('royjosephlatayan0816@gmail.com')->send(new acceptedMessage);
    return new acceptedMessage();
})->name('user');
