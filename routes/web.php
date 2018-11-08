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
Route::any('epitetos/filtrar', 'EpitetoController@filtrar')->name('epitetos.filtrar');

Route::resource('familias', 'FamiliaController');
Route::any('familias/filtrar', 'FamiliaController@filtrar')->name('familias.filtrar');

Route::resource('generos', 'GeneroController');
Route::any('generos/filtrar', 'GeneroController@filtrar')->name('generos.filtrar');

Route::resource('exsicatas', 'ExsicataController');
Route::any('exsicatas/filtrar', 'ExsicataController@filtrar')->name('exsicatas.filtrar');

Route::get('/index-grade', 'ExsicataController@indexGrade')->name('exsicatas.index-grade');
Route::get('/epiteto-tabela', 'EpitetoController@epiteto')->name('epiteto-tabela');

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

Route::get('/relatorios/exsicatas/{id}', 'ExsicataPdfController@exsicataPdf')->name('relatorios-exsicata');
Route::get('/relatorios/epitetos/{id}', 'EpitetoPdfController@exsicataPdf')->name('relatorios-epiteto');
Route::get('/relatorios/generos/{id}', 'GeneroPdfController@exsicataPdf')->name('relatorios-genero');
Route::get('/relatorios/familias/{id}', 'FamiliaPdfController@exsicataPdf')->name('relatorios-familia');

Route::get('/herbario-virtual', 'HomeController@herbario')->name('herbario');
