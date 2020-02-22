<?php

// routes/web.php

// 首頁
// Route: get('/', 'HomeController@indexPage');

// 使用者
Route::group(['prefix' => 'user'], function () {
    // 使用者驗證
    // TODO: 設定路由群組的前綴 -> 下方所有路由的前綴都會被加上auth
    Route::group(['prefix' => 'auth'], function () {
        // 使用者註冊頁面
        Route::get('/sign-up', 'User\UserAuthController@signUpPage');

        // 使用者資料新增
        Route::post('/sign-up', 'User\UserAuthController@signUpProcess');
        Route::get('/sign-in', 'User\UserAuthController@signInPage');
        Route::post('/sign-in', 'User\UserAuthController@signInProcess');
        Route::get('/sign-out', 'User\UserAuthController@signOut');
    });
});

// 商品
Route::group(['prefix' => 'merchandise'], function () {
    Route::get('/', 'Merchandise\MerchandiseController@merchandiseListPage');
    Route::get('/create', 'Merchandise\MerchandiseController@merchandiseCreateProcess');
    Route::get('/manage', 'Merchandise\MerchandiseController@merchandiseManageListPage');
    // 指定商品
    // TODO: {merchandise_id} -> 路由參數 -> 括號表示可以傳進去的參數
    Route::group(['prefix' => '{merchandise_id}'], function () {
        Route::get('/', 'MerchandiseController@merchandiseItemPage');
        Route::get('/edit', 'MerchandiseController@merchandiseItemEditPage');
        Route::put('/', 'MerchandiseController@merchandiseItemUpdateProcess');
        Route::post('/buy', 'MerchandiseController@merchandiseItemBuyProcess');
    });
});

// 交易
Route::get('/transaction', 'TransationController@transationListPage');
