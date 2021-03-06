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
	return redirect('home');
});

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->middleware('auth');

Auth::routes();

Route::get('/home', 'Project\ProjectView@showAllProject')->name('home');	

Route::group(['prefix' => 'project'], function () {
	Route::get('/{id}', 'Project\ProjectView@showProject');
	Route::get('/{id}/assignment/create', 'Assignment\AssignmentView@createAssignment');
});

Route::group(['prefix' => 'assignment'], function () {
	Route::get('/{id}', 'Assignment\AssignmentView@showAssignment');
});

Route::group(['prefix' => 'assignment/{id}/report'], function () {
	Route::get('/', 'AssignmentReport\AssignmentReportView@showAllReport');
	Route::get('/{report_id}', 'AssignmentReport\AssignmentReportView@showReport');
});

Route::group(['prefix' => 'api'], function () {

	Route::group(['prefix' => 'user'], function () {
		Route::post('/register', 'User\UserController@create');
		Route::post('/login', 'User\UserController@login');
		Route::post('/edit', 'User\UserController@edit');
	});

	Route::group(['prefix' => 'project'], function () {	
		Route::post('/get', 'Project\ProjectController@get');
		Route::post('/create', 'Project\ProjectController@create');
		Route::post('/edit', 'Project\ProjectController@edit');
		Route::post('/get/all', 'Project\ProjectController@getall');
	});

	Route::group(['prefix' => 'assignment'], function () {
		Route::post('/get', 'Assignment\AssignmentController@get');
		Route::post('/create', 'Assignment\AssignmentController@create');
		Route::post('/edit', 'Assignment\AssignmentController@edit');
		Route::post('/get/all', 'Assignment\AssignmentController@getall');
	});

	Route::group(['prefix' => 'project/collaborator'], function () {
		Route::post('/invite', 'ProjectCollaborator\ProjectCollaboratorController@invite');
		Route::post('/remove', 'ProjectCollaborator\ProjectCollaboratorController@remove');
	});


	Route::group(['prefix' => 'assignment/report'], function () {
		Route::post('/get', 'AssignmentReport\AssignmentReportController@get');
		Route::post('/create', 'AssignmentReport\AssignmentReportController@create');
		Route::post('/get/all', 'AssignmentReport\AssignmentReportController@getall');
		Route::post('/valuate', 'AssignmentReport\AssignmentReportController@valuateReport');
	});


	Route::group(['prefix' => 'assignment/report/detail'], function () {
		Route::post('/create', 'AssignmentReportDetail\AssignmentReportDetailController@create');
		Route::post('/get', 'AssignmentReportDetail\AssignmentReportDetailController@get');
		Route::post('/edit', 'AssignmentReportDetail\AssignmentReportDetailController@edit');
		Route::post('/delete', 'AssignmentReportDetail\AssignmentReportDetailController@delete');
	});

	Route::group(['prefix' => 'assignment/quest'], function () {
		Route::post('/create', 'AssignmentQuest\AssignmentQuestController@create');
		Route::post('/get', 'AssignmentQuest\AssignmentQuestController@get');
		Route::post('/edit', 'AssignmentQuest\AssignmentQuestController@edit');
		Route::post('/delete', 'AssignmentQuest\AssignmentQuestController@delete');
		Route::post('/get/all', 'AssignmentQuest\AssignmentQuestController@getall');
	});

});