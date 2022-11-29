CREATE DATABASE IF NOT EXISTS `bd_tecStart`;
USE `bd_tecStart`;

CREATE TABLE IF NOT EXISTS `workers` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `company_name` VARCHAR(50),
    `name` VARCHAR(50) NOT NULL,
    `cpf` int(11) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `phone` int(20) NOT NULL,
    `description` VARCHAR(100) NOT NULL,
    `photo` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `clients` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `lastname` VARCHAR(50) NOT NULL,
    `cpf` VARCHAR(50) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `field` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
);

CREATE TABLE IF NOT EXISTS `worker_categories` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_worker` int(11) NOT NULL,
    `id_category` int(11) NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`id_worker`) REFERENCES `workers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY(`id_category`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `evaluations` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `id_worker` int(11) NOT NULL,
    `id_client` int(11) NOT NULL,
    `title` VARCHAR(50) NOT NULL,
    `service` VARCHAR(50) NOT NULL,
    `text` VARCHAR(50) NOT NULL,
    `date` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`),
    FOREIGN KEY(`id_worker`) REFERENCES `workers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
    FOREIGN KEY(`id_client`) REFERENCES `clients` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
);

CREATE TABLE IF NOT EXISTS `admin` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` VARCHAR(50) NOT NULL,
    `password` VARCHAR(100) NOT NULL,
    `email` VARCHAR(50) NOT NULL,
    PRIMARY KEY(`id`)
);

INSERT INTO `categories` (`field`) VALUES ("Construção"),("Marcenaria"),("Elétrica"),("Jardinagem"),("Faxina"),("Informática"),("Outros");