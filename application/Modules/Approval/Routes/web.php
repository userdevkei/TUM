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

Route::prefix('approval')->group(function() {
    Route::get('/', 'ApprovalController@login')->name('application.login');

    Route::group(['middleware' => ['cod']], function (){
        Route::get('/home', 'ApprovalController@dashboard')->name('approval.cod');
        Route::get('/pending', 'ApprovalController@pending')->name('approval.pending');
        Route::get('/approved', 'ApprovalController@approved')->name('approval.approved');
        Route::get('/rejected', 'ApprovalController@rejected')->name('approval.rejected');
        Route::get('/search', 'ApprovalController@search')->name('approval.search');
        Route::get('/graph', 'ApprovalController@graph');

        Route::get('/pendingView', 'ApprovalController@viewPending');

        Route::post('/fetchData', 'ApprovalController@fetchData');
        Route::post('/getCourses', 'ApprovalController@getCourses');
        Route::post('/getApplications', 'ApprovalController@candidate');
        Route::post('/getApplication', 'ApprovalController@getApplication');
        Route::post('/approveApplication', 'ApprovalController@approve');
        Route::post('/rejectApplication', 'ApprovalController@reject');
        Route::post('/getCandidate', 'ApprovalController@searchValue');
        Route::post('/push', 'ApprovalController@push');
    });


});
