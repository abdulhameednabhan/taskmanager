<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use Illuminate\Http\Request;



// Route::prefix('api')->group(function () {
//     require base_path('routes/api.php');
// });
Route::post('/tasks', [TaskController::class, 'store']);
Route::get('/test', function () {
    return response()->json(['message' => 'API is working!']);
});



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

