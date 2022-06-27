<?php

use Illuminate\Support\Facades\Route;


Route::get('/check', function () {
    echo "admin route";
});

Route::get('/admin-login', [App\Http\Controllers\Auth\LoginController::class, 'adminLogin'])->name('admin.login');
//Route::get('/admin', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home')->middleware('is_admin');

Route::group(['namespace' =>'App\Http\Controllers\Admin','middleware' => 'is_admin'], function(){
 Route::get('/admin/home','AdminController@admin')->name('admin.home');
    Route::get('/admin/logout','AdminController@logout')->name('admin.logout');
    Route::get('/admin/password/change','AdminController@PasswordChange')->name('admin.password.change');
    Route::post('/admin/password/update','AdminController@PasswordUpdate')->name('admin.password.update');

    //Category
    Route::group(['prefix'=> 'category'], function(){
        Route::get('/','CategoryController@index')->name('category.index');
        Route::post('/store','CategoryController@store')->name('category.store');
        Route::get('/delete/{id}','CategoryController@destroy')->name('category.delete');
        Route::get('/edit/{id}','CategoryController@edit');
        Route::post('/update','CategoryController@update')->name('category.update');
    });
    //Global routes
    Route::get('/get-child-category/{id}','CategoryController@GetChildcategory');
    Route::get('/get-subcategory','SubcategoryController@Getsubcategory')->name('subcategorylistshow');
//Sub Category
    Route::group(['prefix'=> 'subcategory'], function(){
        Route::get('/','SubcategoryController@index')->name('subcategory.index');
        Route::post('/store','SubcategoryController@store')->name('subcategory.store');
        Route::get('/delete/{id}','SubcategoryController@destroy')->name('subcategory.delete');
        Route::get('/edit/{id}','SubcategoryController@edit');
        Route::post('/update','SubcategoryController@update')->name('subcategory.update');

    });



    //child Category
    Route::group(['prefix'=> 'childcategory'], function(){
        Route::get('/','childcategoryController@index')->name('childcategory.index');
        Route::post('/store','childcategoryController@store')->name('childcategory.store');
        Route::get('/delete/{id}','childcategoryController@destroy')->name('childcategory.delete');
        Route::get('/edit/{id}','childcategoryController@edit');
        Route::post('/update','childcategoryController@update')->name('childcategory.update');

    });

    //Brand
    Route::group(['prefix'=> 'brand'], function(){
        Route::get('/','BrandController@index')->name('brand.index');
        Route::post('/store','BrandController@store')->name('brand.store');
        Route::get('/delete/{id}','BrandController@destroy')->name('brand.delete');
        Route::get('/edit/{id}','BrandController@edit');
        Route::post('/update','BrandController@update')->name('brand.update');

    });
    //Slider
    Route::group(['prefix'=> 'slider'], function(){
        Route::get('/','SliderController@index')->name('slider.index');
        Route::post('/store','SliderController@store')->name('slider.store');
        Route::get('/delete/{id}','SliderController@destroy')->name('slider.delete');
        Route::get('/edit/{id}','SliderController@edit');
        Route::post('/update','SliderController@update')->name('slider.update');

        Route::get('/activestatus/{id}','SliderController@Activestatus');
        Route::get('/deactivestatus/{id}','SliderController@Deactivestatus');


    });
    //Coupon
    Route::group(['prefix'=> 'coupon'], function(){
        Route::get('/','CouponController@index')->name('coupon.index');
        Route::post('/store','CouponController@store')->name('coupon.store');
        Route::delete('/delete/{id}','CouponController@destroy')->name('coupon.delete');
        Route::get('/edit/{id}','CouponController@edit');
        Route::post('/update','CouponController@update')->name('coupon.update');

    });
    //Warehouse
    Route::group(['prefix'=> 'warehouse'], function(){
        Route::get('/','WarehouseController@index')->name('warehouse.index');
        Route::post('/store','WarehouseController@store')->name('warehouse.store');
        Route::get('/delete/{id}','WarehouseController@destroy')->name('warehouse.delete');
        Route::get('/edit/{id}','WarehouseController@edit');
        Route::post('/update','WarehouseController@update')->name('warehouse.update');

    });

    //Warehouse
    Route::group(['prefix'=> 'pickup_point'], function(){
        Route::get('/','PickuppointController@index')->name('pickup_point.index');
        Route::post('/store','PickuppointController@store')->name('pickup_point.store');
        Route::get('/delete/{id}','PickuppointController@destroy')->name('pickup_point.delete');
        Route::get('/edit/{id}','PickuppointController@edit');
        Route::post('/update','PickuppointController@update')->name('pickup_point.update');

    });
    //user Controller

    Route::group(['prefix'=> 'user'], function(){
        Route::get('/','UserController@index')->name('user.index');
        Route::post('/store','UserController@store')->name('user.store');
        Route::get('/delete/{id}','UserController@destroy')->name('user.delete');
        Route::get('/edit/{id}','UserController@edit');
        Route::post('/update','UserController@update')->name('user.update');

    });

    //Role
    Route::group(['prefix'=> 'role'], function(){
        Route::get('/','RoleController@index')->name('role.index');
        Route::get('/create','RoleController@create')->name('role.create');
        Route::get('/store','RoleController@store')->name('role.store');
        Route::get('/delete/{id}','RoleController@destroy')->name('role.delete');
        Route::get('/edit/{id}','RoleController@edit')->name('role.edit');
        Route::post('/update','RoleController@update')->name('role.update');

    });

    //seo
    Route::group(['prefix'=> 'seo'], function(){
        Route::get('/','SeoController@index')->name('seo.index');
        Route::post('/update/{id}','SeoController@update')->name('seo.update');
    });
    //setting
    Route::group(['prefix'=> 'setting'], function(){
        Route::get('/','SettingController@index')->name('setting.index');
        Route::post('/update/{id}','SettingController@update')->name('setting.update');
    });

    //smtp
    Route::group(['prefix'=> 'smtp'], function(){
        Route::get('/','SmtpController@index')->name('smtp.index');
        Route::post('/update/{id}','SmtpController@update')->name('smtp.update');
    });

    //Page
    Route::group(['prefix'=> 'page'], function(){
        Route::get('/','PageController@index')->name('page.index');
        Route::get('/create','PageController@create')->name('page.create');
        Route::post('/store','PageController@store')->name('page.store');
        Route::get('/delete/{id}','PageController@destroy')->name('page.delete');
        Route::get('/edit/{id}','PageController@edit')->name('page.edit');
        Route::post('/update/{id}','PageController@update')->name('page.update');

    });

    //Campaign
    Route::group(['prefix'=> 'campaign'], function(){
        Route::get('/','CampaignsController@index')->name('campaign.index');
        Route::get('/create','CampaignsController@create')->name('campaign.create');
        Route::post('/store','CampaignsController@store')->name('campaign.store');
        Route::get('/delete/{id}','CampaignsController@destroy')->name('campaign.delete');
        Route::get('/edit/{id}','CampaignsController@edit');
        Route::post('/update','CampaignsController@update')->name('campaign.update');


    });

    //Product
    Route::group(['prefix'=> 'product'], function(){
        Route::get('/','ProductController@index')->name('product.index');
        Route::get('/create','ProductController@create')->name('product.create');
        Route::get('/show','ProductController@show')->name('product.show');
        Route::post('/store','ProductController@store')->name('product.store');
        Route::get('/delete/{id}','ProductController@destroy')->name('product.delete');
        Route::get('/edit/{id}','ProductController@edit')->name('product.edit');
        Route::post('/update/{id}','ProductController@update')->name('product.update');


        Route::get('/activefeatured/{id}','ProductController@Activefeatured');
        Route::get('/deactivefeatured/{id}','ProductController@Deactivefeatured');

        Route::get('/activetodaysdeal/{id}','ProductController@Activetodaysdeal');
        Route::get('/deactivetodaysdeal/{id}','ProductController@Deactivetodaysdeal');

        Route::get('/activestatus/{id}','ProductController@Activestatus');
        Route::get('/deactivestatus/{id}','ProductController@Deactivestatus');
    });



});
