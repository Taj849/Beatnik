<?php
use Illuminate\Support\Facades\Route;


Route::get('/','ContactController@index');
Route::get('portfolio-details/{categoryTitles_id}/{categoryName}','ContactController@showDetails');
//Admin Route
Route::get('adminlog','AdminController@adminLogin');

Route::post('adminloginsection','AdminController@login');
// Route::view('adminlogged','admin/adminHome');

//About Route

Route::get('about_detail','AboutController@showAbout')->middleware('check');

Route::view('addAbout','admin/addAbout')->middleware('check');


Route::post('upload_about_data','AboutController@addAbout')->middleware('check');

Route::get('aboutDelete/{id}','AboutController@deleteAbout')->middleware('check');

Route::get('aboutEdit/{id}','AboutController@editAbout')->middleware('check');

Route::post('upload_update_about_data/{id}','AboutController@updateAbout')->middleware('check');

//portfolio

Route::get('showPortfolio','PortfolioController@showPortfolio')->middleware('check');

Route::view('addCategory','admin/addCategory')->middleware('check');

Route::post('upload_portfolio_data','PortfolioController@addPortfolio')->middleware('check');

Route::get('addDetails/{id}','PortfolioController@showCategoryDetails')->middleware('check');

Route::post('upload_category_data','PortfolioController@upload_portfolio_data')->middleware('check');

Route::get('showDetails/{id}','PortfolioController@showItem')->middleware('check');

Route::get('portfolioDelete/{id}','PortfolioController@deletePortfolio')->middleware('check');

Route::get('portfolioEdit/{id}','PortfolioController@editportfolio')->middleware('check');

Route::post('upload_update_portfolio_data/{id}','PortfolioController@updateportfolio')->middleware('check');

//Service Route

Route::get('showService','ServiceController@showAbout')->middleware('check');

Route::view('addService','admin/addService')->middleware('check');


Route::post('upload_service_data','ServiceController@addAbout')->middleware('check');

Route::get('serviceDelete/{id}','ServiceController@deleteAbout')->middleware('check');

Route::get('serviceEdit/{id}','ServiceController@editAbout')->middleware('check');

Route::post('upload_update_service_data/{id}','ServiceController@updateAbout')->middleware('check');


//Question Route

Route::get('showQuestion','QuestionController@showAbout')->middleware('check');

Route::view('addQuestion','admin/addQuestion')->middleware('check');


Route::post('upload_question_data','QuestionController@addAbout')->middleware('check');

Route::get('questionDelete/{id}','QuestionController@deleteAbout')->middleware('check');

Route::get('questionEdit/{id}','QuestionController@editAbout')->middleware('check');

Route::post('upload_update_question_data/{id}','QuestionController@updateAbout')->middleware('check');

//Question Route

Route::get('showContact','ContactController@showAbout')->middleware('check');

Route::view('addContact','admin/addContact')->middleware('check');


Route::post('upload_contact_data','ContactController@addAbout')->middleware('check');

Route::get('contactDelete/{id}','ContactController@deleteAbout')->middleware('check');

Route::get('contactEdit/{id}','ContactController@editAbout')->middleware('check');

Route::post('upload_update_contact_data/{id}','ContactController@updateAbout')->middleware('check');


Route::get('logout','AdminController@logout')->middleware('check');
