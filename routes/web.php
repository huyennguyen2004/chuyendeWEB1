<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\frontend\ProductController as SanphamController;
use App\Http\Controllers\frontend\ContactController as LienheController;
use App\Http\Controllers\frontend\AboutUsController;
use App\Http\Controllers\frontend\PostController as BaivietController;
use App\Http\Controllers\frontend\PolicyController;
use App\Http\Controllers\frontend\FaqController;
use App\Http\Controllers\frontend\BlogController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\SearchController;
//
use App\Http\Controllers\UserAuthController;
//
use App\Http\Controllers\backend\BrandController;
use App\Http\Controllers\backend\DashboardController;
use App\Http\Controllers\backend\ProductController;
use App\Http\Controllers\backend\CategoryController;
use App\Http\Controllers\backend\ContactController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\MenuController;
use App\Http\Controllers\backend\OrderController;
use App\Http\Controllers\backend\PostController;
use App\Http\Controllers\backend\TopicController;
use App\Http\Controllers\backend\UserController;

///frontend
Route::get('/', [HomeController::class, 'index'])->name("site.home");
Route::get('/product', [SanphamController::class, 'index'])->name("site.product");
Route::get('/product/by-brand/{brand_id}', [SanphamController::class, 'showByBrand'])->name('site.product.brand');
Route::get('/product_detail/{slug}', [SanphamController::class, 'product_detail'])->name("site.product.detail");
Route::get('/category/{slug}', [SanphamController::class, 'category'])->name("site.product.category");
Route::get('/contact', [LienheController::class, 'index'])->name("site.contact");
Route::post('/contact/send', [LienheController::class, 'send'])->name('contact.send');
Route::get('/about-us', [AboutUsController::class, 'index'])->name("site.about-us");
Route::get('/cart', [CartController::class, 'index'])->name('site.cart');
Route::post('/cart/add', [CartController::class, 'addToCart'])->name('site.cart.add');
Route::get('/topic/{slug}', [BaivietController::class, 'topic'])->name('topic.posts');
Route::get('/post', [BaivietController::class, 'index'])->name('site.post');
Route::get('/post/{slug}', [BaivietController::class, 'post_detail'])->name('site.post.detail');
Route::get('/policy', [PolicyController::class, 'index'])->name("site.policy");
Route::get('/chinh-sach-mua-hang', [PolicyController::class, 'purchasePolicy'])->name('policy.purchase');
Route::get('/chinh-sach-bao-hanh', [PolicyController::class, 'warrantyPolicy'])->name('policy.warranty');
Route::get('/chinh-sach-van-chuyen', [PolicyController::class, 'shippingPolicy'])->name('policy.shipping');
Route::get('/chinh-sach-doi-tra', [PolicyController::class, 'returnPolicy'])->name('policy.return');
Route::get('/search', [SearchController::class, 'search'])->name('site.search');
Route::get('/privacy-policy', [PolicyController::class, 'privacyPolicy'])->name('policy.privacy');
Route::get('/faq', [FaqController::class, 'index'])->name('faq.index');
Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
//dang nhap
Route::get('/login', [UserAuthController::class, 'getlogin'])->name("site.getlogin");
Route::post('/login', [UserAuthController::class, 'dologin'])->name("site.dologin");
//dang xuat
Route::get('/logout', [UserAuthController::class, 'logout'])->name("site.logout");
// /backend->middleware("middleauth")
Route::prefix("admin")
    ->group(function () {
        Route::get("/", [DashboardController::class, "index"])->name("admin.dashboard.index");
        //product
        Route::prefix("product")->group(function () {
            Route::get("/", [ProductController::class, "index"])->name("admin.product.index");
            Route::get("trash", [ProductController::class, "trash"])->name("admin.product.trash");
            Route::get("create", [ProductController::class, "create"])->name("admin.product.create");
            Route::post("store", [ProductController::class, "store"])->name("admin.product.store");
            Route::get("edit/{id}", [ProductController::class, "edit"])->name("admin.product.edit");
            Route::put("update/{id}", [ProductController::class, "update"])->name("admin.product.update");
            Route::get("status/{id}", [ProductController::class, "status"])->name("admin.product.status");
            Route::get("delete/{id}", [ProductController::class, "delete"])->name("admin.product.delete");
            Route::get("restore/{id}", [ProductController::class, "restore"])->name("admin.product.restore");
            Route::delete("destroy/{id}", [ProductController::class, "destroy"])->name("admin.product.destroy");
            Route::get('show/{id}', [ProductController::class, 'show'])->name('admin.product.show');
        });
        //category
        Route::prefix("category")->group(function () {
            Route::get("/", [CategoryController::class, "index"])->name("admin.category.index");
            Route::get("trash", [CategoryController::class, "trash"])->name("admin.category.trash");
            Route::post("store", [CategoryController::class, "store"])->name("admin.category.store");
            Route::get("edit/{id}", [CategoryController::class, "edit"])->name("admin.category.edit");
            Route::put("update/{id}", [CategoryController::class, "update"])->name("admin.category.update");
            Route::get("status/{id}", [CategoryController::class, "status"])->name("admin.category.status");
            Route::get("delete/{id}", [CategoryController::class, "delete"])->name("admin.category.delete");
            Route::get("restore/{id}", [CategoryController::class, "restore"])->name("admin.category.restore");
            Route::delete("destroy/{id}", [CategoryController::class, "destroy"])->name("admin.category.destroy");
            Route::get('show/{id}', [CategoryController::class, 'show'])->name('admin.category.show');
        });
        //brand
        Route::prefix("brand")->group(function () {
            Route::get("/", [BrandController::class, "index"])->name("admin.brand.index");
            Route::get('show/{id}', [BrandController::class, 'show'])->name('admin.brand.show');
            Route::get("trash", [BrandController::class, "trash"])->name("admin.brand.trash");
            Route::post("store", [BrandController::class, "store"])->name("admin.brand.store");
            Route::get("edit/{id}", [BrandController::class, "edit"])->name("admin.brand.edit");
            Route::put("update/{id}", [BrandController::class, "update"])->name("admin.brand.update");
            Route::get("status/{id}", [BrandController::class, "status"])->name("admin.brand.status");
            Route::get("delete/{id}", [BrandController::class, "delete"])->name("admin.brand.delete");
            Route::get("restore/{id}", [BrandController::class, "restore"])->name("admin.brand.restore");
            Route::delete("destroy/{id}", [BrandController::class, "destroy"])->name("admin.brand.destroy");
        });
        //contact
        Route::prefix('contact')->group(function () {
            Route::get('/', [ContactController::class, 'index'])->name('admin.contact.index');
            Route::get('/contact/search', [ContactController::class, 'search'])->name('admin.contact.search');
            Route::get('trash', [ContactController::class, 'trash'])->name('admin.contact.trash');
            Route::get('show/{id}', [ContactController::class, 'show'])->name('admin.contact.show');
            Route::get('edit/{id}', [ContactController::class, 'edit'])->name('admin.contact.edit');
            Route::get("status/{id}", [ContactController::class, "status"])->name("admin.contact.status");
            Route::put('update/{id}', [ContactController::class, 'update'])->name('admin.contact.update');
            Route::get('delete/{id}', [ContactController::class, 'delete'])->name('admin.contact.delete');
            Route::get('restore/{id}', [ContactController::class, 'restore'])->name('admin.contact.restore');
            Route::delete('destroy/{id}', [ContactController::class, 'destroy'])->name('admin.contact.destroy');
        });
        //banner
        Route::prefix('banner')->group(function () {
            Route::get('/', [BannerController::class, 'index'])->name('admin.banner.index');
            Route::get('trash', [BannerController::class, 'trash'])->name('admin.banner.trash');
            Route::post('store', [BannerController::class, 'store'])->name('admin.banner.store');
            Route::get('edit/{id}', [BannerController::class, 'edit'])->name('admin.banner.edit');
            Route::put('update/{id}', [BannerController::class, 'update'])->name('admin.banner.update');
            Route::get('status/{id}', [BannerController::class, 'status'])->name('admin.banner.status');
            Route::get('delete/{id}', [BannerController::class, 'delete'])->name('admin.banner.delete');
            Route::get('restore/{id}', [BannerController::class, 'restore'])->name('admin.banner.restore');
            Route::delete('destroy/{id}', [BannerController::class, 'destroy'])->name('admin.banner.destroy');
            Route::get('show/{id}', [BannerController::class, 'show'])->name('admin.banner.show');
        });
        //menu
        Route::prefix('menu')->group(function () {
            Route::get('/', [MenuController::class, 'index'])->name('admin.menu.index');
            Route::get('trash', [MenuController::class, 'trash'])->name('admin.menu.trash');
            Route::get('show/{id}', [MenuController::class, 'show'])->name('admin.menu.show');
            Route::get('edit/{id}', [MenuController::class, 'edit'])->name('admin.menu.edit');
            Route::put('update/{id}', [MenuController::class, 'update'])->name('admin.menu.update');
            Route::get('status/{id}', [MenuController::class, 'status'])->name('admin.menu.status');
            Route::get('delete/{id}', [MenuController::class, 'delete'])->name('admin.menu.delete');
            Route::get('restore/{id}', [MenuController::class, 'restore'])->name('admin.menu.restore');
            Route::delete('destroy/{id}', [MenuController::class, 'destroy'])->name('admin.menu.destroy');
        });
        //order
        Route::prefix('order')->group(function () {
            Route::get('/', [OrderController::class, 'index'])->name('admin.order.index');
            Route::get('status/{id}', [OrderController::class, 'status'])->name('admin.order.status');
            Route::get('/order/search', [OrderController::class, 'search'])->name('admin.order.search');
            Route::get('show/{id}', [OrderController::class, 'show'])->name('admin.order.show');
            Route::get('delete/{id}', [OrderController::class, 'delete'])->name('admin.order.delete');
            Route::get('trash', [OrderController::class, 'trash'])->name('admin.order.trash');
            Route::get('restore/{id}', [OrderController::class, 'restore'])->name('admin.order.restore');
            Route::delete('destroy/{id}', [OrderController::class, 'destroy'])->name('admin.order.destroy');
        });

        //post
        Route::prefix('post')->group(function () {
            Route::get('/', [PostController::class, 'index'])->name('admin.post.index');
            Route::get('trash', [PostController::class, 'trash'])->name('admin.post.trash');
            Route::get('create', [PostController::class, 'create'])->name('admin.post.create');
            Route::post('store', [PostController::class, 'store'])->name('admin.post.store');
            Route::get('show/{id}', [PostController::class, 'show'])->name('admin.post.show');
            Route::get('edit/{id}', [PostController::class, 'edit'])->name('admin.post.edit');
            Route::put('update/{id}', [PostController::class, 'update'])->name('admin.post.update');
            Route::get('status/{id}', [PostController::class, 'status'])->name('admin.post.status');
            Route::get('delete/{id}', [PostController::class, 'delete'])->name('admin.post.delete');
            Route::get('restore/{id}', [PostController::class, 'restore'])->name('admin.post.restore');
            Route::delete('destroy/{id}', [PostController::class, 'destroy'])->name('admin.post.destroy');
        });

        // topic 
        Route::prefix('topic')->group(function () {
            Route::get('/', [TopicController::class, 'index'])->name('admin.topic.index');
            Route::post('store', [TopicController::class, 'store'])->name('admin.topic.store');
            Route::get('edit/{id}', [TopicController::class, 'edit'])->name('admin.topic.edit');
            Route::put('update/{id}', [TopicController::class, 'update'])->name('admin.topic.update');
            Route::get('show/{id}', [TopicController::class, 'show'])->name('admin.topic.show');
            Route::get('status/{id}', [TopicController::class, 'status'])->name('admin.topic.status');
            Route::get('delete/{id}', [TopicController::class, 'delete'])->name('admin.topic.delete');
            Route::get('trash', [TopicController::class, 'trash'])->name('admin.topic.trash');
            Route::get('restore/{id}', [TopicController::class, 'restore'])->name('admin.topic.restore');
            Route::delete('destroy/{id}', [TopicController::class, 'destroy'])->name('admin.topic.destroy');
        });


        // user 
        Route::prefix('user')->group(function () {
            Route::get('/', [UserController::class, 'index'])->name('admin.user.index');
            Route::get('trash', [UserController::class, 'trash'])->name('admin.user.trash');
            Route::get('create', [UserController::class, 'create'])->name('admin.user.create');
            Route::post('store', [UserController::class, 'store'])->name('admin.user.store');
            Route::get('edit/{id}', [UserController::class, 'edit'])->name('admin.user.edit');
            Route::put('update/{id}', [UserController::class, 'update'])->name('admin.user.update');
            Route::get('status/{id}', [UserController::class, 'status'])->name('admin.user.status');
            Route::get('delete/{id}', [UserController::class, 'delete'])->name('admin.user.delete');
            Route::get('restore/{id}', [UserController::class, 'restore'])->name('admin.user.restore');
            Route::delete('destroy/{id}', [UserController::class, 'destroy'])->name('admin.user.destroy');
            Route::get('show/{id}', [UserController::class, 'show'])->name('admin.user.show');
        });
    });