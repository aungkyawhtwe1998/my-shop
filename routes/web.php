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
//Route::get('/home/category/{id}','WelcomeController@showByCategory')->name('welcome.showByCategory');
Route::get('/home/{id}','WelcomeController@showItem')->name('welcome-item.show');
//Route::get('/post/{category}/{id}','WelcomeController@show')->name('welcome.show');

//blog page
//Route::resource('blogs','BlogController' );
Route::prefix('blogs')->group(function(){
    Route::get('/', 'BlogController@index')->name('blogs.index');
    Route::get('/post/{id}','BlogController@showRelatedPost')->name('blogs.show');
    Route::get('/category/{id}','BlogController@showByCategory')->name('blogs.showByCategory');
    Route::get('/user/{id}','BlogController@baseOnUser')->name('blogs.baseOnUser');
    Route::get('/date/{date}','BlogController@baseOnDate')->name('blogs.baseOnDate');

    Route::resource('comment', 'CommentController');
    Route::view("/about", "blog.about")->name('about');

});

Route::resource('message', 'MessageController');
Auth::routes();


//Auth middleware
Route::middleware(["auth","isBanned"])->group(function(){

    Route::prefix('dashboard')->group(function(){
        Route::get('/home', 'HomeController@index')->name('home');

//Items
        Route::resource('item', 'ItemController');
        Route::resource('item-photo', 'ItemPhotoController');

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

});
