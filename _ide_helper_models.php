<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Ciudad
 *
 * @property int $id
 * @property string|null $ciudad
 * @property string|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Ciudad whereUpdatedAt($value)
 */
	class Ciudad extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Clientecategoria
 *
 * @property int $id
 * @property string|null $categoria
 * @property string|null $descripcion
 * @property int|null $estado
 * @property string|null $icono
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereCategoria($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereIcono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Clientecategoria whereUpdatedAt($value)
 */
	class Clientecategoria extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Cupon
 *
 * @property int $id
 * @property int $local_id
 * @property string|null $codigo
 * @property int|null $puntos
 * @property string|null $fechaini
 * @property string|null $fechafin
 * @property string|null $file
 * @property int|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereFechafin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereFechaini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon wherePuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cupon whereUpdatedAt($value)
 */
	class Cupon extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Detalleventa
 *
 * @property int $id
 * @property int $venta_id
 * @property string|null $descripcion
 * @property string|null $unidad
 * @property string|null $precio
 * @property int|null $cantidad
 * @property string|null $subtotal
 * @property string|null $plan
 * @property string|null $periodo
 * @property string|null $fechaini
 * @property string|null $fechafin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereCantidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereFechafin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereFechaini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa wherePeriodo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa wherePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereUnidad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Detalleventa whereVentaId($value)
 */
	class Detalleventa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Eventclic
 *
 * @property int $id
 * @property int|null $locale_id
 * @property int|null $promocion_id
 * @property string|null $clics
 * @property string|null $origen
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic query()
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic whereClics($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic whereLocaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic whereOrigen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic wherePromocionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Eventclic whereUpdatedAt($value)
 */
	class Eventclic extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Giftcard
 *
 * @property int $id
 * @property int $localpersona_id
 * @property string|null $codigocard
 * @property float|null $monto
 * @property string|null $fechaini
 * @property string|null $fechafin
 * @property int|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard query()
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereCodigocard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereFechafin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereFechaini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereLocalpersonaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Giftcard whereUpdatedAt($value)
 */
	class Giftcard extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Historial
 *
 * @property int $id
 * @property string|null $motivo
 * @property string|null $registros
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Historial newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historial newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Historial query()
 * @method static \Illuminate\Database\Eloquent\Builder|Historial whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historial whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historial whereMotivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historial whereRegistros($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Historial whereUpdatedAt($value)
 */
	class Historial extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Infolocal
 *
 * @property int $id
 * @property int $local_id
 * @property string|null $celular
 * @property string|null $direccion
 * @property string|null $cartacatalogo
 * @property int|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereCartacatalogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Infolocal whereLocalId($value)
 */
	class Infolocal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Locale
 *
 * @property int $id
 * @property string $titulo
 * @property string|null $ruc
 * @property string $descripcion
 * @property string|null $direccion
 * @property string|null $ciudad
 * @property string|null $celular
 * @property string|null $facebook
 * @property string|null $email
 * @property string|null $dominio
 * @property int $user_id
 * @property int $tipe_id
 * @property string $config_punto
 * @property string $config_monto
 * @property string|null $nombresprop
 * @property string|null $apellidosprop
 * @property string|null $celularprop
 * @property string|null $logo
 * @property string|null $portada
 * @property string|null $restriccion
 * @property int|null $registro
 * @property int|null $comprobante
 * @property int $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $ciudad_id
 * @property string|null $nombrecatalogo
 * @property string|null $catalogo
 * @property string $banner
 * @property string $icono_tarjeta
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Promocione> $Promociones
 * @property-read int|null $promociones_count
 * @property-read \App\Models\Ciudad|null $ciudade
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Infolocal> $infolocals
 * @property-read int|null $infolocals_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Localpersona> $localpersonas
 * @property-read int|null $localpersonas_count
 * @property-read \App\Models\Localplan|null $localplan
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Redencion> $redenciones
 * @property-read int|null $redenciones_count
 * @property-read \App\Models\Tipe|null $tipe
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\LocaleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale query()
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereApellidosprop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCatalogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCelularprop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCiudad($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCiudadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereComprobante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereConfigMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereConfigPunto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereDireccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereDominio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereFacebook($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereIconoTarjeta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereLogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereNombrecatalogo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereNombresprop($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereRegistro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereRestriccion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereRuc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereTipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Locale whereUserId($value)
 */
	class Locale extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Localpersona
 *
 * @property int $id
 * @property int $persona_id
 * @property int $local_id
 * @property int|null $totpuntos
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $userlocal_id
 * @property int|null $clientecategoria_id
 * @property-read \App\Models\Clientecategoria|null $clientecategoria
 * @property-read \App\Models\Locale|null $locale
 * @property-read \App\Models\Persona|null $persona
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Puntocange> $puntocanges
 * @property-read int|null $puntocanges_count
 * @method static \Database\Factories\LocalpersonaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona query()
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereClientecategoriaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona wherePersonaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereTotpuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localpersona whereUserlocalId($value)
 */
	class Localpersona extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Localplan
 *
 * @property int $id
 * @property int $locale_id
 * @property int $plane_id
 * @property int $periodo_id
 * @property string|null $fechapago
 * @property string|null $tarifa
 * @property string|null $observaciones
 * @property string|null $usuario
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Locale $locale
 * @property-read \App\Models\Periodo $periodo
 * @property-read \App\Models\Plane $plane
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereFechapago($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereLocaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan wherePeriodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan wherePlaneId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereTarifa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Localplan whereUsuario($value)
 */
	class Localplan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Partner
 *
 * @property int $id
 * @property string|null $nombres
 * @property string|null $apellidos
 * @property string|null $negocio
 * @property int $tipe_id
 * @property int $ciudad_id
 * @property string|null $distrito
 * @property string|null $celular
 * @property string|null $correo
 * @property int|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner query()
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCiudadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereDistrito($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereNegocio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereTipeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Partner whereUpdatedAt($value)
 */
	class Partner extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Periodo
 *
 * @property int $id
 * @property string|null $periodo
 * @property int|null $periodonum
 * @property int|null $estado
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo wherePeriodo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodo wherePeriodonum($value)
 */
	class Periodo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Persona
 *
 * @property int $id
 * @property string|null $tipodoc
 * @property string $dni
 * @property string|null $dnicod
 * @property string $nombres
 * @property string|null $apellidos
 * @property string|null $codpais
 * @property string|null $celular
 * @property string|null $correo
 * @property string|null $fechanac
 * @property int|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property int|null $ciudad_id
 * @property-read \App\Models\Ciudad|null $ciudade
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Localpersona> $locales
 * @property-read int|null $locales_count
 * @property-read \App\Models\Localpersona|null $localperon
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\PersonaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Persona newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Persona query()
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereApellidos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereCelular($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereCiudadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereCodpais($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereCorreo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereDni($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereDnicod($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereFechanac($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereNombres($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereTipodoc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Persona whereUserId($value)
 */
	class Persona extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Plane
 *
 * @property int $id
 * @property string|null $plan
 * @property string|null $tarifa
 * @property int|null $estado
 * @method static \Illuminate\Database\Eloquent\Builder|Plane newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plane newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plane query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plane whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plane whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plane wherePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plane whereTarifa($value)
 */
	class Plane extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Promocione
 *
 * @property int $id
 * @property int $locale_id
 * @property string|null $titulo
 * @property string|null $file
 * @property int|null $estado
 * @property string|null $fechaini
 * @property string|null $fechafin
 * @property string|null $lclfechaini
 * @property string|null $lclfechafin
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Locale $local
 * @method static \Database\Factories\PromocioneFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione query()
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereFechafin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereFechaini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereLclfechafin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereLclfechaini($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereLocaleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Promocione whereUpdatedAt($value)
 */
	class Promocione extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Puntocange
 *
 * @property int $id
 * @property int $localpersona_id
 * @property int $persona_id
 * @property string $tipopunto
 * @property float $monto
 * @property float $puntos
 * @property int|null $local
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int|null $derencion_id
 * @property string|null $variante
 * @property string|null $descripcion
 * @property int|null $cuponid
 * @property int|null $sucursal
 * @property string|null $nrocomprobante
 * @property-read \App\Models\Localpersona|null $localpersona
 * @property-read \App\Models\Persona|null $persona
 * @method static \Database\Factories\PuntocangeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange query()
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereCuponid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereDerencionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereLocal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereLocalpersonaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereMonto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereNrocomprobante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange wherePersonaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange wherePuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereSucursal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereTipopunto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Puntocange whereVariante($value)
 */
	class Puntocange extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Redencion
 *
 * @property int $id
 * @property string|null $techo
 * @property string|null $titulo
 * @property int|null $puntos
 * @property string|null $foto
 * @property string|null $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $local_id
 * @property string|null $costo
 * @property string|null $precio
 * @property string|null $modificar
 * @property-read \App\Models\Locale|null $locale
 * @method static \Database\Factories\RedencionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereCosto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereModificar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion wherePuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereTecho($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Redencion whereUpdatedAt($value)
 */
	class Redencion extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Tipe
 *
 * @property int $id
 * @property string $tipos
 * @property string $descripcion
 * @property string|null $imagen
 * @property int|null $ordenar
 * @property int $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Locale> $locales
 * @property-read int|null $locales_count
 * @method static \Database\Factories\TipeFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe query()
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereImagen($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereOrdenar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereTipos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Tipe whereUpdatedAt($value)
 */
	class Tipe extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property int|null $rol
 * @property int|null $estado
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $permission
 * @property-read mixed $modulos
 * @property-read \App\Models\Locale|null $local
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read \App\Models\Persona|null $persona
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * Class Userlocal
 *
 * @property int $id
 * @property int $user_id
 * @property int $local_id
 * @property Carbon|null $created_at
 * @property Locale $locale
 * @property User $user
 * @property Collection|Localpersona[] $localpersonas
 * @package App\Models
 * @property-read int|null $localpersonas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Userlocal whereUserId($value)
 */
	class Userlocal extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Venta
 *
 * @property int $id
 * @property string|null $serie
 * @property int|null $nrocomprobante
 * @property string|null $fecha
 * @property string|null $vencimiento
 * @property string|null $subtotal
 * @property string|null $total
 * @property int|null $estado
 * @property int|null $estadoventa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $descuento
 * @property int $localplan_id
 * @property-read \App\Models\Detalleventa|null $detalleventa
 * @property-read \App\Models\Localplan $localplan
 * @method static \Illuminate\Database\Eloquent\Builder|Venta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereDescuento($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereEstadoventa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereLocalplanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereNrocomprobante($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereSerie($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereSubtotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereTotal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Venta whereVencimiento($value)
 */
	class Venta extends \Eloquent {}
}

namespace App\Models\categorizacion{
/**
 * App\Models\categorizacion\Asignacion
 *
 * @property int $id
 * @property int $user_id
 * @property int $create_by
 * @property int $local_id
 * @property string $fecha
 * @property int $categorizacion_nivel_id
 * @property string $descripcion
 * @property int $categorizacion_periodo_id
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereCategorizacionNivelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereCategorizacionPeriodoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereCreateBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereFecha($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Asignacion whereUserId($value)
 */
	class Asignacion extends \Eloquent {}
}

namespace App\Models\categorizacion{
/**
 * App\Models\categorizacion\Beneficios
 *
 * @property int $id
 * @property int $local_id
 * @property int $user_id
 * @property int $categorizacion_nivel_id
 * @property string $titulo
 * @property string $tyc
 * @property string $descripcion
 * @property string $images
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios query()
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereCategorizacionNivelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereImages($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereTyc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Beneficios whereUserId($value)
 */
	class Beneficios extends \Eloquent {}
}

namespace App\Models\categorizacion{
/**
 * App\Models\categorizacion\Categorizacion
 *
 * @property int $id
 * @property int $local_id
 * @property string $start_date
 * @property int $periodos
 * @property int $estatus
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property int $user_id
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereEstatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion wherePeriodos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categorizacion whereUserId($value)
 */
	class Categorizacion extends \Eloquent {}
}

namespace App\Models\categorizacion{
/**
 * App\Models\categorizacion\Niveles
 *
 * @property int $id
 * @property string $titulo
 * @property int $nivel_id
 * @property string $descripcion
 * @property int $min_puntos
 * @property int $max_puntos
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon $updated_at
 * @property int $local_id
 * @property int $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\categorizacion\Beneficios> $beneficios
 * @property-read int|null $beneficios_count
 * @property-read \App\Models\categorizacion\nivel|null $info
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles query()
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereMaxPuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereMinPuntos($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereNivelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Niveles whereUserId($value)
 */
	class Niveles extends \Eloquent {}
}

namespace App\Models\categorizacion{
/**
 * App\Models\categorizacion\Periodos
 *
 * @property int $id
 * @property int $categorizacion_id
 * @property int $local_id
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $fecha_inicio_ant
 * @property string $fecha_fin_ant
 * @property string $descripcion
 * @property int $status
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereCategorizacionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereFechaFin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereFechaFinAnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereFechaInicioAnt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereLocalId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Periodos whereUpdatedAt($value)
 */
	class Periodos extends \Eloquent {}
}

namespace App\Models\categorizacion{
/**
 * App\Models\categorizacion\nivel
 *
 * @property int $id
 * @property string $titulo
 * @property string $icon
 * @property string $banner
 * @property string $card
 * @property string $tag
 * @property string $cssColor
 * @method static \Illuminate\Database\Eloquent\Builder|nivel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|nivel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|nivel query()
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereBanner($value)
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereCard($value)
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereCssColor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereTag($value)
 * @method static \Illuminate\Database\Eloquent\Builder|nivel whereTitulo($value)
 */
	class nivel extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\model_has_permissions
 *
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 * @method static \Illuminate\Database\Eloquent\Builder|model_has_permissions newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|model_has_permissions newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|model_has_permissions query()
 * @method static \Illuminate\Database\Eloquent\Builder|model_has_permissions whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|model_has_permissions whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|model_has_permissions wherePermissionId($value)
 */
	class model_has_permissions extends \Eloquent {}
}

namespace App\Models\roles{
/**
 * App\Models\roles\Modulos
 *
 * @property int $id
 * @property string $ruta
 * @property string $titulo
 * @property string $icono
 * @property int $status
 * @property int $rol
 * @property string $codigo
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos query()
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereCodigo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereIcono($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereRol($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereRuta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modulos whereTitulo($value)
 */
	class Modulos extends \Eloquent {}
}

namespace App\Models\roles{
/**
 * App\Models\roles\Usuarios
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Usuarios newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuarios newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuarios query()
 */
	class Usuarios extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\users_modulos
 *
 * @property int $id
 * @property int $modulo_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon $updated_at
 * @property \Illuminate\Support\Carbon $created_at
 * @property-read \App\Models\roles\Modulos $modulo
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos query()
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos whereModuloId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|users_modulos whereUserId($value)
 */
	class users_modulos extends \Eloquent {}
}

