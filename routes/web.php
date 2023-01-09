<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
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
    return view('auth/login');
});

Auth::routes();



Route::group(['prefix'=>"admin",'as' => 'admin.','namespace' => 'App\Http\Controllers\Admin','middleware' => ['auth','AdminPanelAccess']], function () {

    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/family', 'HomeController@storeFamily')->name('family');
    Route::get('/experience', 'HomeController@storePrevExp')->name('experience');
    Route::get('/education', 'HomeController@storeEducation')->name('education');
    Route::get('/editfamily', 'HomeController@editFamily')->name('editfamily');
    Route::get('/editexperience', 'HomeController@editPrevExp')->name('editexperience');
    Route::get('/editeducation', 'HomeController@editEducation')->name('editeducation');

    Route::resource('/users', 'UserController');
    Route::resource('/roles', 'RoleController');
    Route::resource('/permissions', 'PermissionController')->except(['show']);

});

Route::get('importView', [MyController::class, 'importView'])->name('importView');
Route::get('export', [MyController::class, 'export'])->name('export');
Route::post('import', [MyController::class, 'import'])->name('import');
Route::get('generate-pdf', [MyController::class, 'generatePDF'])->name('generatepdf');


