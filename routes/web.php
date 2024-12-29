<?php
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\UserController;


// Guest Route
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::get('/post-register', [AuthController::class, 'post_register'])->name('post.register');

    Route::post('/post-login', [AuthController::class, 'login'])->middleware('guest');
});

// Admin Route
Route::group(['middleware' => 'admin'], function () {
    Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // produc Route
    // index sebelumnya adalah dashboard
    Route::get('/product',[ProductController::class, 'index'])->name('admin.product');

    Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');

    // Route::get('/admin', function () {
    //     return view('pages.admin.index');
    // })->name('admin.dashboard');

    Route::get('/admin-logout', [AuthController::class, 'admin_logout'])
        ->name('admin.logout')
        ->middleware('admin');

    // route admin produk
    Route::get('/admin/product/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');

    // route admin product edit
    Route::get('/product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');

    // route admin produk hapus
    Route::delete('/product/delete/{id}',[ProductController::class, 'delete'])->name('product.delete');


    // // route untuk distributor
    // Route::get('/distributor', [DistributorController::class, 'distributor'])->name('admin.distributor');

    //   // Tambahkan route create dan store
    // Route::get('/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    // Route::post('/distributor/store', [DistributorController::class, 'store'])->name('distributor.store');

    //     // Tambahkan route delete
    // Route::get('/distributor/delete/{id}', [DistributorController::class, 'delete'])->name('distributor.delete');

    // // Tambahkan route edit dan update
    // Route::get('/distributor/edit/{id}', [DistributorController::class, 'edit'])->name('distributor.edit');
    // Route::post('/distributor/update/{id}', [DistributorController::class, 'update'])->name('distributor.update');

    // Route::post('/distributor/import', [DistributorController::class, 'import'])->name('distributor.import');
    // Route::get('/distributor/export', [DistributorController::class, 'export'])->name('distributor.export');
});
// Route::group(['middleware' => 'admin'], function() {
//     Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin.dashboard');
//     Route::get('/admin/product/detail/{id}', [ProdctController::class, 'detail'])->name('product.detail');

//     // Product Route
//     Route::get('/product',[ProductController::class,'index'])->name('admin.product');
//     Route::get('/product/create', [ProductController::class, 'create'])->name('product.create');
//     Route::post('/product/store', [ProductController::class, 'store'])->name('product.store');
//     Route::get('/product/edit{id}', [ProductController::class, 'edit'])->name('product.edit');
//     Route::get('/product/update/{id}', [ProductController::class, 'update'])->name('product.update');
//     Route::delete('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');


//     Route::get('/admin-logout', [AuthController::class, 'admin_logout'])->name('admin.logout');
// });


// User Route
Route::group(['middleware' => 'web'], function() {
    Route::get('/user',[UserController::class,'index'])->name('user.dashboard');
    Route::get('/user-logout', [AuthController::class, 'user_logout'])->name('user.logout');

    // Route Product
    Route::get('/user/product/detail/{id}', [UserController::class, 'detail_product'])->name('user.detail.product');
    Route::get('/product/purchase/{productId}/{userId}', [UserController::class, 'purchase']);

});

// Distributor Route
Route::get('/distributors', [ListController::class, 'showDistributors']);
