<?php

use Modules\Finance\Http\Controllers\FinanceController;

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

Route::prefix('applications')->group(function() {
//    Route::get('/', 'FinanceController@index');
    Route::group(['middleware' => 'finance'], function (){
        Route::get('/finance', [FinanceController::class, 'index'])->name('finance.dashboard');
        Route::get('/finance/applications', [FinanceController::class, 'applications'])->name('finance.applications');
        Route::get('/finance/viewApplication/{id}', [FinanceController::class, 'viewApplication'])->name('finance.viewApplication');
        Route::get('/finance/batch', [FinanceController::class, 'batch'])->name('finance.batch');
        Route::post('/finance/batchSubmit', [FinanceController::class, 'batchSubmit'])->name('finance.batchSubmit');
        Route::get('/finance/acceptApplication/{id}', [FinanceController::class, 'acceptApplication'])->name('finance.acceptApplication');
        Route::post('/finance/rejectApplication/{id}', [FinanceController::class, 'rejectApplication'])->name('finance.rejectApplication');
    });
});
