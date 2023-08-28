<?php

use App\Http\Controllers\Client\CartController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Client\CheckoutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Client\DetailController;
use App\Http\Controllers\Client\ForgotPassword;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Client\ShopController;
use App\Http\Controllers\Admin\UserDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;

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

//user routes
    #ForgotPassword
    Route::get('/forgotpassword', [ForgotPassword::class, 'forgotpassword'])->name('client.forgotpassword');
    Route::post('/tokenEmail', [ForgotPassword::class, 'tokenEmail'])->name('client.tokenEmail');
    Route::get('/checkToken', [ForgotPassword::class, 'checkToken'])->name('client.checkToken');
    Route::post('/handleToken', [ForgotPassword::class, 'handleToken'])->name('client.handleToken');
    Route::post('/changePassword', [ForgotPassword::class, 'changePassword'])->name('client.changePassword');
    #checkoutUser
    Route::get('/logoutuser', [AuthController::class, 'logoutuser'])->name('auth.logoutuser');
    #HomePage
    Route::get('/', [HomeController::class, 'homepage'])->name('client.homepage');
    Route::get('/homepage/{id}', [HomeController::class, 'homepage_show'])->name('client.homepage_show');
    Route::post('/addtocart', [HomeController::class, 'addtocart'])->name('client.addtocart');
    #ShopPage
    Route::get('/shoppage', [ShopController::class, 'shoppage'])->name('client.shoppage');
    Route::get('/shopsearch', [ShopController::class, 'shopsearch'])->name('client.shopsearch');
    Route::get('/searchbydecrease', [ShopController::class, 'searchbydecrease'])->name('client.searchbydecrease');
    Route::get('/searchbyincrease', [ShopController::class, 'searchbyincrease'])->name('client.searchbyincrease');
    Route::get('/searchbyprice', [ShopController::class, 'searchbyprice'])->name('client.searchbyprice');
    #DetailPage
    Route::get('/detailpage', [DetailController::class, 'detailpage'])->name('client.detailpage');
    Route::post('/detailpage/addtocartdetail', [DetailController::class, 'addtocartdetail'])->name('client.addtocartdetail');
    #CartPage
    Route::get('/cartpage', [CartController::class, 'index'])->name('client.cartpage');
    Route::post('/cartpage/updatequantity', [CartController::class, 'updatequantity'])->name('client.updatequantity');
    Route::post('/cartpage/deleteproductcart', [CartController::class, 'deleteproductcart'])->name('client.deleteproductcart');
    #ContactPage
    Route::get('/contactpage', [HomeController::class, 'contactpage'])->name('client.contactpage');
    #CheckoutPage
    Route::get('/checkoutpage', [CheckoutController::class, 'index'])->name('client.checkoutpage')->middleware(['checklogin','profileuser']);
    Route::post('/checkoutpage/addorder', [CheckoutController::class, 'addorder'])->name('client.addorder');
    #EditProfile
    Route::get('/edit', [HomeController::class, 'edit'])->name('client.edit');
    Route::post('/update/{id}', [HomeController::class, 'updateprofile'])->name('client.update');

//admin routes
Route::prefix('admin')->middleware('checkrole')->group(function () {

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    #Dashboard
    Route::prefix('dashboard')->group(function () {
        Route::get('/index', [DashboardController::class, 'index'])->name('dashboard.index');
        Route::get('/search', [DashboardController::class, 'search'])->name('dashboard.search');
        Route::get('/create', [DashboardController::class, 'create'])->name('dashboard.create');
        Route::post('/store', [DashboardController::class, 'store'])->name('dashboard.store');
        Route::get('/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
        Route::post('/update/{id}', [DashboardController::class, 'update'])->name('dashboard.update');
        Route::delete('/delete/{id}', [DashboardController::class, 'destroy'])->name('dashboard.delete');
    });

    #Category
    Route::prefix('category')->group(function () {
        Route::get('/index', [CategoryController::class, 'index'])->name('category.index');
        Route::get('/search', [CategoryController::class, 'search'])->name('category.search');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::post('/update/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    });
    #Producer
    Route::prefix('producer')->group(function () {
        Route::get('/index', [ProducerController::class, 'index'])->name('producer.index');
        Route::get('/search', [ProducerController::class, 'search'])->name('producer.search');
        Route::get('/create', [ProducerController::class, 'create'])->name('producer.create');
        Route::post('/store', [ProducerController::class, 'store'])->name('producer.store');
        Route::get('/edit/{id}', [ProducerController::class, 'edit'])->name('producer.edit');
        Route::post('/update/{id}', [ProducerController::class, 'update'])->name('producer.update');
        Route::delete('/delete/{id}', [ProducerController::class, 'destroy'])->name('producer.delete');
    });
    #Product
    Route::prefix('product')->group(function () {
        Route::get('/index', [ProductController::class, 'index'])->name('product.index');
        Route::get('/search', [ProductController::class, 'search'])->name('product.search');
        Route::get('/create', [ProductController::class, 'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::post('/update/{id}', [ProductController::class, 'update'])->name('product.update');
        Route::delete('/delete/{id}', [ProductController::class, 'destroy'])->name('product.delete');
    });

    #User
    Route::prefix('user')->group(function () {
        Route::get('/index', [UserController::class, 'index'])->name('user.index');
        Route::get('/search', [UserController::class, 'search'])->name('user.search');
        Route::get('/create', [UserController::class, 'create'])->name('user.create');
        Route::post('/register', [UserController::class, 'register'])->name('user.register');
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::get('/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/update/{id}', [UserController::class, 'update'])->name('user.update');
        Route::get('/show/{id}', [UserController::class, 'show'])->name('user.show');
        Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');
    });
    #Role
    Route::prefix('role')->group(function () {
        Route::get('/index', [RoleController::class, 'index'])->name('role.index');
        Route::get('/search', [RoleController::class, 'search'])->name('role.search');
        Route::get('/create', [RoleController::class, 'create'])->name('role.create');
        Route::post('/store', [RoleController::class, 'store'])->name('role.store');
        Route::get('/edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
        Route::post('/update/{id}', [RoleController::class, 'update'])->name('role.update');
        Route::get('/show/{id}', [RoleController::class, 'show'])->name('role.show');
        Route::delete('/delete/{id}', [RoleController::class, 'destroy'])->name('role.delete');

    });
    #UserDetail
    Route::prefix('userdetail')->group(function () {
        Route::get('/index', [UserDetailController::class, 'index'])->name('userdetail.index');
        Route::get('/search', [UserDetailController::class, 'search'])->name('userdetail.search');
        Route::get('/edit', [UserDetailController::class, 'edit'])->name('userdetail.edit');
        Route::post('/update/{id}', [UserDetailController::class, 'updateprofile'])->name('userdetail.update');
    });
    #Order
    Route::prefix('order')->group(function () {
        Route::get('/index', [OrderController::class, 'index'])->name('order.index');
        Route::get('/search', [OrderController::class, 'search'])->name('order.search');
        Route::get('/edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::post('/update/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::get('/detail/{id}', [OrderController::class, 'detail'])->name('order.detail');
    });



});
#Login and Register 
Route::prefix('authentications')->group(function () {
    #Admin
    Route::prefix('/admin')->group(function () {
        Route::get('/login', [AuthController::class, 'login'])->name('auth.login');
        Route::post('/store', [AuthController::class, 'store'])->name('auth.store');
        Route::post('/checklogin', [AuthController::class, 'checklogin'])->name('auth.checkLogin');
    });
    #User
    Route::prefix('/user')->group(function () {
        Route::get('/register', [AuthController::class, 'register'])->name('auth.register');
        Route::get('/loginuser', [AuthController::class, 'loginuser'])->name('auth.loginuser');
        Route::post('/checkloginUser', [AuthController::class, 'checkloginUser'])->name('auth.checkLoginUser');
    });

});

