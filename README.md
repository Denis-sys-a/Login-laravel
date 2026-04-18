## Script de la base de Datos:

CREATE DATABASE IF NOT EXISTS `laravel_auth`
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE `laravel_auth`;

---

-- Tabla: users
-- Para almacenar usuarios registrados (normal y Google OAuth)

---

CREATE TABLE `users` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
`name` VARCHAR(255) NOT NULL,
`email` VARCHAR(255) NOT NULL,
`email_verified_at` TIMESTAMP NULL DEFAULT NULL,
`password` VARCHAR(255) NULL DEFAULT NULL,
`provider` VARCHAR(255) NULL DEFAULT NULL,
`provider_id` VARCHAR(255) NULL DEFAULT NULL,
`remember_token` VARCHAR(100) NULL DEFAULT NULL,
`created_at` TIMESTAMP NULL DEFAULT NULL,
`updated_at` TIMESTAMP NULL DEFAULT NULL,

    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: password_reset_tokens
-- Almacenar tokens para recuperación de contraseña

---

CREATE TABLE `password_reset_tokens` (
`email` VARCHAR(255) NOT NULL,
`token` VARCHAR(255) NOT NULL,
`created_at` TIMESTAMP NULL DEFAULT NULL,

    PRIMARY KEY (`email`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: sessions
-- Almacenar las sesiones activas de los usuarios

---

CREATE TABLE `sessions` (
`id` VARCHAR(255) NOT NULL,
`user_id` BIGINT UNSIGNED NULL DEFAULT NULL,
`ip_address` VARCHAR(45) NULL DEFAULT NULL,
`user_agent` TEXT NULL DEFAULT NULL,
`payload` LONGTEXT NOT NULL,
`last_activity` INT NOT NULL,

    PRIMARY KEY (`id`),
    KEY `sessions_user_id_index` (`user_id`),
    KEY `sessions_last_activity_index` (`last_activity`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: cache
-- Almacenar el caché de la aplicación

---

CREATE TABLE `cache` (
`key` VARCHAR(255) NOT NULL,
`value` MEDIUMTEXT NOT NULL,
`expiration` INT NOT NULL,

    PRIMARY KEY (`key`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: cache_locks
-- Gestionar los bloqueos del sistema de caché

---

CREATE TABLE `cache_locks` (
`key` VARCHAR(255) NOT NULL,
`owner` VARCHAR(255) NOT NULL,
`expiration` INT NOT NULL,

    PRIMARY KEY (`key`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: jobs
-- Cola de trabajos en segundo plano

---

CREATE TABLE `jobs` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
`queue` VARCHAR(255) NOT NULL,
`payload` LONGTEXT NOT NULL,
`attempts` TINYINT UNSIGNED NOT NULL,
`reserved_at` INT UNSIGNED NULL DEFAULT NULL,
`available_at` INT UNSIGNED NOT NULL,
`created_at` INT UNSIGNED NOT NULL,

    PRIMARY KEY (`id`),
    KEY `jobs_queue_index` (`queue`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: job_batches
-- Agrupar múltiples jobs en lotes para procesamiento

---

CREATE TABLE `job_batches` (
`id` VARCHAR(255) NOT NULL,
`name` VARCHAR(255) NOT NULL,
`total_jobs` INT NOT NULL,
`pending_jobs` INT NOT NULL,
`failed_jobs` INT NOT NULL,
`failed_job_ids` LONGTEXT NOT NULL,
`options` MEDIUMTEXT NULL DEFAULT NULL,
`cancelled_at` INT NULL DEFAULT NULL,
`created_at` INT NOT NULL,
`finished_at` INT NULL DEFAULT NULL,

    PRIMARY KEY (`id`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

---

-- Tabla: failed_jobs
-- Registrar jobs que fallaron durante su ejecución

---

CREATE TABLE `failed_jobs` (
`id` BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
`uuid` VARCHAR(255) NOT NULL,
`connection` TEXT NOT NULL,
`queue` TEXT NOT NULL,
`payload` LONGTEXT NOT NULL,
`exception` LONGTEXT NOT NULL,
`failed_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,

    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
