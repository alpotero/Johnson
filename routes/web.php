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

Route::get('/dashboard-prima', function () {
    //return view('pages.00dashboard');
    return view('crawler.apicrawler');
});

Route::get('/dashboard', function () {
    //return view('pages.00dashboard');
    return view('pages.00dashboard');
});

Route::get('/ioc-investigation', function () {
    return view('pages.01investigation');
});

Route::get('/ioc-duplicates', function () {
    return view('pages.02duplicates');
});

Route::get('/ioc-hidden', function () {
    return view('pages.03hidden');
});

Route::get('/ioc-details', function () {
    return view('pages.04details');
});

Route::get('/ioc-summary', function () {
    return view('pages.05summary');
});

Route::get('/ioc-publishing', function () {
    return view('pages.06publishing');
});


/////////////////// Model Database
Route::resource('posts', 'PostsController');
Route::resource('tblBlogs', 'tblBlogsController');

Route::resource('blogs', 'BlogsController');
Route::resource('iocs', 'IocsController');
Route::resource('files', 'FilesController');
Route::resource('urls', 'UrlsController');
Route::resource('emails', 'EmailsController');
Route::resource('domains', 'DomainsController');