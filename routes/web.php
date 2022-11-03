<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use PhpOffice\PhpSpreadsheet\RichText\Run;

Auth::routes();

Route::group(['prefix'=> 'dashboard', 'as'=> 'dashboard.', 'middleware'=> ['auth', 'admin']], function(){

    Route::get('/', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('index');

    # CATEGORIES ROUTES
    Route::group(['prefix'=> 'categories', 'as'=> 'categories.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
        Route::get('{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
        Route::put('{category}/update', [App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
        Route::get('{category}/destroy', [App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');
    });

    # PRODUCTS ROUTES
    Route::group(['prefix'=> 'products', 'as'=> 'products.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\ProductController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\ProductController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\ProductController::class, 'store'])->name('store');
        Route::get('{product}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit'])->name('edit');
        Route::put('{product}/update', [App\Http\Controllers\Admin\ProductController::class, 'update'])->name('update');
        Route::get('{product}/destroy', [App\Http\Controllers\Admin\ProductController::class, 'destroy'])->name('destroy');
    });


    # Posts ROUTES
    Route::group(['prefix'=> 'posts', 'as'=> 'posts.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\PostController::class, 'store'])->name('store');
        Route::get('{post}/edit', [App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');
        Route::put('{post}/update', [App\Http\Controllers\Admin\PostController::class, 'update'])->name('update');
        Route::get('{post}/destroy', [App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('destroy');
    });

    # Comments ROUTES
    Route::group(['prefix'=> 'comments', 'as'=> 'comments.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\CommentController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\CommentController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\CommentController::class, 'store'])->name('store');
        Route::get('{comment}/edit', [App\Http\Controllers\Admin\CommentController::class, 'edit'])->name('edit');
        Route::put('{comment}/update', [App\Http\Controllers\Admin\CommentController::class, 'update'])->name('update');
        Route::get('{comment}/destroy', [App\Http\Controllers\Admin\CommentController::class, 'destroy'])->name('destroy');
    });

    # Users ROUTES
    Route::group(['prefix'=> 'users', 'as'=> 'users.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\UserController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\UserController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\UserController::class, 'store'])->name('store');
        Route::get('{user}/edit', [App\Http\Controllers\Admin\UserController::class, 'edit'])->name('edit');
        Route::put('{user}/update', [App\Http\Controllers\Admin\UserController::class, 'update'])->name('update');
        Route::get('{user}/destroy', [App\Http\Controllers\Admin\UserController::class, 'destroy'])->name('destroy');
    });

    # Levels ROUTES
    Route::group(['prefix'=> 'levels', 'as'=> 'levels.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\LevelController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\LevelController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\LevelController::class, 'store'])->name('store');
        Route::get('{level}/edit', [App\Http\Controllers\Admin\LevelController::class, 'edit'])->name('edit');
        Route::put('{level}/update', [App\Http\Controllers\Admin\LevelController::class, 'update'])->name('update');
        Route::get('{level}/destroy', [App\Http\Controllers\Admin\LevelController::class, 'destroy'])->name('destroy');
    });

    # Courses ROUTES
    Route::group(['prefix'=> 'courses', 'as'=> 'courses.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\CourseController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\CourseController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\CourseController::class, 'store'])->name('store');
        Route::get('{course}/edit', [App\Http\Controllers\Admin\CourseController::class, 'edit'])->name('edit');
        Route::put('{course}/update', [App\Http\Controllers\Admin\CourseController::class, 'update'])->name('update');
        Route::get('{course}/destroy', [App\Http\Controllers\Admin\CourseController::class, 'destroy'])->name('destroy');
    });

    # Material ROUTES
    Route::group(['prefix'=> 'materials', 'as'=> 'materials.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\MaterialController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\MaterialController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\MaterialController::class, 'store'])->name('store');
        Route::get('{material}/edit', [App\Http\Controllers\Admin\MaterialController::class, 'edit'])->name('edit');
        Route::put('{material}/update', [App\Http\Controllers\Admin\MaterialController::class, 'update'])->name('update');
        Route::get('{material}/destroy', [App\Http\Controllers\Admin\MaterialController::class, 'destroy'])->name('destroy');
    });

    # Contacts ROUTES
    Route::group(['prefix'=> 'contacts', 'as'=> 'contacts.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\ContactController::class, 'index'])->name('index');
        Route::get('{contact}/show', [App\Http\Controllers\Admin\ContactController::class, 'show'])->name('show');
        Route::get('{contact}/destroy', [App\Http\Controllers\Admin\ContactController::class, 'destroy'])->name('destroy');
    });


    # payments ROUTES
    Route::group(['prefix'=> 'payments', 'as'=> 'payments.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\PaymentController::class, 'index'])->name('index');
        Route::get('{payment}/show', [App\Http\Controllers\Admin\PaymentController::class, 'show'])->name('show');
        Route::get('{payment}/destroy', [App\Http\Controllers\Admin\PaymentController::class, 'destroy'])->name('destroy');
    });
    
    # Privacy ROUTES
    Route::group(['prefix'=> 'privacy', 'as'=> 'privacy.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\PrivacyController::class, 'index'])->name('index');
        Route::get('/create', [App\Http\Controllers\Admin\PrivacyController::class, 'create'])->name('create');
        Route::post('/store', [App\Http\Controllers\Admin\PrivacyController::class, 'store'])->name('store');
        Route::get('{privacy}/edit', [App\Http\Controllers\Admin\PrivacyController::class, 'edit'])->name('edit');
        Route::put('{privacy}/update', [App\Http\Controllers\Admin\PrivacyController::class, 'update'])->name('update');
        Route::get('{privacy}/destroy', [App\Http\Controllers\Admin\PrivacyController::class, 'destroy'])->name('destroy');
    });

    # Setting ROUTES
    Route::group(['prefix'=> 'settings', 'as'=> 'settings.'], function(){
        Route::get('/', [App\Http\Controllers\Admin\SettingController::class, 'index'])->name('index');
        Route::post('/update', [App\Http\Controllers\Admin\SettingController::class, 'update'])->name('update');
    });
    
});



Route::get('/',[App\Http\Controllers\HomeController::class, 'index'])->name('index');
Route::get('/about',[App\Http\Controllers\HomeController::class, 'about'])->name('about');
Route::get('/contact',[App\Http\Controllers\HomeController::class, 'contact'])->name('contact');

Route::group(['middleware'=> ['auth']], function(){
    
    Route::group(['prefix'=> "profile" , 'as'=> 'profile.'], function(){
        Route::get('/', [App\Http\Controllers\ProfileController::class, 'index'])->name('index');
    });

    Route::group(['prefix'=> "products" , 'as'=> 'products.'], function(){
        Route::get('/',[App\Http\Controllers\ProductController::class, 'index'])->name('index');
    });
});
