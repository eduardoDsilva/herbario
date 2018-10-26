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
    Route::get('/configuracao/registros-apagados', 'SoftDeleteController@index')->name('soft-delete.index');
    Route::get('/configuracao/registros-apagados/exsicatas', 'SoftDeleteController@exsicatas')->name('soft-delete.exsicatas');
    Route::get('/configuracao/registros-apagados/epitetos', 'SoftDeleteController@epitetos')->name('soft-delete.epitetos');
    Route::get('/configuracao/registros-apagados/generos', 'SoftDeleteController@generos')->name('soft-delete.generos');
    Route::get('/configuracao/registros-apagados/familias', 'SoftDeleteController@familias')->name('soft-delete.familias');
    Route::get('/configuracao/registros-apagados/exsicatas/recovery/{id}', 'ExsicataController@recovery')->name('soft-delete.exsicatas.recovery');
    Route::get('/configuracao/registros-apagados/familias/recovery/{id}', 'FamiliaController@recovery')->name('soft-delete.familias.recovery');
    Route::get('/configuracao/registros-apagados/generos/recovery/{id}', 'GeneroController@recovery')->name('soft-delete.generos.recovery');
    Route::get('/configuracao/registros-apagados/epitetos/recovery/{id}', 'EpitetoController@recovery')->name('soft-delete.epitetos.recovery');
});

Route::group(['middleware' => ['role:admin|moderador']], function() {
    Route::resource('audits', 'AuditController');
    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
    Route::get('decompose','\Lubusin\Decomposer\Controllers\DecomposerController@index');
});

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/herbario-virtual', 'HomeController@herbario')->name('herbario');
