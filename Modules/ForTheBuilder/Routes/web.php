<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Modules\ForTheBuilder\Http\Controllers\CalendarController;
use Modules\ForTheBuilder\Http\Controllers\BookingController;
use Modules\ForTheBuilder\Http\Controllers\CurrencyController;
use Modules\ForTheBuilder\Http\Controllers\LeadListsController;
use Modules\ForTheBuilder\Http\Controllers\UserController;
use Modules\ForTheBuilder\Http\Controllers\ClientsController;
use Modules\ForTheBuilder\Http\Controllers\ActionLogsController;
use Modules\ForTheBuilder\Http\Controllers\CouponContoller;
use Modules\ForTheBuilder\Http\Controllers\HouseController;
use Modules\ForTheBuilder\Http\Controllers\HouseFlatController;
use Modules\ForTheBuilder\Http\Controllers\DealController;
use Modules\ForTheBuilder\Http\Controllers\ForTheBuilderController;
use Modules\ForTheBuilder\Http\Controllers\LeadCommentController;
use Modules\ForTheBuilder\Http\Controllers\LeadStatusController;
use Modules\ForTheBuilder\Http\Controllers\InstallmentPlanController;
use Modules\ForTheBuilder\Http\Controllers\TaskController;
use Modules\ForTheBuilder\Http\Controllers\StatusColorsController;
use Modules\ForTheBuilder\Http\Controllers\ExportsController;
use Modules\ForTheBuilder\Http\Controllers\LanguageController;
use Modules\ForTheBuilder\Http\Controllers\HomeController;
use Modules\ForTheBuilder\Http\Controllers\MembersController;
use Modules\ForTheBuilder\Http\Controllers\ShopsController;


Route::group(['prefix' => 'user'], function () {
    Route::get('/', [UserController::class, 'index'])->name('forthebuilder.user.index');
    Route::get('/settings', [UserController::class, 'settings'])->name('forthebuilder.settings.index');
    Route::get('/create', [UserController::class, 'create'])->name('forthebuilder.user.create');
    Route::post('/store', [UserController::class, 'store'])->name('forthebuilder.user.store');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('forthebuilder.user.edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('forthebuilder.user.update');
    Route::get('/show/{id}', [UserController::class, 'show'])->name('forthebuilder.user.show');
    Route::delete('/destroy/{id}', [UserController::class, 'destroy'])->name('forthebuilder.user.destroy');
    Route::get('/chat', [UserController::class, 'chat'])->name('forthebuilder.user.chat');
    Route::post('/change-setting', [UserController::class, 'changeSetting'])->name('forthebuilder.user.change-setting');
    Route::post('/reset-setting', [UserController::class, 'resetSetting'])->name('forthebuilder.user.reset-setting');
    Route::get('/filtr/{arr}', [UserController::class, 'filtr'])->name('forthebuilder.user.filtr');
    Route::get('/report', [UserController::class, 'report'])->name('forthebuilder.user.report');
    Route::get('/report-clients', [UserController::class, 'reportClients'])->name('forthebuilder.user.report-clients');
    Route::get('/report-clients-index/{id}', [UserController::class, 'reportClientsIndex'])->name('forthebuilder.user.report-clients-index');
    Route::get('/report-deals', [UserController::class, 'reportDeals'])->name('forthebuilder.user.report-deals');
    Route::get('/report-houses', [UserController::class, 'reportHouses'])->name('forthebuilder.user.report-houses');
    Route::get('/set-status', [UserController::class, 'setStatus'])->name('forthebuilder.user.set-status');
    Route::get('/get-status', [UserController::class, 'getStatus'])->name('forthebuilder.user.get-status');
    Route::get('/report-deals-index/{id}', [UserController::class, 'reportDealsIndex'])->name('forthebuilder.user.report-deals-index');
    Route::get('/report-houses-index/{id}', [UserController::class, 'reportHousesIndex'])->name('forthebuilder.user.report-houses-index');
    Route::get('/view-data', [UserController::class, 'viewData'])->name('forthebuilder.user.view-data');
});

Route::group(['prefix' => 'action-logs', 'middleware' => ['can:isAdmin']], function () {
    Route::get('/', [ActionLogsController::class, 'index'])->name('forthebuilder.action-logs.index');
    Route::get('/show/{id}', [ActionLogsController::class, 'show'])->name('forthebuilder.action-logs.show');
    Route::delete('/destroy/{id}', [ActionLogsController::class, 'destroy'])->middleware('can:isAdmin')->name('forthebuilder.action-logs.destroy');
    Route::delete('/destroy-multiple/', [ActionLogsController::class, 'destroyMultiple'])->name('forthebuilder.action-logs.destroyMultiple');
    Route::delete('/destroy-all', [ActionLogsController::class, 'destroyAll'])->name('forthebuilder.action-logs.destroyAll');
});


Route::group(['prefix' => 'language'], function () {
    Route::get('/', [LanguageController::class, 'index'])->name('forthebuilder.language.index');
    Route::get('/language/show/{id}', [LanguageController::class, 'show'])->name('forthebuilder.language.show');
    Route::post('/translation/save/', [LanguageController::class, 'translation_save'])->name('forthebuilder.translation.save');
    Route::post('/language/change/', [LanguageController::class, 'changeLanguage'])->name('language.change');
    Route::post('/env_key_update', [LanguageController::class, 'env_key_update'])->name('env_key_update.update');
    Route::get('/language/create/', [LanguageController::class, 'create'])->name('languages.create');
    Route::post('/language/added/', [LanguageController::class, 'store'])->name('languages.store');
    Route::get('/language/edit/{id}', [LanguageController::class, 'languageEdit'])->name('forthebuilder.language.edit');
    Route::post('/language/update/', [LanguageController::class, 'update'])->name('languages.update');
    Route::get('/language/delete/{id}', [LanguageController::class, 'languageDestroy'])->name('forthebuilder.language.destroy');
    Route::post('/language/update/value', [LanguageController::class, 'updateValue'])->name('languages.update_value');
});

Route::group(['prefix' => 'home'], function () {
    Route::get('/', [HomeController::class, 'index'])->name('forthebuilder.home.index');
    Route::get('/filtr/{date}', [HomeController::class, 'filtr'])->name('forthebuilder.home.filtr');
    Route::put('/store', [HomeController::class, 'store'])->name('forthebuilder.members.store');
    
});

Route::group(['prefix' => 'members'], function () {
    Route::get('/', [MembersController::class, 'index'])->name('forthebuilder.members.index');
    Route::get('create/', [MembersController::class, 'create'])->name('forthebuilder.members.create');
    Route::put('update/', [MembersController::class, 'update'])->name('forthebuilder.members.update');
    Route::post('one-update/', [MembersController::class, 'Oneupdate'])->name('forthebuilder.members.one-update');
    Route::get('new-rows/', [MembersController::class, 'NewRows'])->name('forthebuilder.members.new-rows');
    Route::get('show/{id}', [MembersController::class, 'show'])->name('forthebuilder.members.show');
    Route::get('delete-purchases', [MembersController::class, 'deletePurchases'])->name('forthebuilder.members.delete-purchases');
    Route::post('add-purchases/', [MembersController::class, 'addPurchases'])->name('forthebuilder.members.add-purchases');
    Route::get('delete-member', [MembersController::class, 'deleteMember'])->name('forthebuilder.members.delete-member');
    Route::get('search', [MembersController::class, 'search'])->name('forthebuilder.members.search');
    Route::get('change-objects', [MembersController::class, 'changeObjects'])->name('forthebuilder.members.change-objects');
    Route::get('update-purchases', [MembersController::class, 'updatePurchases'])->name('forthebuilder.members.update-purchases');
    
});

Route::group(['prefix' => 'shops'], function () {
    Route::get('/', [ShopsController::class, 'index'])->name('forthebuilder.shops.index');
    Route::get('create/', [ShopsController::class, 'create'])->name('forthebuilder.shops.create');
    Route::post('add/', [ShopsController::class, 'add'])->name('forthebuilder.shops.add');
    Route::post('save/', [ShopsController::class, 'save'])->name('forthebuilder.shops.save');
    Route::get('update/{id}', [ShopsController::class, 'update'])->name('forthebuilder.shops.update');
});

    
