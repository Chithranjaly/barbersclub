-- Barber's Club - Salon Management System
-- Database: salon
-- Updated: passwords are hashed using PHP password_hash(PASSWORD_DEFAULT)
-- Demo credentials:
--   Admin: admin@barbersclub.com / Admin@123
--   User:  user@barbersclub.com  / User@123

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
SET NAMES utf8mb4;

-- --------------------------------------------------------
-- Table: feedback
-- --------------------------------------------------------
CREATE TABLE `feedback` (
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `feedback` varchar(900) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `feedback` (`user_id`, `name`, `feedback`) VALUES
(2, 'John Demo', 'Great salon, excellent service and friendly staff!');

-- --------------------------------------------------------
-- Table: package
-- --------------------------------------------------------
CREATE TABLE `package` (
  `p_name` varchar(50) NOT NULL,
  `description` varchar(500) NOT NULL,
  `file` varchar(50) NOT NULL,
  `pack_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `package` (`p_name`, `description`, `file`, `pack_id`) VALUES
('Hair cut', 'Basic, extra deluxe, and ultimate versions are available', 'blog1.png', 1),
('Hair coloring', '15 min, 30 min, ultra-fast services are available', 'barber-frame.png', 2);

-- --------------------------------------------------------
-- Table: service
-- --------------------------------------------------------
CREATE TABLE `service` (
  `service_id` int(11) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `service_rate` varchar(10000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `service` (`service_id`, `p_name`, `service_name`, `description`, `service_rate`) VALUES
(1, 'Hair cut', 'Deluxe Hair Cut', 'Celebrity model look', 'Rs.200'),
(2, 'Hair coloring', 'Grey Coloring', '2 minutes and wash', 'Rs.150');

-- --------------------------------------------------------
-- Table: tbl_login
-- NOTE: Passwords are hashed with password_hash($pass, PASSWORD_DEFAULT)
--   Admin password: Admin@123
--   User password:  User@123
-- --------------------------------------------------------
CREATE TABLE `tbl_login` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `usertype` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_login` (`user_id`, `username`, `password`, `usertype`) VALUES
(1, 'admin@barbersclub.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin'),
(2, 'user@barbersclub.com',  '$2y$10$TKh8H1.PfbuNhLLMujYf5.fO09P8g4hFV8EXqKQIh2q.G1Z3Bm7Ly', 'user');

-- --------------------------------------------------------
-- Table: tbl_user_register
-- --------------------------------------------------------
CREATE TABLE `tbl_user_register` (
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `location` varchar(50) NOT NULL,
  `landmark` varchar(50) NOT NULL,
  `profile_image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `tbl_user_register` (`name`, `phone`, `email`, `address`, `user_id`, `location`, `landmark`, `profile_image`) VALUES
('Demo User', '9999999999', 'user@barbersclub.com', '123 Demo Street, Demo City', 2, 'Demo Location', 'Demo Landmark', 'default.jpg');

-- --------------------------------------------------------
-- Table: workers
-- --------------------------------------------------------
CREATE TABLE `workers` (
  `w_id` int(11) NOT NULL,
  `w_name` varchar(50) NOT NULL,
  `photo` varchar(50) NOT NULL,
  `description` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `workers` (`w_id`, `w_name`, `photo`, `description`) VALUES
(1, 'Alex', 'team3.png', 'Senior stylist with 5 years experience'),
(2, 'Sam', 'testimonial1.png', 'Specialist in hair coloring and treatments'),
(3, 'Chris', 'barber-work.png', 'Expert barber, known for clean fades');

-- --------------------------------------------------------
-- Table: appoinment (note: original spelling kept for compatibility)
-- --------------------------------------------------------
CREATE TABLE `appoinment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `amount` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------
-- Indexes
-- --------------------------------------------------------
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `package`
  ADD PRIMARY KEY (`pack_id`),
  ADD UNIQUE KEY `p_name` (`p_name`);

ALTER TABLE `service`
  ADD PRIMARY KEY (`service_id`),
  ADD KEY `p_name` (`p_name`);

ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `tbl_user_register`
  ADD PRIMARY KEY (`user_id`);

ALTER TABLE `workers`
  ADD PRIMARY KEY (`w_id`);

-- --------------------------------------------------------
-- AUTO_INCREMENT
-- --------------------------------------------------------
ALTER TABLE `package`
  MODIFY `pack_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `service`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `tbl_login`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `workers`
  MODIFY `w_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

-- --------------------------------------------------------
-- Foreign Key Constraints
-- --------------------------------------------------------
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user_register` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`p_name`) REFERENCES `package` (`p_name`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `tbl_user_register`
  ADD CONSTRAINT `tbl_user_register_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_login` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

COMMIT;
