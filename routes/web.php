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

    $std = \College\Student::find(13);

//    $res = $std->books()->get();*/

    $res = $std->issue()->get();
    dd($res);

    return view('welcome');
});


Auth::routes();

Route::get('/logout', function () {

    return Auth::logout();

});


Route::get('/home', 'HomeController@index')->name('home');


Route:: group(['middleware' => ['auth', 'admin']], function () {

    Route::resource('student', 'studentController');
    Route::resource('staff', 'StaffController');


    Route::get('/library/students', 'HomeController@libraryStudents')->name('library/students');


    Route::get('/checkLibStudents', [
        'uses' => 'fetchLibraryDetail@checkLibStudents',
        'as' => 'manageStudents',
    ]);

    Route::get('/fetchLibraryDetail/{id}', [
        'uses' => 'fetchLibraryDetail@fetchLibDetail',
        'as' => 'fetchLibraryDetail',
    ]);

    Route::get('/approveQuestion', [
        'uses' => 'Exam\ExaminationController@approve',
        'as' => 'approveQuestion',
    ]);

    Route::get('/viewQuestion/{id}', [

        'uses' => 'Exam\ExaminationController@viewQuestion',
        'as' => 'viewQuestion',
    ]);


    Route::get('/Exam/conduct', [
        'uses' => 'Exam\ExaminationController@conductExam',
        'as' => 'conductExam'
    ]);


    Route::resource('Books', 'BookController');


    Route::get('/manage', 'addController@index');

    Route::post('/addCourse', 'addController@addCourse');

    Route::get('/issueBooks', 'addController@Booksissue');
    Route::get('/libraryCard', 'addController@libraryCard');

    Route::get('/libraryIndex', 'addController@libraryIndex');

});

//AJAX


//fetch
Route::get('/fetchAjaxFaculty', 'AjaxRequest\fetchAJaxRequest@fetchAjaxFaculty');
Route::post('/fetchAjaxCourse', 'AjaxRequest\fetchAJaxRequest@fetchAjaxCourse');
Route::post('/fetchAjaxStudent', 'AjaxRequest\fetchAJaxRequest@fetchAjaxStudent');
Route::post('/fetchAjaxStudentBookDetail', 'AjaxRequest\fetchAJaxRequest@fetchAjaxStudentBookDetail');
Route::post('/fetchBookCode', 'AjaxRequest\fetchAJaxRequest@fetchAjaxFurtherBook');


//save
Route::post('/saveIssuedBooksAjax', 'AjaxRequest\saveAJaxRequest@saveAjaxIssuedBooks');
Route::post('/saveRecievedBooksAjax', 'AjaxRequest\saveAJaxRequest@saveRecievedBooksAjax');

Route::post('/saveIssuedBooksTeacher', 'AjaxRequest\saveAJaxRequest@saveBooksTeacher');

Route::post('/savequestionAppr', 'AjaxRequest\saveAjaxQuestion@questionApprove');

Route::post('/saveFurtherBook', 'AjaxRequest\saveAJaxRequest@saveFurtherBooksAjax');


Route::post('/fetchAjaxSubject', 'Exam\ExamAjaxController@fetchSubject');

Route::post('/saveAjaxExam', 'Exam\ExamAjaxController@saveAjaxExam');


Route::get('bookDetailT', [

    'uses' => 'teacher\LibraryController@bookIndex',
    'as' => 'bookDetailT',
]);

Route::get('question', [
    'uses' => 'teacher\QuestionController@prepareQuestion',
    'as' => 'prepareQuestion'
]);

Route::post('/saveAjaxQuestion', 'AjaxRequest\saveAjaxQuestion@savequestion');
Route::get('/questionsManage', [
    'uses' => 'teacher\QuestionController@showQuestion',
    'as' => 'questionsManage',
]);

Route::get('/teacherLibrary', 'teacher\LibraryController@libIndex');


//student

Route::get('examDashboardS', [
    'uses' => 'student\studentPController@examDashboard',
    'as' => 'examDashboardS'
]);


Route::get('Exam/Dashboard', [
    'uses' => 'student\studentPController@examDashboard',
    'as' => 'examDashboardS'
]);


Route::get('Start/Exam/{id}', [
    'uses' => 'student\ExamController@examStart',
    'as' => 'startExam'


]);






