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

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('student', 'studentController');

Route::resource('staff', 'StaffController');


Route::resource('Books', 'BookController');


Route::get('/manage', 'addController@index');
Route::post('/addCourse', 'addController@addCourse');

Route::get('/issueBooks', 'addController@Booksissue');
Route::get('/libraryCard', 'addController@libraryCard');


Route::get('/libraryIndex', 'addController@libraryIndex');


//AJAX


//fetch
Route::get('/fetchAjaxFaculty', 'AjaxRequest\fetchAJaxRequest@fetchAjaxFaculty');
Route::post('/fetchAjaxCourse', 'AjaxRequest\fetchAJaxRequest@fetchAjaxCourse');
Route::post('/fetchAjaxStudent', 'AjaxRequest\fetchAJaxRequest@fetchAjaxStudent');
route::post('/fetchAjaxStudentBookDetail', 'AjaxRequest\fetchAJaxRequest@fetchAjaxStudentBookDetail');
route::post('/fetchBookCode', 'AjaxRequest\fetchAJaxRequest@fetchAjaxFurtherBook');


//save
Route::post('/saveIssuedBooksAjax', 'AjaxRequest\saveAJaxRequest@saveAjaxIssuedBooks');
Route::post('/saveRecievedBooksAjax', 'AjaxRequest\saveAJaxRequest@saveRecievedBooksAjax');

Route::post('/saveFurtherBook', 'AjaxRequest\saveAJaxRequest@saveFurtherBooksAjax');
