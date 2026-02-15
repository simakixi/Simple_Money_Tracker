-- Simple Money Tracker データベース初期化

-- データベースの使用
USE money_tracker;

-- usersテーブル (ユーザー管理)
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_username (username)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- transactionsテーブル (収支管理)
CREATE TABLE IF NOT EXISTS transactions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    amount INT NOT NULL COMMENT '正の数なら収入、負の数なら支出',
    date DATE NOT NULL,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_date (user_id, date),
    INDEX idx_date (date)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- テスト用ユーザーを追加 (パスワード: "test_password" をハッシュ化したもの)
-- 実際の運用では、アプリケーション側からpassword_hash()で登録すること
INSERT INTO users (username, password) VALUES
('test_user', '$2y$10$lLQp1LhNQx663eFhtZX0X.bmsXQAJU0yUK6YdPXr9DBeWQQzy2RHC');