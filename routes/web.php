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

Auth::routes();

Route::resource('configurations', 'ConfigurationController');

Route::resource('roles', 'RoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('users', 'UserController');

Route::resource('epitetos', 'EpitetoController');

Route::resource('familias', 'FamiliaController');

Route::resource('generos', 'GeneroController');

Route::resource('exsicatas', 'ExsicataController');

Route::get('/index-grade', 'ExsicataController@indexGrade')->name('exsicatas.index-grade');

Route::resource('audits', 'AuditController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/herbario-virtual', 'HomeController@herbario')->name('herbario');

Route::get('/configuracoes', 'HomeController@configuracoes')->name('configuracoes');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

Route::get('decompose','\Lubusin\Decomposer\Controllers\DecomposerController@index');
