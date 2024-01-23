# TKR proovitöö

# MySQL Database Setup
Made using phpMyAdmin

```sh
CREATE DATABASE IF NOT EXISTS `users`;
```
```sh
USE users;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
```
```sh
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
```
