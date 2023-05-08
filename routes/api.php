<?php

use App\Http\Controllers\Api\CuponController;
use App\Http\Controllers\Api\EventoclicsController;
use App\Http\Controllers\Api\PromocionController;
use App\Http\Controllers\Api\PuntoController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\NegocioApiController;
use App\Http\Controllers\Notificaciones\NotificacionesController;
use App\Http\Controllers\TipeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('register', [UserController::class, 'register']);
Route::post('login', [UserController::class, 'login']);
Route::post('pre-login', [UserController::class, 'prePogin']);
Route::get('get-cupon/{cupn}', [UserController::class, 'getCupon']);
Route::get('get-dni-reniec/{dni}', [UserController::class, 'consultaReniec']);
Route::post('get-dni-reniec-web', [UserController::class, 'consultaReniecWeb']);
Route::get('initplaces', [NegocioApiController::class, 'ciudades']);
Route::post('noti-by-email', [NotificacionesController::class, 'poremail']);


Route::group(['middleware' => ["auth:sanctum"]], function () {
    Route::get('user-profile', [UserController::class, 'userProfile']);
    Route::post('refresh-token-device', [UserController::class, 'refreshDeviceToken']);
    Route::put('update-profile', [UserController::class, 'updateProfile']);
    Route::get('puntos-local', [PuntoController::class, 'puntosLocal']);
    Route::get('puntos-movimientos/{idlocalpersona}', [PuntoController::class, 'infoPuntosDetalle']);
    Route::get('listar-cpromocionales', [CuponController::class, 'listarCupones']);
    Route::get('activar-cpromocional/{id}', [CuponController::class, 'activarCodPro']);
    // Promociones
    Route::get('listar-promciones', [PromocionController::class, 'listarPromociones']);

    Route::get('logout', [UserController::class, 'logout']);
    Route::apiResource('tipes', TipeController::class);
    Route::apiResource('negocios', NegocioApiController::class);
    Route::get('eliminar-cuenta', [UserController::class, 'eliminarcliente']);
    Route::get('/promociones/{id}', [NegocioApiController::class, 'promociones']);
    Route::get('/recompensas/{id}', [NegocioApiController::class, 'recompensas']);

    //ADD se agrego para controlar toda la información en un solo archivo 
    Route::get('/negocio/info-extra/{id}', [NegocioApiController::class, 'extra_info']);
    Route::get('/negocio/categorizacion/{id}', [NegocioApiController::class, 'categorizacion']);

    Route::get('tiposnegocios', [NegocioApiController::class, 'tiposnegocios']);
    Route::get('/listaciudades', [NegocioApiController::class, 'ciudades']);

    Route::post('regitrarclic', [EventoclicsController::class, 'store']);

    Route::get('notificaciones', [NotificacionesController::class, 'index']);
});

// API
Route::get('api-acumulacion', function (Request $request) {

    $token = $request->token;
    if ($token == 'JYB5HF2TwTfRC2zHs4gc3or4sI0jfpazt9ooWiTjHQkV8XbFHGQFKafEosK0yXaWFSTKHfyY3ytsdKpQeP4U3w') {
        return response()->json([
            "status" => 1,
            "msg" => 'Connection Successful with CLIENTE VIP',
        ], 200);
    } else {
        return response()->json([
            "status" => 0,
            "msg" => 'Not Authorized',
        ], 500);
    }
});
