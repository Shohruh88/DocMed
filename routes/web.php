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

//Home page
Route::get('/', 'SiteController@home')->name('home');
//Switch language
Route::get('lang/{lang}', 'SiteController@switchLang')->name('lang.switch');
//Services page
Route::get('/services', 'SiteController@services')->name('services');
//News
Route::get('/news','SiteController@news')->name('news');
Route::get('/news/{id}','SiteController@newsMore')->name('news.more');
//About us
Route::get('/about-us', function(){
    return "News";
})->name('about');
//Contact
Route::get('/feedback', 'SiteController@contact')->name('contact');
Route::post('/feedback', 'SiteController@feedbackStore')->name('contact.store');
//Appointment
Route::post('appointment', 'SiteController@makeAppointment')->name('appointment');
//Search
Route::get('/search', 'SiteController@search')->name('search');
//Admin routes
    Route::namespace('Admin')->middleware('auth')->name('admin.')->prefix('admin')->group(function(){
    Route::get('/', function() {
        return redirect()->route('admin.posts.index');
    })->name('dashboard');
    //Profile
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::put('/profile/update', 'ProfileController@update')->name('profile.update');
    Route::put('/profile/password', 'ProfileController@password')->name('profile.password');
    //Posts
    Route::resource('posts', 'PostsController');
    //Doctors
    Route::resource('doctors', 'DoctorsController');
    //Feedback routes
    Route::get('feedbacks', 'FeedbacksController@index')->name('feedbacks.index');
    Route::get('feedbacks/{id}/show', 'FeedbacksController@show')->name('feedbacks.show');
    Route::delete('feedbacks/{id}/delete', 'FeedbacksController@delete')->name('feedbacks.delete');
});
Auth::routes([
    'register', 'login' => true
]);

// Route::get('/home', 'HomeController@index')->name('home');

Route::get('test', 'SiteController@test');
