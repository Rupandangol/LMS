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
//
//Route::get('/', function () {
//    return view('admin.admin');
//});
//
use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//
//Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
//    Route::get('/', function () {
//        return view('layouts.app');
//    });
//});


//login
//    login student
Route::get('/', 'loginController@index')->name('login-student');
Route::post('/', 'loginController@loginStudent');
Route::any('/logoutStudent', 'loginController@logoutStudent')->name('logout-student');


//login admin

Route::get('/@dmin', 'loginController@adminIndex')->name('login-admin');
Route::post('/@dmin', 'loginController@adminPage');
Route::any('/@dminLogout', 'loginController@adminLogout')->name('admin-logout');

//backend

Route::group(['prefix' => '@admin@', 'namespace' => 'Backend', 'middleware' => 'auth:admin'], function () {


//    login
    Route::get('/addAdmin', 'BackendLoginController@addAdmin');
    Route::post('/addAdminAction', 'BackendLoginController@addAdminAction')->name('admin-action');
    Route::get('/manageAdmin', 'BackendLoginController@manageAdmin');


    //setting
    Route::get('/setting', 'BackendController@setting');
    //setting action
    Route::post('/setting/settingAction', 'BackendController@settingAction');


//    admin manage
    Route::post('/manageAdmin/delete', 'BackendLoginController@deleteAdmin')->name('delete-admin');
    Route::post('/manageAdmin/delete/update', 'BackendLoginController@updateAdmin')->name('update-admin');

//    loginStudent
    Route::get('/addStudent', 'BackendLoginController@addStudent');
    Route::post('/addStudentAction', 'BackendLoginController@addStudentAction')->name('student-action');
    Route::get('/manageStudent', 'BackendLoginController@manageStudent');

    Route::post('/manageStudent/viewStudent', 'BackendLoginController@viewStudent')->name('view-student');

//        admin status
    Route::post('/statusAdmin', 'BackendLoginController@statusAdmin')->name('admin-status');
//    student status

    Route::post('/manageStudent/viewStudent/statusStudent', 'BackendLoginController@statusStudent')->name('student-status');

//    student manage
    Route::post('/manageStudent/delete', 'BackendLoginController@deleteStudent')->name('delete-student');

//    dashboard Issue
    Route::post('/issueBook/dashIssue', 'BackendController@dashIssue')->name('dash-issue');

//    dashboard return
    Route::post('/dashReturn', 'BackendController@dashReturn')->name('dash-return');

//   History Issue Book

    Route::post('/history', 'BackendController@history')->name('history');

    Route::get('/historyList', 'BackendController@historyList')->name('history-list');
    Route::post('/historyList/search', 'BackendController@historySearch');


//dashboard
    Route::get('/', 'BackendController@index')->name('admin-dashboard');
    Route::get('/view', 'BackendController@view');

//    add
    Route::get('/addBook', 'BackendController@addBook');
    Route::get('/addCategory', 'BackendController@addCategory');
    Route::get('/addAuther', 'BackendController@addAuther');
    Route::post('/addBook', 'BackendController@insertBook')->name('insertBook');
    Route::post('/addAuther', 'BackendController@insertAuther')->name('insertAuther');
    Route::post('/addCategory', 'BackendController@insertCategory')->name('insertCategory');


//    check
    Route::group(['prefix' => 'issueBook'], function () {

        Route::get('/', 'BackendController@issueBook');
        Route::post('/check', 'BackendController@issueBookCheck');
        Route::get('/manageIssueBook', 'BackendController@manageIssue');
        Route::get('/manageIssueBook/check', 'BackendController@checkStudent');

    });


////    manage

//    author manage
    Route::get('/manageAuther', 'BackendController@manageAuther');
    Route::get('/manageAuther/aDelete/{id}', 'BackendController@deleteAuther');
    Route::get('/manageAuther/aEdit/{id}', 'BackendController@editAuther');
    Route::post('/manageAuther/aEdit/editAction', 'BackendController@editAutherAction')->name('edit-auther');


//    category manage
    Route::get('/manageCategory', 'BackendController@manageCategory');
    Route::get('/manageCategory/cEdit/{id}', 'BackendController@cEdit');
    Route::post('/manageCategory/cEdit/editAction', 'BackendController@editAction')->name('edit-action');

//    book manage
    Route::get('/manageBook', 'BackendController@manageBook');
    Route::get('/manageBook/bDelete/{id}', 'BackendController@deleteBook');


////    delete
    Route::group(['prefix' => 'manageCategory'], function () {
        Route::get('/cDelete/{id}', 'BackendController@deleteCategory')->name('deleteCategory')->name('category-delete');


//    status
        Route::post('/status', 'BackendController@categoryStatus');
        Route::post('/statusAuther', 'BackendController@autherStatus');
    });
});
//   ajax controller
Route::get('api/check-student', 'ajaxController@checkStudent');
Route::get('api/check-book', 'ajaxController@checkBook');
Route::get('api/fine','ajaxController@fine');
Route::get('api/status','ajaxController@status');


//   Frontend

Route::group(['namespace' => 'Frontend', 'middleware' => 'auth:student'], function () {

    Route::get('/studentLogin', 'frontendController@index')->name('student-dashboard');


//    overView

    Route::get('/overview', 'frontendController@overview');

//    authorList

    Route::get('/authorList', 'frontendController@authorList');

//    bookList

    Route::get('/bookList', 'frontendController@bookList');


//    categoryList

    Route::get('/categoryList', 'frontendController@categoryList');
    Route::post('/categoryList/categoryBooks', 'frontendController@categoryBooks')->name('categoryBooks');

});