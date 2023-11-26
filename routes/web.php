<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DiscountCodeController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ChatbotController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\AnswerController;
use Facade\FlareClient\Http\Client;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CustomerInfoController;
use App\Http\Controllers\AdminController;
use App\Models\Order;
use App\Http\Controllers\DashboardController;

Route::get('/dashboard/user-stats', [DashboardController::class, 'userStats']);
Route::get('/dashboard/order-stats', [DashboardController::class, 'orderStats']);
Route::get('/dashboard/best-selling-product', [DashboardController::class, 'bestSellingProduct']);

Route::prefix('/blog/chat')->group(function(){
    Route::get('/', [ChatbotController::class, 'index']);
    Route::post('/ask', [ChatbotController::class, 'ask']);
    Route::get('/conversations', [ChatbotController::class, 'getAllConversations']);
    Route::post('/answer/{id}', [ChatbotController::class, 'answer']);
});

Route::prefix('/')->group(function(){
    Route::get('register',[RegisterController::class,'register']);
    Route::post('register',[RegisterController::class,'create']);
    Route::get('login',[LoginController::class,'index']);
    Route::post('login',[LoginController::class,'login']);
    Route::get('logout',[LogoutController::class,'index']);
});

// Route::get('/blog/discount/index', function () {
//     return view('blog.discount.index');
// });
// Route::get('/introduce', function () {
//     return view('blog/general/introduce');
// });
// Route::get('/information', function () {
//     return view('blog/general/information');
// });
Route::middleware(['role:admin'])->group(function () {
    Route::prefix('/blog/blog')->group(function(){
        Route::get('/',[BlogController::class,'index']);
        Route::get('/code',[BlogController::class,'code']);
        Route::get('/create',[BlogController::class,'create']);
        Route::post('/create',[BlogController::class,'store']);
        Route::get('/detail/{id}',[BlogController::class,'detail']);
        Route::get('/delete/{id}',[BlogController::class,'delete']);
        Route::get('/edit/{id}',[BlogController::class,'edit']);
        Route::post('/edit/{id}',[BlogController::class,'update']);
        Route::get('/api/products', [BlogController::class,'product']);
    });
    Route::prefix('blog/discount')->group(function(){
        Route::get('/create',[DiscountCodeController::class,'create']);
        Route::get('/index',[DiscountCodeController::class,'index']);
        Route::post('/store', [DiscountCodeController::class, 'store']);
    });
    Route::prefix('/blog/category')->group(function(){
        Route::get('/',[CategoryController::class,'index']);
        Route::get('/create',[CategoryController::class,'create']);
        Route::post('/create',[CategoryController::class,'store']);
        Route::get('/detail/{id}',[CategoryController::class,'detail']);
        Route::get('/delete/{id}',[CategoryController::class,'delete']);
    });
    Route::prefix('/')->group(function(){
        Route::get('register',[RegisterController::class,'register']);
        Route::post('register',[RegisterController::class,'create']);
        Route::get('login',[LoginController::class,'index']);
        Route::post('login',[LoginController::class,'login']);
        Route::get('logout',[LogoutController::class,'index']);
    });
    Route::prefix('/blog')->group(function () {
        Route::get('/orders', [AdminController::class, 'orders']);
        Route::post('/orders/{id}', [AdminController::class, 'updateStatus']);
        Route::get('/detail_order/{id}', [AdminController::class, 'detail_order']);

    });
    Route::get('/role', [AdminController::class, 'index']);
    Route::post('/update-role', [AdminController::class, 'updateRole']);


});
Route::patch('/update-cart-quantity/{cartItemId}/{userId}/{productId}', [CartController::class, 'updateQuantity']);
Route::middleware(['role:customer'])->group(function () {
    Route::prefix('/blog/client')->group(function(){
        Route::get('/',[ClientController::class,'index']);
        Route::get('/detail/{id}',[ClientController::class,'detail']);
        Route::get('/sort', [ClientController::class,'sort']);
        Route::get('/sort_up', [ClientController::class,'sort_up']);
        Route::get('/sort_down', [ClientController::class,'sort_down']);
        Route::get('/sort_man', [ClientController::class,'man']);
        Route::get('/sort_woman', [ClientController::class,'woman']);
        Route::get('/sale_off', [ClientController::class,'sale_off']);
        Route::get('/cart/add/{id}', [CartController::class,'addItem']);
        Route::get('/cart/remove/{user_id}/{id}', [CartController::class,'removeCartItem']);
        Route::get('/cart', [CartController::class,'index']);
        Route::post('/like/{product}', [LikeController::class,'likeProduct']);;
        Route::get('/likes/{product}', [LikeController::class,'getLikesCount']);
        Route::get('/likes/is-liked/{product}', [LikeController::class,'isLiked']);
        Route::post('update_quantity', [CartController::class, 'updateQuantity']);
        Route::get('/get-updated-cart', [CartController::class, 'getUpdatedCart']);
        Route::get('/order', [OrderController::class, 'Order']);
        Route::get('/detailOrder/{id}', [OrderController::class, 'detailOrder']);
    });
    Route::post('/create',[OrderController::class,'create_order']);
    Route::get('sale_order',[OrderController::class,'sale_order']);
    Route::post('/customer-info/store', [CustomerInfoController::class, 'store']);
    Route::prefix('/')->group(function(){
        Route::get('register',[RegisterController::class,'register']);
        Route::post('register',[RegisterController::class,'create']);
        Route::get('login',[LoginController::class,'index']);
        Route::post('login',[LoginController::class,'login']);
        Route::get('logout',[LogoutController::class,'index']);
    });
    Route::get('/introduce', function () {
        return view('blog/general/introduce');
    });
    Route::get('/information', function () {
        return view('blog/general/information');
    });
    Route::get('/contact', function () {
        return view('blog/client/contact');
    });

});


// Route::prefix('/')->group(function(){
//     Route::get('register',[RegisterController::class,'register']);
//     Route::post('register',[RegisterController::class,'create']);
//     Route::get('login',[LoginController::class,'index']);
//     Route::post('login',[LoginController::class,'login']);
//     Route::get('logout',[LogoutController::class,'index']);
// });


//create category
// Route::prefix('/blog/category')->group(function(){
//     Route::get('/',[CategoryController::class,'index']);
//     Route::get('/create',[CategoryController::class,'create']);
//     Route::post('/create',[CategoryController::class,'store']);
//     Route::get('/detail/{id}',[CategoryController::class,'detail']);
//     Route::get('/delete/{id}',[CategoryController::class,'delete']);
// });
//create blog
// Route::prefix('/blog/blog')->group(function(){
//     Route::get('/',[BlogController::class,'index']);
//     Route::get('/create',[BlogController::class,'create']);
//     Route::post('/create',[BlogController::class,'store']);
//     Route::get('/detail/{id}',[BlogController::class,'detail']);
//     Route::get('/delete/{id}',[BlogController::class,'delete']);
//     Route::get('/edit/{id}',[BlogController::class,'edit']);
//     Route::post('/edit/{id}',[BlogController::class,'update']);
//     Route::get('/api/products', [BlogController::class,'product']);
// });
// Route::prefix('/blog/client')->group(function(){
//     Route::get('/',[ClientController::class,'index']);
//     Route::get('/detail/{id}',[ClientController::class,'detail']);
//     Route::get('/sort', [ClientController::class,'sort']);
//     Route::get('/sort_up', [ClientController::class,'sort_up']);
//     Route::get('/sort_down', [ClientController::class,'sort_down']);
// });








