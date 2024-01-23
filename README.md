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
# Approximate time needed for tasks
| Task          | Time         |
| ------------- |:------------:|
| Setting up DB | 1 hour       |
| Styling       | 1.5 hours    |
| PHP           | 6 hours      |
| JS/AJAX       | 4.5 hours    |
| **TOTAL**     | ~13 hours    |
