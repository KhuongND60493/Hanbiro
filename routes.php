<?php
Use Modules\Ko\Entities\Master;

Route::group(['middleware' => 'api', 'prefix' => 'api/ko', 'namespace' => 'Modules\Ko\Http\Controllers\Api'], function()
{
    config(['jwt.user' => Master::class]);
    config(['auth.providers.users.model' => Master::class]);

    Route::post('logout', 'AuthController@logout')->name('logout');
    Route::get('user', 'AuthController@user')->name('user');
    Route::get('refresh', 'AuthController@refresh')->name('refresh');

    Route::resource('board.article', 'BoardController');
    Route::delete('board/articles', 'BoardController@deleteMultiple')->name('board.article.deleteMultiple');

    Route::delete('boardfile/{boardfile}', 'BoardfileController@destroy')->name('boardfile.destroy');

    Route::resource('master', 'MasterController');
    Route::delete('masters', 'MasterController@deleteMultiple')->name('master.deleteMultiple');

    Route::resource('popup', 'PopupController');
    Route::delete('popups', 'PopupController@deleteMultiple')->name('popup.deleteMultiple');
});

Route::post('api/ko/login', 'Modules\Ko\Http\Controllers\Api\AuthController@login')->name('login');
Route::get('api/ko/test',function(){
return 'helloworld';
});
