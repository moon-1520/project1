CREATE DATABASE shoppingmall;

USE shoppingmall;

-- 회원 테이블
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- 장바구니 테이블
CREATE TABLE cart (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_name VARCHAR(100),
    quantity INT DEFAULT 1,
    FOREIGN KEY (user_id) REFERENCES users(id)
);
