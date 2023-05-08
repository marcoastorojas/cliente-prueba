-- creacion de campo dominio en la tabla locales
ALTER TABLE `locales` ADD `dominio` VARCHAR(255) NOT NULL AFTER `email`;

-- creacion del rol empleado 
INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) 
VALUES (5, 'empleado', 'web', '2023-02-10 18:27:09', '2023-02-10 18:27:09');

-- creacion de las tablas


CREATE TABLE `modulos` (
  `id` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `ruta` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `rol` bigint(20) NOT NULL,
  `codigo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Datos para la tabla modulos
--

INSERT INTO `modulos` (`id`, `ruta`, `titulo`, `icono`, `status`, `rol`, `codigo`) VALUES
(1, '/puntos', 'Puntos', 'fas fa-cart-plus', 1, 2, 'negocio_puntos'),
(2, '/localpersonas', 'Clientes', 'fas fa-users', 1, 2, 'negocio_clientes'),
(3, '/reporte-canjes-negocio-page', 'Reportes Acum Canjes', 'fas fa-chart-bar', 1, 2, 'negocio_reporte_acumcange'),
(4, '/redencions', 'Recompensas', 'fas fa-gifts', 1, 2, 'negocio_recompensas'),
(5, '/promociones', 'Promociones', 'fas fa-ad', 1, 2, 'negocio_promociones'),
(6, '/categorizacion', 'Niveles', 'fas fa-sliders-h', 1, 2, 'negocio_niveles'),
(7, '/configuracion-comercio', 'Config. Negocio', 'fas fa-cogs', 1, 2, 'negocio_config_comercio'),
(8, '/roles/usuarios', 'Usuarios\n', 'fas fa-user-cog', 1, 2, 'negocio_usuarios'),
(9, '/gifcard', 'gif-card', 'fas fa-card', 1, 2, 'negocio_giftcard');



CREATE TABLE `users_modulos` (
  `id` bigint(20) NOT NULL,
  `modulo_id` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `updated_at` date NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
ALTER TABLE `users_modulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `modulo_id` (`modulo_id`);

--
ALTER TABLE `users_modulos`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

ALTER TABLE `users_modulos`
  ADD CONSTRAINT `users_modulos_ibfk_1` FOREIGN KEY (`modulo_id`) REFERENCES `modulos` (`id`);
COMMIT;


-- modificaciones para funcion roles y modulos

    -- modified:   app/Http/Controllers/Categorizacion/BeneficiosController.php    
    --     modified:   app/Http/Controllers/Categorizacion/CategorizacionController.php
    --     modified:   app/Http/Controllers/HomeController.php
    --     modified:   app/Http/Controllers/Negocio/ReportesController.php
    --     modified:   app/Http/Controllers/Roles/ModulosController.php
    --     modified:   app/Http/Controllers/Roles/UsuariosController.php
    --     modified:   app/Http/Kernel.php
    --     modified:   app/Http/Livewire/Localpersonas.php
    --     modified:   app/Http/Livewire/Puntocanges.php
    --     modified:   app/Http/Livewire/Puntos.php
    --     modified:   app/Http/Livewire/Redencions.php
    --     new file:   app/Http/Middleware/validar_permiso_modulo.php
    --     modified:   app/Models/User.php
    --     modified:   app/Models/Userlocal.php
    --     new file:   app/Models/model_has_permissions.php
    --     new file:   app/Models/users_modulos.php
    --     modified:   resources/views/backend/home.blade.php
    --     modified:   resources/views/backend/menu.blade.php
    --     modified:   resources/views/categorizacion/index.blade.php
    --     modified:   resources/views/home.blade.php
    --     modified:   resources/views/livewire/puntos/puntos.blade.php
    --     new file:   resources/views/nopermiss.blade.php
    --     modified:   resources/views/roles/usuarios/index.blade.php
    --     modified:   roles_usuario.sql
    --     modified:   routes/web.php