CREATE DATABASE IF NOT EXISTS shoppingmall CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE shoppingmall;

-- 사용자 테이블 (최적화된 길이, 제약조건 포함)
CREATE TABLE IF NOT EXISTS users (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

-- 장바구니 테이블 (외래키, 인덱스 포함)
CREATE TABLE IF NOT EXISTS cart (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT UNSIGNED NOT NULL,
    product_name VARCHAR(100) NOT NULL,
    quantity INT UNSIGNED DEFAULT 1 CHECK (quantity > 0),
    added_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user (user_id)
) ENGINE=InnoDB;
