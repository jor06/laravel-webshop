<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Api\AllproductController;
use App\Http\Controllers\DetailController;
use App\Models\Allproduct;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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



Route::get('/contact', function () {
    return view('contact');
});


Auth::routes();


//ADMIN ROUTES
Route::get('/admin/', [AdminController::class, 'index'])->name('admin');

//ADMIN USER ROUTES
Route::get('/admin/users', [UserController::class, 'index'])->name('index.users');
Route::get('/admin/users/show/{id}', [UserController::class, 'showUser'])->name('show.user');
Route::get('/admin/users/create', [UserController::class, 'createUser'])->name('create.user');
Route::post('/admin/users/store', [UserController::class, 'storeUser'])->name('store.user');
Route::get('/admin/users/edit/{id}', [UserController::class, 'editUser'])->name('edit.user');
Route::post('/admin/users/update/{id}', [UserController::class, 'updateUser'])->name('update.user');
Route::get('/admin/users/delete/{id}', [UserController::class, 'deleteUser'])->name('delete.user');

//ADMIN PRODUCT ROUTES
Route::get('/admin/products', [ProductController::class, 'index'])->name('index.products');
Route::get('/admin/products/show/{id}', [ProductController::class, 'showProduct'])->name('show.product');
Route::get('/admin/products/create', [ProductController::class, 'createProduct'])->name('create.product');
Route::get('/admin/products/store', [ProductController::class, 'storeProduct'])->name('store.product');
Route::get('/admin/products/edit/{id}', [ProductController::class, 'editProduct'])->name('edit.product');
Route::post('/admin/products/update/{id}', [ProductController::class, 'updateProduct'])->name('update.product');
Route::get('/admin/products/delete/{id}', [ProductController::class, 'deleteProduct'])->name('delete.product');

//ADMIN CATEGORY ROUTES
Route::get('/admin/category', [CategoryController::class, 'index'])->name('index.categories');
Route::get('admin/category/all', [CategoryController::class, 'AllCategory'])->name('all.category');
Route::post('admin/category/add', [CategoryController::class, 'AddCategory'])->name('store.category');
Route::get('admin/category/edit/{id}', [CategoryController::class, 'Edit']);
Route::post('admin/category/update/{id}', [CategoryController::class, 'Update']);
Route::get('admin/softdelete/category/{id}', [CategoryController::class, 'SoftDelete']);
Route::get('admin/category/restore/{id}', [CategoryController::class, 'Restore']);
Route::get('admin/pdelete/category/{id}', [CategoryController::class, 'Pdelete']);

Route::get('/admin/media', [AdminController::class, 'media']);
Route::get('/admin/stock', [AdminController::class, 'stock']);

Route::get('/home', function () {
    return view('home');
});

Route::get('/products', function () {
    return view('webshop');
});
Route::get('/checkout', function () {
    return view('checkout');
});



Route::view('/products',['home']);
Route::view('/machines', ['machines']);
Route::view('/beans', ['beans']);
Route::view('/cups', ['cups']);
Route::get('/detail/{id}',[DetailController::class, 'index'])->name('product.detail');


Route::middleware(['auth:sanctum', 'verified'])->get('/admin/users/index', function () {
    //  $users = DB::table('users')->get();
    $users = User::all();

    return view('admin.users.index', compact('users'));
})->name('all.users');


Route::view('/{any}', ['welcome']);
