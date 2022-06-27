<?php

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

/*Route::get('/', function () {
    return view('frontend.index');
});*/


    Auth::routes();
    Route::get('/login', function(){
        return redirect()->to('/');
    })->name('login');

    Route::get('/register', function(){
        return redirect()->to('/');
    })->name('register');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customer/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('customer.logout');
//front end all routes
Route::group(['namespace' =>'App\Http\Controllers\Front'], function(){
    Route::get('/', 'IndexController@index');
    //product details
    Route::get('/product-details/{slug}', 'IndexController@ProductDetails')->name('product.details');
    //Quick view route
    Route::get('/allcart', 'CartController@AllCart')->name('all.cart');
    Route::group(['prefix'=> 'qv'], function(){
        Route::get('/product-quick-view/{id}', 'IndexController@ProductQuickView')->name('product.quick.view');
        Route::post('/addtocart', 'CartController@AddToCart')->name('add.to.cart');
        Route::get('/my-cart', 'CartController@MyCart')->name('cart');
        Route::get('/cart/empty', 'CartController@EmptyCart')->name('cart.empty');
        Route::get('/cartproduct/remove/{rowId}', 'CartController@RemoveProduct')->name('cartproduct.remove');
        Route::get('/cartproduct/updateqty/{rowId}/{qty}', 'CartController@UpdateQty')->name('cartproduct.updateqty');
        Route::get('/checkout', 'CheckoutController@Checkout')->name('checkout');
        Route::get('/billingaddress', 'CheckoutController@BillingAddress')->name('billingaddress');

    });
    //category wise product route
    Route::get('/category/wise/product/{id}', 'CategoryproductsController@CategoryWiseProduct')->name('categorywise.product');

    //subcategory wise product route
    Route::get('/subcategory/wise/product/{id}', 'CategoryproductsController@SubcategoryWiseProduct')->name('subcategorywise.product');

    //childcategory wise product route
    Route::get('/childcategory/wise/product/{id}', 'CategoryproductsController@ChildcategoryWiseProduct')->name('childcategorywise.product');

    //brand wise product route
    Route::get('/brand/wise/product/{id}', 'CategoryproductsController@BrandWiseProduct')->name('brandwise.product');

    //review route
    Route::post('/store/review', 'ReviewController@store')->name('product.review');

    //Wishlist route
    Route::get('/wishlist/home', 'WishlistController@WishlistHome')->name('wishlist.home');
    Route::get('/wishlist/clear', 'WishlistController@ClearWishlist')->name('wishlist.clear');
    Route::get('/wishlist/product/delete', 'WishlistController@ClearWishlist')->name('wishlist.product.delete');
    Route::post('/store/wishlist', 'WishlistController@store')->name('wishlist');
    Route::get('/add/wishlist/{id}', 'WishlistController@Addwishlist')->name('add.wishlist');

    //Profile route
    Route::get('/profile/home', 'ProfileController@ProfileHome')->name('profile.home');
    Route::get('/profile/setting', 'ProfileController@ProfileSetting')->name('profile.setting');
    Route::post('/profile/setting/update', 'ProfileController@ProfileSettingUpdate')->name('profile.setting.update');

   //Page Mange
    Route::get('/page/manage/{id}', 'IndexController@PageManage')->name('page.manage');

    //Page Mange
    Route::post('store/newsletter', 'IndexController@Newsletter')->name('store.newsletter');





});
