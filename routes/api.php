<?php

use App\Http\Resources\UserCollection;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/user/{email}', function (Request $request, string $email) {
    try {
        $user = User::whereEmail($email)->with('articles')->firstOrFail();

        return new UserResource($user);
    } catch (\Throwable $th) {
        if($th instanceof ModelNotFoundException) {
            $code = $th instanceof ModelNotFoundException ? 404 : $th->getCode();
            $message = $th instanceof ModelNotFoundException ? 'Record not found' : $th->getMessage();
        }

        return response()->json([
            'message' => $message,
        ], $code);
    }
});

Route::get('/user', function (Request $request) {
    return new UserCollection(
        User::paginate()
    );
});
