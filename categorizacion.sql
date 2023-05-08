

-- categorizacion	
CREATE TABLE `categorizacion` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `local_id` int(11) NOT NULL,
 `start_date` date NOT NULL,
 `periodos` int(11) NOT NULL,
 `estatus` tinyint(1) NOT NULL,
 `updated_at` datetime NOT NULL,
 `created_at` datetime NOT NULL,
 `user_id` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- categorizacion_asignacion_nivel
CREATE TABLE `categorizacion_asignacion_nivel` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL,
 `create_by` int(11) NOT NULL,
 `local_id` int(11) NOT NULL,
 `fecha` date NOT NULL,
 `categorizacion_nivel_id` int(11) NOT NULL,
 `descripcion` varchar(255) NOT NULL,
 `categorizacion_periodo_id` int(11) NOT NULL,
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- categorizacion_beneficios	
CREATE TABLE `categorizacion_beneficios` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `local_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 `categorizacion_nivel_id` int(11) NOT NULL,
 `titulo` varchar(255) NOT NULL,
 `descripcion` varchar(255) NOT NULL,
 `images` varchar(255) NOT NULL,
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- categorizacion_niveles	
CREATE TABLE `categorizacion_niveles` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `titulo` varchar(255) NOT NULL,
 `descripcion` varchar(255) NOT NULL,
 `min_puntos` int(11) NOT NULL,
 `max_puntos` int(11) NOT NULL,
 `created_at` datetime NOT NULL,
 `updated_at` datetime NOT NULL,
 `local_id` int(11) NOT NULL,
 `user_id` int(11) NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


-- categorizacion_periodos	
CREATE TABLE `categorizacion_periodos` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `categorizacion_id` int(11) NOT NULL,
 `local_id` int(11) NOT NULL,
 `fecha_inicio` date NOT NULL,
 `fecha_fin` date NOT NULL,
 `fecha_inicio_ant` date NOT NULL,
 `fecha_fin_ant` date NOT NULL,
 `descripcion` varchar(255) NOT NULL,
 `status` tinyint(1) NOT NULL,
 `updated_at` datetime NOT NULL,
 `created_at` datetime NOT NULL,
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;