-- Simple Money Tracker データベース初期化

-- データベースの使用
USE money_tracker;

-- usersテーブル (ユーザー管理)
CREATE TABLE IF NOT EXISTS users (

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- transactionsテーブル (収支管理)
CREATE TABLE IF NOT EXISTS transactions (

) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- テスト用ユーザーを追加 (パスワード: "test_password" をハッシュ化したもの)
-- 実際の運用では、アプリケーション側からpassword_hash()で登録すること
INSERT INTO users (username, password) VALUES
('test_user', '$2y$10$lLQp1LhNQx663eFhtZX0X.bmsXQAJU0yUK6YdPXr9DBeWQQzy2RHC');