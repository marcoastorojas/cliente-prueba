<?php

use App\Http\Controllers\comprobantes\FacturacionController;
use App\Http\Controllers\CupController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Negocio\NegocioController;
use App\Http\Controllers\Negocio\RecompensaController;
use App\Http\Controllers\Negocio\ReportesController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\Promocion\PromocionController;
use App\Http\Controllers\Reporte\ReporteEventClicController;
use App\Http\Controllers\Reporte\ReporteNegociosController;
use App\Http\Controllers\Roles\ModulosController;
use App\Http\Controllers\Roles\UsuariosController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('inicio');
});

Auth::routes();
// Auth::routes(['reset' => false, 'verify' => false]);

Route::get('/registrarme', function () {
    return view('auth.register_v');
})->name('registrarme');

// Authentication Routes...
// Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
// Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
// Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes...
// Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
// Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Route::group(['middleware' => ['role:cliente']], function () {
//     //
// });
Route::middleware(['auth'])->group(function () {

    // ROL:CLIENTE
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware(['role:admin|comercio|cliente|empleado', 'validar_info']);
    Route::get('/negocios', [App\Http\Controllers\HomeController::class, 'negocios'])->middleware(['role:cliente', 'validar_info']);
    Route::get('/negocios/recompensas/{id}', [App\Http\Controllers\HomeController::class, 'recompensas'])->name('recompensas')->middleware(['role:cliente']);
    Route::view('config-perfil', 'livewire.perfilcli.index')->middleware(['role:cliente'])->middleware(['role:cliente']);
    Route::get('/inforedencion/{idlocal}', [App\Http\Controllers\HomeController::class, 'inforedencion'])->middleware(['role:cliente']);
    Route::get('/activar-cpromocional/{id}', [CupController::class, 'activarCodPro'])->name('activarcpromocional')->middleware(['role:cliente']);

    // ROL:NEGOCIO
    /**
     * Se modifico por ADD 
     */
    Route::middleware(['role:admin|comercio|empleado'])->group(function () {

        Route::view('redencions', 'livewire.redencions.index')->middleware(['validar_permiso_modulo:negocio_recompensas']);
        Route::view('puntocanges', 'livewire.puntocanges.index')->middleware(['validar_permiso_modulo:negocio_puntos']);
        Route::view('localpersonas', 'livewire.localpersonas.index')->middleware(['validar_permiso_modulo:negocio_clientes']);
        Route::view('puntos', 'livewire.puntos.index')->name('puntos')->middleware(['validar_permiso_modulo:negocio_puntos']);
        Route::view('homecliente', 'livewire.homecliente.index');
        Route::view('config-comercio', 'livewire.comercio.index')->middleware(['validar_permiso_modulo:negocio_config_comercio']);
        Route::view('promociones', 'livewire.promociones.index')->middleware(['validar_permiso_modulo:negocio_promociones']);
        
        Route::get('promociones/crear',[PromocionController::class, 'create'])->middleware(['validar_permiso_modulo:negocio_promociones']);
        Route::POST('promociones/registrar',[PromocionController::class, 'store'])->name('promocion.store')->middleware(['validar_permiso_modulo:negocio_promociones']);
        Route::get('promociones/edit/{id}',[PromocionController::class, 'edit'])->middleware(['validar_permiso_modulo:negocio_promociones']);
        Route::POST('promociones/actualizar',[PromocionController::class, 'update'])->name('promocion.update')->middleware(['validar_permiso_modulo:negocio_promociones']);

        Route::get('reporte-canjes-negocio', [ReportesController::class, 'reporteCanjes'])->middleware(['validar_permiso_modulo:negocio_reporte_acumcange']);
        Route::get('reporte-canjes-negocio-detalles', [ReportesController::class, 'reporteCanjesDetalles'])->middleware(['validar_permiso_modulo:negocio_reporte_acumcange']);
        Route::get('reporte-canjes-negocio-page', function () {
            return view('backend.negocios.reporteacumcanjes');
        })->middleware(['validar_permiso_modulo:negocio_reporte_acumcange']);


        Route::get('configuracion-comercio', [NegocioController::class, 'index'])->middleware(['validar_permiso_modulo:negocio_config_comercio']);
        Route::POST('configuracion-comercio-store', [NegocioController::class, 'store'])->name('local.store');

        //generamos las rutas de categorizacion ADD
        Route::group(['prefix' => 'categorizacion'], function () {
            //agrupamos las rutas get 
            Route::get('/', [App\Http\Controllers\Categorizacion\CategorizacionController::class, 'index'])->name('categorizacion.index')->middleware(['validar_permiso_modulo:negocio_niveles']);
            Route::get('beneficios', [App\Http\Controllers\Categorizacion\BeneficiosController::class, 'index'])->name('beneficios.index')->middleware(['validar_permiso_modulo:negocio_niveles']);
            Route::get('niveles_persona/{id}', [App\Http\Controllers\Categorizacion\CategorizacionController::class, 'calcularNiveles'])->name('categorizacion.niveles')->middleware(['validar_permiso_modulo:negocio_niveles']);

            Route::put('beneficios', [App\Http\Controllers\Categorizacion\BeneficiosController::class, 'destroy'])->name('beneficios.eliminar');
            Route::post('beneficios', [App\Http\Controllers\Categorizacion\BeneficiosController::class, 'store'])->name('beneficios.store');
            Route::post('upload', [App\Http\Controllers\Categorizacion\BeneficiosController::class, 'updatePhoto'])->name('beneficios.updatePhoto');
            Route::post('edit-nivel', [App\Http\Controllers\Categorizacion\NivelesController::class, 'edit'])->name('niveles.edit');
            Route::post('comenzar', [App\Http\Controllers\Categorizacion\CategorizacionController::class, 'comenzar'])->name('categorizacion.comenzar');
            Route::post('asignar', [App\Http\Controllers\Categorizacion\CategorizacionController::class, 'asignar'])->name('categorizacion.asignar');
            Route::post('periodo', [App\Http\Controllers\Categorizacion\CategorizacionController::class, 'periodo'])->name('categorizacion.periodo');
        });

        //generamos las rutas de roles ADD
        Route::group(['prefix' => 'roles'], function () {
            //agrupamos las rutas get 
            Route::get('usuarios', [UsuariosController::class, 'index'])->name('roles.usuarios')->middleware(['validar_permiso_modulo:negocio_usuarios']);
            //
            Route::post('usuarios', [UsuariosController::class, 'store'])->name('usuarios.store');
            Route::post('usuarios/permisos', [UsuariosController::class, 'permisos'])->name('usuarios.permisos');

            /***
             * Se acordo que modulos este de forma manual
             */
            Route::post('modulos', [ModulosController::class, 'store'])->name('modulos.store');

        });
    });


    // ROL:ADMIN
    Route::view('personas', 'livewire.personas.index')->middleware(['role:admin']);
    Route::view('locales', 'livewire.locales.index')->middleware(['role:admin']);
    Route::view('tipes', 'livewire.tipes.index')->middleware(['role:admin']);
    Route::get('/reportenegociocliente', [HomeController::class, 'reportenegocioclientes'])->name('reportenegociocliente')->middleware(['role:admin|gestor']);
    Route::get('/reporte-recompensa-cliente', [HomeController::class, 'reportRecompensaCliente'])->name('reporterecompesacliente')->middleware(['role:admin']);
    Route::get('/reporte-activdad-negocio-page', function () {
        return view('backend.admin.reportere-actividades');
    })->middleware(['role:admin|gestor']);
    Route::get('/reporte-activdad-negocio', [ReporteNegociosController::class, 'acumulacionesPuntos'])->middleware(['role:admin|gestor']);
    Route::get('/facturacion', function () {
        return view('backend.facturacion.ventas');
    })->middleware(['role:admin|gestor']);
    Route::get('/solicitudesinfo', [PartnerController::class, 'getLista'])->name('getlistasolicitudes')->middleware(['role:admin']);

    // RECOMPENSAS ADMIN
    Route::get('/recompesas', function () {
        return view('backend.recompensa.recompensa');
    })->middleware(['role:admin']);
    Route::get('/listarNegocios', [RecompensaController::class, 'getNegocios'])->name('getlistasnegocios')->middleware(['role:admin']);
    Route::get('/listarRecompensasAdmin', [RecompensaController::class, 'getCompensasId'])->name('getlistasrecompensas')->middleware(['role:admin']);
    Route::get('/liberarFechaRecompensa', [RecompensaController::class, 'liberarFecha'])->name('getlistasrecompensas')->middleware(['role:admin']);

    // FACTURACION
    Route::get('/fact-negocios', [FacturacionController::class, 'listarcabeceras'])->middleware(['role:admin']);
    Route::get('/fact-ventas', [FacturacionController::class, 'listventas'])->middleware(['role:admin']);
    Route::post('/fact-registrar', [FacturacionController::class, 'register'])->middleware(['role:admin']);
    Route::get('/fact-imprimir', [FacturacionController::class, 'imprimir'])->middleware(['role:admin']);
    Route::get('/convert-periodo', [FacturacionController::class, 'convertirperidos'])->middleware(['role:admin']);
    Route::get('/fecha-vencimiento', [FacturacionController::class, 'convertirfechavenc'])->middleware(['role:admin']);
    Route::get('/eliminar-venta', [FacturacionController::class, 'eliminarventa'])->middleware(['role:admin']);
    Route::get('/actualizar-estado', [FacturacionController::class, 'cancelarfactura'])->middleware(['role:admin']);

    Route::get('/report-event-clic', [ReporteEventClicController::class, 'index'])->name('repoeventclic')->middleware(['role:admin']);
    Route::get('/grafic-clic-banner/{id}', [ReporteEventClicController::class, 'grafic_clic_banner'])->middleware(['role:admin']);
    Route::get('/grafic-clic-whatsapp/{id}', [ReporteEventClicController::class, 'grafic_clic_whatsapp'])->middleware(['role:admin']);

    Route::get('/enviarReporte/{id}', [HomeController::class, 'enviarReporte'])->name('enviarrepo')->middleware(['role:admin|gestor']);
    Route::get('/userpordianegocio/{id}', [HomeController::class, 'userxdianegocio'])->name('userxdianegocio')->middleware(['role:admin|gestor']);
    Route::get('/userpordia/', [HomeController::class, 'repoClixDia'])->name('clixdia')->middleware(['role:admin']);
    Route::get('impersonate_leave', [HomeController::class, 'impersonate_leave'])->name('users.impersonate_leave');
    Route::get('qr-generator', [HomeController::class, 'generatorQr'])->middleware(['role:admin']);
    Route::post('qr-generate', [HomeController::class, 'qrgenerate'])->middleware(['role:admin']);
});
// Route::POST('/registranegocio', [App\Http\Controllers\RegisternegocioController::class, 'store']);
Route::POST('registranegocio', [PartnerController::class, 'store']);
Route::get('consultainfo', [PartnerController::class, 'index']);

Route::get('politica-privacidad', function () {
    return view('pprivacidad');
});
Route::get('terminos-y-condiciones', function () {
    return view('pprivacidad');
});
Route::get('/datos-invalidos', function () {
    return view('invalido');
});
Route::view('users', 'livewire.users.index');
// Route::GET('/temporal', [App\Http\Controllers\TemporalController::class, 'index']);
// Route::get('/contac', function () {
//     return view('backend.correo');
// });
// Route::post('/enviarcorreo', [App\Http\Controllers\MensajesController::class, 'store']);
