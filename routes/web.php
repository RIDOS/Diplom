<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/admin', function () {
})->middleware(['auth', 'auth.admin']);

Route::namespace('Admin')->prefix('admin')->middleware(['auth', 'auth.admin'])->name('admin.')->group(function () {
    Route::resource('/users', 'UserController',
        ['except' => ['show', 'create', 'store']]);
    Route::resource('/vakansii', 'VakansiiController',
        ['except' => ['show', 'create', 'store']]);
    Route::resource('/stat', 'StatController',
        ['except' => ['show', 'create', 'store']]);
});




Route::get('/study', function () {
})->middleware(['auth', 'auth.study']);

Route::namespace('Study')->prefix('study')->middleware(['auth', 'auth.study'])->name('study.')->group(function () {
    Route::resource('/profile','StudyController',
    ['except' => ['show', 'create', 'store']]);

    Route::resource('/student','StudentController',
    ['except' => ['show', 'create', 'store']]);

    Route::resource('/organizations','OrgController',
    ['except' => ['show', 'create', 'store', 'edit', 'destroy', 'update']]);

    Route::resource('/organizations/profile','OrgProController',
    ['except' => ['index', 'create', 'store', 'edit', 'destroy', 'update']]);
});



Route::get('/student', function () {
})->middleware(['auth', 'auth.stud']);

Route::namespace('Student')->prefix('student')->middleware(['auth', 'auth.stud'])->name('student.')->group(function () {
    Route::resource('/profile','StudentController',
    ['except' => ['show', 'create', 'store']]);

    Route::resource('/vakansii','VakanssiiController',
    ['except' => ['show', 'create', 'store']]);
});




Route::get('/organization', function () {
})->middleware(['auth', 'auth.org']);

Route::namespace('Organization')->prefix('organization')->middleware(['auth', 'auth.org'])->name('organization.')->group(function () {
    Route::resource('/profile','OrganizationController',
        ['except' => ['show', 'create', 'store']]);

    Route::resource('/students','VipusniknController',
        ['except' => ['show', 'create', 'store', 'edit', 'update', 'destroy']]);

    Route::resource('/vakansi','VakansiiController',
        ['except' => ['show', 'store']]);
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
