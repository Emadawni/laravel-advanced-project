<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/insert', function () {
    DB::table('users')->insert([
        'name' => 'Emad Awni',
        'email' => 'emad' . rand(1, 9999) . '@example.com',
        'password' => bcrypt('12345678'),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return "تمت إضافة البيانات بنجاح إلى قاعدة البيانات باستخدام Query Builder!" ;
});

Route::get('/test-view', [TestController::class, 'index']);

