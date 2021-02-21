<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\BlogsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\TagsController;
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

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blogs/{id}/{slug}', [BlogsController::class, 'showBlog'])->name('show.blog');

Auth::routes();

Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
    Route::prefix('users')->group(function(){
	    Route::get('/', [DashboardController::class, 'users'])->name('dashboard.users')->middleware('auth');
	    Route::delete('/', [UsersController::class, 'deleteUser'])->name('user.delete')->middleware('auth');
	    Route::get('/edit/{id}', [UsersController::class, 'editUser'])->name('user.edit')->middleware('auth');
	    Route::get('/new', [UsersController::class, 'newUser'])->name('user.new')->middleware('auth');
	    Route::post('/register', [UsersController::class, 'registerUser'])->name('user.register')->middleware('auth');
	    Route::patch('/update', [UsersController::class, 'updateUser'])->name('user.update')->middleware('auth');
    });
    Route::prefix('blogs')->group(function(){
	    Route::get('/', [DashboardController::class, 'blogs'])->name('dashboard.blogs')->middleware('auth');
	    Route::get('/new', [BlogsController::class, 'newBlog'])->name('blog.new')->middleware('auth');
	    Route::post('/register', [BlogsController::class, 'createBlog'])->name('blog.register')->middleware('auth');
	    Route::get('/edit/{id}', [BlogsController::class, 'editBlog'])->name('blog.edit')->middleware('auth');
	    Route::patch('/update', [BlogsController::class, 'UpdateBlog'])->name('blog.update')->middleware('auth');
	    Route::delete('/', [BlogsController::class, 'deleteBlog'])->name('blog.delete')->middleware('auth');

	});
	Route::prefix('categories')->group(function(){
	    Route::get('/', [DashboardController::class, 'categories'])->name('dashboard.categories')->middleware('auth');
	    Route::get('/new', [CategoriesController::class, 'newCategory'])->name('category.new')->middleware('auth');
	    Route::post('/register', [CategoriesController::class, 'registerCategory'])->name('category.register')->middleware('auth');

	    Route::get('/edit/{id}', [CategoriesController::class, 'editCategory'])->name('category.edit')->middleware('auth');
	    Route::patch('/update', [CategoriesController::class, 'updateCategory'])->name('category.update')->middleware('auth');
	    Route::delete('/', [CategoriesController::class, 'deleteCategory'])->name('category.delete')->middleware('auth');

	});
	Route::prefix('tags')->group(function(){
	    Route::get('/', [DashboardController::class, 'tags'])->name('dashboard.tags')->middleware('auth');
	    Route::get('/new', [TagsController::class, 'newTag'])->name('tag.new')->middleware('auth');
	    Route::post('/register', [TagsController::class, 'registerTag'])->name('tag.register')->middleware('auth');

	    Route::get('/edit/{id}', [TagsController::class, 'editTag'])->name('tag.edit')->middleware('auth');
	    Route::patch('/update', [TagsController::class, 'updateTag'])->name('tag.update')->middleware('auth');
	    Route::delete('/', [TagsController::class, 'deleteTag'])->name('tag.delete')->middleware('auth');

	});

});