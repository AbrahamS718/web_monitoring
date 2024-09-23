<?php

use App\Http\Controllers\connectP2V;
use App\Http\Controllers\Dashboard;
use App\Http\Controllers\HardwareManagemen;
use App\Http\Controllers\ManageUser;
use App\Http\Controllers\realtimeCheck;
use App\Http\Middleware\Role;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        // Dashboard route
        Route::get('/', [Dashboard::class, 'index'])->name('index')->middleware(['role:root,admin,visitor']);

        // Hardware management routes
        Route::get('vessel-view/{index}', [HardwareManagemen::class, 'vesselView'])->name('vesselview.index')->middleware(['role:root,admin']);
        Route::post('vessel-insert', [HardwareManagemen::class, 'vesselInsert'])->name('vesselinsert')->middleware(['role:root,admin']);

        Route::get('pm-view/{index}', [HardwareManagemen::class, 'pmView'])->name('pmview.index')->middleware(['role:root,admin']);
        Route::post('pm-insert', [HardwareManagemen::class, 'pmInsert'])->name('pminsert')->middleware(['role:root,admin']);

        // ConnectP2V routes
        Route::get('connect-p2v', [ConnectP2V::class, 'viewConnectP2V'])->name('connectP2V')->middleware(['role:root,admin,visitor']);
        Route::post('insert-connect-p2v', [ConnectP2V::class, 'insertConnectP2V'])->name('insertConnectP2V')->middleware(['role:root,admin']);

        // Daily Check routes
        Route::get('daily-check', [ConnectP2V::class, 'viewDailyCheck'])->name('dailycheck')->middleware(['role:root,admin']);
        Route::post('insert-daily-check', [ConnectP2V::class, 'insertDailyCheck'])->name('insertDailyCheck')->middleware(['role:root,admin']);

        // Realtime Check routes
        Route::get('check-view', [RealtimeCheck::class, 'checkView'])->name('checkView')->middleware(['role:root,admin,visitor']);
        Route::get('delete-check-view/{index}', [RealtimeCheck::class, 'deleteCheckView'])->name('deleteCheckView.index')->middleware(['role:root,admin']);
        Route::get('detail-info/{index}', [RealtimeCheck::class, 'detailInfo'])->name('detailInfo.index')->middleware(['role:root,admin,visitor']);

        // User management routes
        Route::middleware(['role:root'])->group(function () {
            Route::get('list-user', [ManageUser::class, 'listUser'])->name('listUser');
            Route::get('deleteUser/{index}', [ManageUser::class, 'deleteUser'])->name('deleteUser.index');
            Route::get('editUser/{index}', [ManageUser::class, 'editUser'])->name('editUser.index');
        });
    });
});

// Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {});
