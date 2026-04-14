## Script de la base de Datos:
-- Crear la base de datos
CREATE DATABASE laravel_auth;

-- Usar la base ps
USE laravel_auth;

-- Tabla de usuarios
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL UNIQUE,
    email_verified_at TIMESTAMP NULL,
    password VARCHAR(255) NULL,
    
    -- Para login social (Google)
    provider VARCHAR(50) NULL,
    provider_id VARCHAR(100) NULL,

    remember_token VARCHAR(100) NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

-- Tabla para resetear contraseña
CREATE TABLE password_resets (
    email VARCHAR(150) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (email)
);