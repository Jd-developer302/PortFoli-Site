<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactFormController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\frontend\frontendController;
use App\Http\Controllers\frontend\blogController;
use App\Http\Controllers\frontend\CommentController;
use App\Http\Controllers\frontend\ServicesController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\PortfolioImageController;
use App\Http\Controllers\frontend\GalleryController;


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


//Frontend Routes////////////////////

Route::get('/', [frontendController::class, 'index'])->name('home');
Route::get('/blog', [blogController::class, 'index']);
Route::get('/Portfolio', [GalleryController::class, 'index'])->name('portfolio');
// Route::get('/viewimage', [GalleryController::class, 'viewimage'])->name('viewimage');
Route::get('/tutorial/{category_slug}',[blogController::class, 'viewCategoryPost']);
Route::get('/tutorial/{category_slug}/{post_slug}', [blogController::class, 'viewPosts'])->name('tutorial.view');
//Services Routes////////////////////
Route::get('/Service/{slug}',[ServicesController::class, 'index']);
Route::get('gallery/{slug}', [GalleryController::class, 'viewimage'])->name('gallery.viewimage');
///////Comment Route/////////////
Route::post('comments/{slug}', [CommentController::class, 'store'])->name('comments.store');
// Route::get('posts/{post_slug}', [CommentController::class, 'commentPost']);

//Frontend Routes End////////////////////
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/dashboard/home', [ProfilController::class, 'index'])->name('Profiles.index');
Route::get('/dashboard/Profiles', [ProfilController::class, 'index'])->name('Profiles.index');
Route::get('/dashboard/create', [ProfilController::class, 'create'])->name('Profiles.create');
Route::post('/dashboard/Profiles', [ProfilController::class, 'store'])->name('Profiles.store');
Route::get('/dashboard/profiles/{profile}/edit', [ProfilController::class, 'edit'])->name('Profiles.edit');
Route::put('/dashboard/profiles/{profile}', [ProfilController::class, 'update'])->name('Profiles.update');
Route::delete('/dashboard/profiles/{profile}', [ProfilController::class, 'destroy'])->name('Profiles.destroy');
Route::post('/contact', [ContactFormController::class, 'store'])->name('contact.store');

Route::get('/dashboard/Category', [CategoryController::class, 'index'])->name('Category.index');
Route::get('/dashboard/add-Category', [CategoryController::class, 'create'])->name('add-Category.create');
Route::post('/dashboard/add-Category', [CategoryController::class, 'store'])->name('add-Category.store');
Route::get('/dashboard/edit-category/{category_id}', [CategoryController::class, 'edit'])->name('edit-category.edit');
Route::put('/dashboard/edit-category/{category_id}', [CategoryController::class, 'update'])
    ->name('edit-category.update');
    // Route::get('/dashboard/delete-category/{category_id}', [CategoryController::class, 'destroy'])
    // ->name('delete-category.destroy');
    Route::post('/dashboard/delete-category', [CategoryController::class, 'destroy'])
    ->name('delete-category.destroy');


    Route::get('/dashboard/Post', [PostController::class, 'index'])->name('Post.index');
    Route::get('/dashboard/add-Post', [PostController::class, 'create'])->name('add-Post.create');
    Route::post('/dashboard/add-Post', [PostController::class, 'store'])->name('add-Post.store');
    Route::get('/dashboard/edit-Post/{post_id}', [PostController::class, 'edit'])->name('edit-Post.edit');
    Route::put('/dashboard/edit-Post/{post_id}', [PostController::class, 'update'])
    ->name('edit-Post.update');
    Route::get('/dashboard/delete-Post/{post_id}', [PostController::class, 'destroy'])
    ->name('delete-Post.destroy');

    
    Route::get('/dashboard/Users', [UserController::class, 'index'])
    ->name('Users.index');
    Route::get('/dashboard/Users/{users_id}', [UserController::class, 'edit'])->name('Users.edit');
    Route::put('/dashboard/Users/{users_id}', [UserController::class, 'update'])->name('Users.update');
    ////Team Route //////////////////////////////////
    Route::get('/dashboard/team', [TeamController::class, 'index'])->name('Team.index');
    Route::get('/dashboard/add-team', [TeamController::class, 'create'])->name('add-team.create');
    Route::post('/dashboard/add-team', [TeamController::class, 'store'])->name('add-team.store');
    Route::get('/dashboard/edit-team/{id}', [TeamController::class, 'edit'])->name('edit-team.edit');
    Route::put('/dashboard/team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('/dashboard/team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

     ////Services Category Route //////////////////////////////////
     Route::get('/dashboard/Services_Category', [ServiceCategoryController::class, 'index'])->name('Services_Category.index');
     Route::get('/dashboard/add-Services_Category', [ServiceCategoryController::class, 'create'])->name('add-Services_Category.create');
     Route::post('/dashboard/add-Services_Category', [ServiceCategoryController::class, 'store'])->name('add-Services_Category.store');
     Route::get('/dashboard/edit-Services_Category/{id}', [ServiceCategoryController::class, 'edit'])->name('edit-Services_Category');
     Route::put('/dashboard/edit-Services_Category/{id}', [ServiceCategoryController::class, 'update'])->name('Services_Category.update');
     Route::delete('/dashboard/Services_Category/{id}', [ServiceCategoryController::class, 'destroy'])->name('Services_Category.destroy');
     ////Services  Route //////////////////////////////////
     Route::get('/dashboard/Service', [ServiceController::class, 'index'])->name('Service.index');
     Route::get('/dashboard/add-Service', [ServiceController::class, 'create'])->name('add-Service.create');
     Route::post('/dashboard/add-Service', [ServiceController::class, 'store'])->name('add-Service.store');
     Route::get('/dashboard/edit-Service/{id}', [ServiceController::class, 'edit'])->name('edit-Service.edit');
     Route::put('/dashboard/edit-Service/{id}', [ServiceController::class, 'update'])->name('edit-Service.update');
     Route::delete('/dashboard/Service/{id}', [ServiceController::class, 'destroy'])->name('Service.destroy');

    ////Portfolio  Route //////////////////////////////////
    Route::get('/dashboard/Portfolio_category',[PortfolioController::class, 'index'])->name('Portfolio_category.index');
    Route::get('/dashboard/add_port_category',[PortfolioController::class, 'create'])->name('add_port_category.create');
    Route::post('/dashboard/add_port_category', [PortfolioController::class, 'store'])->name('add_port_category.store');
    Route::get('/dashboard/edit_port_category/{id}', [PortfolioController::class, 'edit'])->name('edit_port_category.edit');
    Route::put('/dashboard/edit_port_category/{id}', [PortfolioController::class, 'update'])->name('edit_port_category.update');
    Route::delete('/dashboard/Portfolio_category/{id}', [PortfolioController::class, 'destroy'])->name('Portfolio_category.destroy');

    ////Portfolio Gallery  Route //////////////////////////////////
    Route::get('/dashboard/Portfolio_gallery',[PortfolioImageController::class, 'index'])->name('Portfolio_gallery.index');
    Route::get('/dashboard/add_port_gallery',[PortfolioImageController::class, 'create'])->name('add_port_gallery.create');
    Route::post('/dashboard/add_port_gallery',[PortfolioImageController::class, 'store'])->name('add_port_gallery.store');
    Route::get('/dashboard/edit_port_gallery/{id}', [PortfolioImageController::class, 'edit'])->name('edit_port_gallery.edit');
    Route::put('/dashboard/edit_port_gallery/{id}', [PortfolioImageController::class, 'update'])->name('edit_port_gallery.update');
    Route::delete('/dashboard/Portfolio_gallery/{id}', [PortfolioImageController::class, 'destroy'])->name('Portfolio_gallery.destroy');




