-- Tạo database và bảng users
CREATE DATABASE IF NOT EXISTS tranhaidang_manguonmo_10baitap;
USE tranhaidang_manguonmo_10baitap;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Thêm user mẫu (password: 123456)
INSERT INTO users (username, email, password) VALUES 
('admin123', 'onlinekhoahoc750@gmail.com', '123456');