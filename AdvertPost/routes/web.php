<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     // return view('welcome');
    
// });

Auth::routes();
Route::get('/home', function(){
    return redirect('/');
});
Route::get('summernoteeditor',array('as'=>'summernoteeditor.get','uses'=>'SummernotefileController@getSummernoteeditor'));
Route::post('summernoteeditor',array('as'=>'summernoteeditor.post','uses'=>'SummernotefileController@postSummernoteeditor'));

Route::get('/', 'HomeController@index')->name('home');
//blog related routes
Route::get('/post_new', 'BlogController@postNewGet')->name('post_new');
Route::post('/post_new', 'BlogController@postNewPost')->name('post_new_post');
Route::get('/category/{name}', 'BlogController@blogListViewCategory')->name('post_category_view');
Route::get('/post_limits', 'BlogController@blogGetLimits')->name('post_limits');
Route::get('/edit_posts', 'BlogController@editPostsGet')->name('edit_posts');
Route::get('/log_credit_edit_start', 'BlogController@logCreditEdit')->name('log_credit_edit');
Route::get('/log_credit_edit_save', 'BlogController@logCreditEditSave')->name('log_credit_edit_save');
Route::get('/post_view/{id}', 'BlogController@detailView')->name('post_view');
Route::post('/post_comment', 'BlogController@postComment')->name('post_comment');
Route::get('/post_update/{id}', 'BlogController@postUpdateGet')->name('update');
Route::get('/draft_update/{id}', 'BlogController@postUpdateGet');
Route::post('/post_delete', 'BlogController@postDelete')->name('post_delete');
Route::post('/post_update', 'BlogController@postUpdatePost');
Route::get('/mmm', 'BlogController@bb');

//profile related routes
Route::get('/my_credits', 'ProfileController@creditsPageGet')->name('my_credits');
Route::get('/profile', 'ProfileController@index')->name('profile');
Route::get('/my_orders', 'ProfileController@ordersPageGet')->name('my_orders');
Route::get('/my_messages', 'ProfileController@messagesPageGet')->name('my_messages');
Route::post('/profile/info-change', 'ProfileController@infoChange')->name('info_change');
Route::post('/profile/password-change', 'ProfileController@passwordChange')->name('password_change');
Route::post('/profile/avatar-change', 'ProfileController@avatarChange')->name('avatar_change');

//paypal related routes
Route::get('paywithpaypal', array('as' => 'paywithpaypal','uses' => 'PaypalController@payWithPaypal',));
Route::post('paypal', array('as' => 'paypal','uses' => 'PaypalController@postPaymentWithpaypal',));
Route::get('paypal', array('as' => 'status','uses' => 'PaypalController@getPaymentStatus',));


//mail related routes
Route::get('sendbasicemail','MailController@basic_email');
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');

Route::get('/sendmail','HomeController@send');

//contact us related routes
Route::get('/contact', 'HomeController@contactGet')->name('contact');
Route::post('/contact', 'HomeController@contactPost')->name('contact_post');
Route::post('/subscribe', 'HomeController@subscribePost')->name('subscribe_post');

Route::group([
    'name' => 'admin.',
    'prefix' => 'manage',
    'namespace' => 'Admin',
    'middleware' => 'admin',
], function () {
    Route::get('/', 'AdminController@index')->name('index');
    Route::get('/users', 'AdminController@usersGet')->name('users');
    Route::get('/blogs', 'AdminController@blogsGet')->name('blogs');
    Route::post('/blogs/approve', 'AdminController@approvePosts')->name('blogs_approve');
    Route::post('/blogs/reject', 'AdminController@approvePosts')->name('blogs_reject');
    Route::post('/blogs/delete', 'AdminController@approvePosts')->name('blogs_delete');
});