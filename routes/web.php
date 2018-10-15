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
    return view('home');
});

Auth::routes();

Route::resource('epitetos', 'EpitetoController');

Route::resource('familias', 'FamiliaController');

Route::resource('generos', 'GeneroController');

Route::resource('exsicatas', 'ExsicataController');

Route::get('/index-grade', 'ExsicataController@indexGrade')->name('exsicatas.index-grade');

Route::group(['middleware' => ['role:gerenciador|moderador|admin']], function() {
    Route::resource('roles', 'RoleController');
    Route::resource('permissions', 'PermissionController');
    Route::resource('configurations', 'ConfigurationController');
    Route::resource('users', 'UserController');
});

Route::group(['middleware' => ['role:admin|moderador']], function() {
    Route::resource('audits', 'AuditController');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('decompose','\Lubusin\Decomposer\Controllers\DecomposerController@index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/herbario-virtual', 'HomeController@herbario')->name('herbario');