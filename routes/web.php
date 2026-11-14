<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/insert', function () {
    DB::table('users')->insert([
        'name'       => 'Emad Awni',
        'email'      => 'emad' . rand(1, 9999) . '@example.com',
        'password'   => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return "Data inserted successfully using Query Builder!";
});

Route::get('/test-view', [TestController::class, 'index']);
Route::post('/test/store', [TestController::class, 'store'])->name('test.store');

Route::get('/users', [TestController::class, 'showUsers'])->name('users.index');

Route::get('/users/edit/{id}', [TestController::class, 'editUser'])->name('users.edit');
Route::put('/users/update/{id}', [TestController::class, 'updateUser'])->name('users.update');

Route::delete('/users/delete/{id}', [TestController::class, 'deleteUser'])->name('users.destroy');
