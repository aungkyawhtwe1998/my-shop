<?php

use App\Http\Controllers\ItemController;
use App\PostCategory;
use Illuminate\Support\Facades\Auth;
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

//welcome page
Route::get('/', 'WelcomeController@index')->name('welcome');
Route::get('/welcome/{id}','WelcomeController@showItem')->name('welcome-item.show');

//blog page
Route::get('/blogs', 'BlogController@index')->name('blogs');
Route::get('/blogs/{id}','BlogController@showPost')->name('blogs.show');
Route::get('/blogs-category/{id}','BlogController@showByCategory')->name('blogs.showbyCategory');


Route::get('/welcome-category/{id}','WelcomeController@showbyCategory')->name('welcome.category');
Route::get('/alex', 'WelcomeController@showPortfolio')->name('portfolio');

Route::resource('message', 'MessageController');
Auth::routes();

//Auth middleware
Route::middleware(["auth","isBanned"])->group(function(){
    Route::get('/home', 'HomeController@index')->name('home');

    //Admin only middleware
    Route::middleware("AdminOnly")->group(function(){
        //user manager route
        Route::get("/user-manager","UserManagerController@index")->name('user-manager.index');
        Route::post("/make-admin","UserManagerController@makeAdmin")->name('user-manager.makeAdmin');
        Route::post("/ban-user","UserManagerController@banUser")->name('user-manager.banUser');
        Route::post("/restore-user","UserManagerController@restoreUser")->name('user-manager.restoreUser');
        Route::post("/change-user-password","UserManagerController@changeUserPassword")->name('user-manager.changeUserPassword');

        //category manager
        Route::get('/category-manager','CategoryController@index')->name('category-manager.index');
        Route::post('/cateogry-manager-add','CategoryController@store')->name('catergory-manager.addCategory');
        Route::post('/cateogry-manager-delete/{id}','CategoryController@destroy')->name('catergory-manager.destroy');
        Route::post('/cateogry-manager-edit','CategoryController@update')->name('catergory-manager.update');
    
        Route::resource('post-category', 'PostCategoryController');
        Route::post('/post-category-edit','PostCategoryController@update')->name('post-category.update');
    
    });

    //Items
    Route::resource('item', 'ItemController');
    Route::resource('item-photo', 'ItemPhotoController');

    //Post
    Route::resource('post', 'PostController');
    Route::resource('post-cover-photo', 'PostCoverPhotoController'); 

    //profile routes
    Route::prefix('profile')->group(function(){
        Route::get('/', 'ProfileController@profile')->name('profile');
        Route::get('/edit-photo','ProfileController@editPhoto')->name('profile.edit.photo');
        Route::get('/edit-password','ProfileController@editPassword')->name('profile.edit.password');
        Route::get('/edit-user-info','ProfileController@editUserInfo')->name('profile.edit.user.info');
        Route::post('/change-password','ProfileController@changePassword')->name('profile.changePassword');
        Route::post('/change-user-info','ProfileController@changeUserInfo')->name('profile.changeUserInfo');
        Route::post('/change-photo','ProfileController@changePhoto')->name('profile.changePhoto');
        Route::post("/update-user-info","ProfileController@updateInfo")->name("profile.update.info");
    
    });
    
});
