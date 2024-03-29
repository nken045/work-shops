<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Workshops\WorkshopController;
use App\Http\Controllers\DefaultController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MyPageController;

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

//TOP
Route::get('/', [DefaultController::class, 'viewAction'])->name('top');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::redirect('/dashboard', '/' , 301);

//検索結果一覧
Route::get('/search', [SearchController::class, 'index'])->name('search.list');
//詳細
Route::get('detail', [DefaultController::class, 'show'])->name('detail');

/** マイページ */
Route::group(['prefix' => 'mypage', 'middleware' => ['auth:sanctum', 'verified']], function () {    
    // アカウント操作
    // 開催ワークショップ操作（一覧）
    Route::get('', [MyPageController::class, 'myWorkshop'])
        ->name('mypage.my-workshop');
    // 参加ワークショップ操作（一覧）
    Route::get('joined', [MyPageController::class, 'joinedWorkshop'])
        ->name('mypage.joined-workshop');
});

/** ワークショップ */
Route::group(['prefix' => 'workshop', 'middleware' => ['auth:sanctum', 'verified']], function () {
    //一覧はマイページに移設
    // 詳細
    Route::get('detail', [WorkshopController::class, 'show'])
        ->name('workshop.detail');
    // 新規登録（入力）
    Route::get('input', [WorkshopController::class, 'create'])
        ->name('workshop.create');
    // 新規登録（確認）
    Route::post('confirm', [WorkshopController::class, 'confirm'])->name('workshop.confirm');
    // 新規登録（実行）
    Route::post('complete', [WorkshopController::class, 'store'])->name('workshop.store');
    // 参加（確認）
    Route::post('join/confirm', [WorkshopController::class, 'joinConfirm'])
        ->name('workshop.join.confirm');
    // 参加（実行）
    Route::post('join/complete', [WorkshopController::class, 'joinStore'])
        ->name('workshop.join.complete');
    // 参加（チケット表示）
    Route::post('entry-ticket', [WorkshopController::class, 'showTicket'])
        ->name('workshop.entry-ticket');    
    // 更新（入力）
    Route::get('edit', [WorkshopController::class, 'edit'])
        ->name('workshop.edit');
    // 更新（実行）
    Route::post('update', [WorkshopController::class, 'update'])
        ->name('workshop.update');
    // 削除（実行）
    Route::post('delete', [WorkshopController::class, 'destroy'])
        ->name('workshop.destroy');
});
