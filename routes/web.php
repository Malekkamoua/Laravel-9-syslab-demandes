<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\analysesController;
use App\Http\Controllers\demandesController;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {

	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);

    Route::get('analyses', 'App\Http\Controllers\analysesController@getAllAnalyses')->name('all_analyses');
    Route::get('analyse/{code}', 'App\Http\Controllers\analysesController@findeByCode')->name('analyse_by_code');

    Route::get('demandes', 'App\Http\Controllers\demandesController@getAlldemandes')->name('demandes');
    Route::get('demandes/ajouter', 'App\Http\Controllers\demandesController@create')->name('demande-add');
    Route::post('store', [App\Http\Controllers\demandesController::class, 'store'])->name('store');
    Route::get('demande/edit/{id}', [App\Http\Controllers\demandesController::class, 'edit'])->name('demande-edit');
    Route::post('update/{id}', [App\Http\Controllers\demandesController::class, 'update'])->name('update');
    Route::post('/delete/{id}', [App\Http\Controllers\demandesController::class, 'delete'])->name('demande-delete');
    Route::get('demande/pdf/{id}', [PDFController::class, 'generatePDF']);

    Route::get('consulter/demandes/{status}', 'App\Http\Controllers\demandesController@findByStatus')->name('demandes-stat');

    Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);


    Route::group(['middleware' => 'role:admin'], function () {
        Route::get('correspondants/', 'App\Http\Controllers\EmployeeController@AllEmployees')->name('all_employees');
        Route::post('correspondants/add', 'App\Http\Controllers\EmployeeController@addCorrespondant')->name('add_employee');
        Route::get('correspondants/{id}/demandes', 'App\Http\Controllers\EmployeeController@findByUser')->name('emp_demandes');
    });

});
