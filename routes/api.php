<?php

use App\Http\Controllers\API\v1\CandidateController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['middleware' => ['cors']], function () {
    Route::prefix('candidate')->group(function () {
        Route::post('/', [CandidateController::class, 'StoreCandidate']);
        Route::put('/', [CandidateController::class, 'UpdateCandidate']);
        Route::delete('/{candidateId}', [CandidateController::class, 'DeleteCandidate']);
        Route::get('/{candidateId}', [CandidateController::class, 'GetCandidate']);
        Route::get('/', [CandidateController::class, 'GetDataTableCandidate']);
    });
});
