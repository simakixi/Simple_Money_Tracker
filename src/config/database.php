<?php
/**
 * データベース接続設定
 *
 * セキュリティのため、このファイルは.gitignoreに含めること
 */

// Docker環境の環境変数から取得
$db_host = getenv('DB_HOST') ?: 'db';
$db_name = getenv('DB_NAME') ?: 'money_tracker';
$db_user = getenv('DB_USER') ?: 'user';
$db_password = getenv('DB_PASSWORD') ?: 'password';

try {
    $pdo = new PDO(
        "mysql:host=$db_host;dbname=$db_name;charset=utf8mb4",
        $db_user,
        $db_password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ]
    );
} catch (PDOException $e) {
    // 本番環境では詳細なエラーメッセージを表示しない
    error_log("Database connection error: " . $e->getMessage());
    die("データベース接続エラーが発生しました。");
}