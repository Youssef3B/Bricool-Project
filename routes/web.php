<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\Manageservices;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\manageportfolioController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/service', ServiceController::class);
Route::resource('/profile', ProfileController::class);


Route::get('/services/ajax', 'ServiceController@filter')->name('services.filter.ajax');


Route::get('/profile', [ServiceController::class, 'showAll'])->name('sowAll');
Route::get('/profile/edited', [ProfileController::class, 'showAll'])->name('prof');

Route::get('/manageservices', [Manageservices::class, 'showAll'])->name('manageServices');
Route::get('/deleteservices/{id}', [Manageservices::class, 'deleteservice'])->name('deleteservices');

Route::delete('/admin/manageblog/{id}', [BlogController::class, 'delete'])->name('deleteblog');



Route::get('/deleteservice/{id}', [FavoriteController::class, 'deletefavorite'])->name('deletefavorite');

Route::get('/change-password', [PasswordController::class, 'index'])->name('password.change');
Route::post('/change-password', [PasswordController::class, 'store'])->name('password.update.post');




// Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');


Route::get('/admin', [AdminController::class, 'index'])->name('dashboard');
Route::get('/admin/listofusers', [AdminController::class, 'listofusers'])->name('listofusers');

Route::get('/admin/search', [AdminController::class, 'search'])->name('users.search');

Route::get('/admin/listofservices', [AdminController::class, 'listofservices'])->name('listofservices');
Route::get('/admin/listofservices/search', [AdminController::class, 'searchServices'])->name('servicessearch2');




Route::get('/admin/listofmessages', [AdminController::class, 'listofmessages'])->name('listofmessages');




Route::get('/admin/listofadmins', [AdminController::class, 'listofadmins'])->name('listofadmins');



Route::post('/admin/addadmin', [AdminController::class, 'addadmin'])->name('addadmin');


Route::get('/admin/addadmin', [AdminController::class, 'test'])->name('test');
Route::get('/admin/addpost', [AdminController::class, 'test2'])->name('test2');


Route::get('/admin/manageblog', [BlogController::class, 'manageblog'])->name('manageblog');


Route::get('/blog', [BlogController::class, 'blog'])->name('blog');



Route::get('/blogs/{id}/details', [BlogController::class, 'blogdetails'])->name('blog.details');

// Route::get('/blogdetails', [BlogController::class, 'blogdetails'])->name('blogdetails');



Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/contact', [ContactController::class, 'contact'])->name('contact');



Route::post('/admin/addpost', [AdminController::class, 'addpost'])->name('addpost');





Route::delete('/admin/users/{user}', [AdminController::class, 'deleteUser'])->name('users.delete');
Route::delete('/admin/services/{service}', [AdminController::class, 'deleteService'])->name('services.delete');
Route::delete('/admin/contacts/{contact}', [AdminController::class, 'deletemessage'])->name('contacts.delete');




Route::get('/services/{id}/comments', 'CommentController@show')->name('comments.show');
Route::get('/blog/{id}', [BlogController::class, 'blogdetails'])->name('blogdetails');



Route::get('/admin/editblog/{id}', [BlogController::class, 'edit'])->name('editblog');
Route::post('/admin/editblog/{id}', [BlogController::class, 'update'])->name('editblog-post');

// Route::get('/admin/editblog/{id}/edit', 'BlogController@edit')->name('editblog');
// Route::post('/admin/editblog/{id}/edit', 'BlogController@update')->name('editblog-post');



Route::delete('/admin/users/{id}', 'AdminController@deleteUser')->name('admin.users.delete');



// Route::get('/admin', [AdminController::class, 'countUsers'])->name('dashboard');


Route::post('/favorites/add', [FavoriteController::class, 'add'])->name('favorites.add');
Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites');

Route::get('/services/filter', 'App\Http\Controllers\ServiceController@filter')->name('services.filter');
Route::get('/services/filter-ajax', 'App\Http\Controllers\ServiceController@filterAjax')->name('services.filter.ajax');
Route::get('/services/search', [ServiceController::class, 'search'])->name("services.search");

Route::post('/services/{id}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::post('/blogs/{id}/comments', [CommentController::class, 'store2'])->name('comments.blog');


Route::resource('services', Manageservices::class);

Route::get('/details/{id}', [ServiceController::class, 'details'])->name('details.details');

Route::get('/profiles/{id}', [ProfileController::class, 'profiles'])->name('profiles.profiles');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/portfolio/create', [PortfolioController::class, 'create'])->name('portfolio.create');
Route::post('/portfolio/store', [PortfolioController::class, 'store'])->name('portfolio.store');
Route::get('/portfolio/{userId}', [PortfolioController::class, 'portfolio'])->name('portfolio');




Route::get('/manageportfolio', [manageportfolioController::class, 'showAll'])->name('manageportfolio');
Route::delete('/manageportfolio/{id}', [ManageportfolioController::class, 'destroy'])->name('manageportfolio.destroy');

Route::get('/editportfolio/{id}', [ManageportfolioController::class, 'edit'])->name('editportfolio');
Route::post('/editportfolio/{id}', [ManageportfolioController::class, 'update'])->name('portfolio.update');


Route::resource('portfolios', manageportfolioController::class);
