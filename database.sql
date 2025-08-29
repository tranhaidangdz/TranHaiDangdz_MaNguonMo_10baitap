-- Tạo database và bảng users
CREATE DATABASE IF NOT EXISTS tranhaidang_manguonmo;
USE tranhaidang_manguonmo;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Thêm user mẫu (password: 123456)
INSERT INTO users (username, email, password) VALUES 
('admin', 'admin@example.com', '123456');