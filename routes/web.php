<?php

use App\Http\Controllers\categoryController;
use App\Http\Controllers\userController;
use App\Http\Controllers\postController;
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
// Route::get('/header','welcome');

//Admin Panel
// login
Route::get('/admin', function () {
    if(session('name')){
        return redirect('/admin/post');
    }
    return view('/admin/index');
    
    
});
Route::post('do-login',[userController::class,'doAuthentication']);
Route::get('/admin/logout', function () {
    if(session()->has('name')){
        session()->pull('name');
    }
    return redirect('/admin');
});
//user
Route::get('/admin/users',[userController::class,'showUserData'])->middleware('checkSession');
Route::get('/admin/addUser', function () {
    return view('/admin/add-user');
})->middleware('checkSession');
Route::post('/admin/addUserData',[userController::class,'addUserData'])->middleware('checkSession');
Route::get('/admin/delete-user/{user_id}',[userController::class,'dltuserData']);
Route::get('/admin/update-user/{user_id}',[userController::class,'fillToUpdateData'])->middleware('checkSession');
Route::post('/admin/updateUserData',[userController::class,'updateUserData'])->middleware('checkSession');



//category
Route::post('/admin/addCatData',[categoryController::class,'addCategoryData'])->middleware('checkSession');
Route::get('/admin/category',[categoryController::class,'showCategoryData'])->middleware('checkSession');
Route::get('/admin/add-category', function () {
    return view('/admin/add-category');
})->middleware('checkSession');
Route::get('/admin/deleteCategory/{category_id}',[categoryController::class,'dltCategoryData'])->middleware('checkSession');
Route::get('/admin/update-category/{category_id}',[categoryController::class,'fillToUpdateData'])->middleware('checkSession');
Route::post('/admin/updateCatData',[categoryController::class,'updateCategoryData'])->middleware('checkSession');

//post
Route::get('/admin/post',[postController::class,'showPostData'])->middleware('checkSession');
Route::get('/admin/addPost',[postController::class,'showCategoryData'])->middleware('checkSession');
// Route::post('/admin/savePost',[categoryController::class,'saveCatPostCount'])->middleware('checkSession');
Route::post('/admin/savePost',[postController::class,'savePostData'])->middleware('checkSession');

Route::get('/admin/deletePost/{post_id}',[postController::class,'dltPostData'])->middleware('checkSession');
Route::get('/admin/update-post/{post_id}',[postController::class,'fillToUpdateData'])->middleware('checkSession');
Route::post('/admin/saveUpdatePost',[postController::class,'updatePostData'])->middleware('checkSession');
//Route::post('/admin/updatePostData',[postController::class,'updatePostData'])->middleware('checkSession');

//FrontEnd
Route::get('/',[postController::class,'showFrontPanelPosts']);
Route::get('category/{cat_id}',[postController::class,'showCategoryPosts']);
Route::post('/search',[postController::class,'search']);
// Route::get('/search','search');
Route::get('author/{author_id}',[postController::class,'showAuthorPosts']);
// Route::view('header',[postController::class,'showCategoriesOnHeader']);
Route::get('single/{cat_id}',[postController::class,'showPostOfCategory']);
