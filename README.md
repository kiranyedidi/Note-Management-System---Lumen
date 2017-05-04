# Note-Management-System---Lumen

This repository contains souce code files for the Note Management application, a system where a user can create, edit, delete, fetch his/her notes.

# DB account used for the project

# Database: `c1`

CREATE DATABASE IF NOT EXISTS `c1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;

USE `c1`;

# Table structure for table `users`

CREATE TABLE `users` (
  `id` bigint(64) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

# Dumping data for table `users`

INSERT INTO `users` (`id`, `name`, `email`, `password`, `updated_at`, `created_at`) VALUES
(1, 'Kiran Yedidi', 'kirankumar.yedidi@gmail.com', '$2y$10$crfKF31Ztx46oKeUxmNFpuiC1266uu5zc94/usOeA5bemetmEl8Rq', '2017-04-22 15:42:54', '2017-04-22 15:42:54');

# Instructions for running the project

1. Clone/download this repo and run composer install to install the required dependencies.
1. Run a PHP local developement server (php -S localhost:8000 -t public) or any other server you are comfortable with.
2. Install MySQL server using XAMPP, WAMP or LAMP (Configuration settings are saved in .env file : user - 'root' and password - '') and create database c1 (this DB is setup in the .env file) and the users table by running the above queries
4. Run mirgations (php artisan migrate), which will create a table structure for Notes table.
5. Now you are ready to run the application.
