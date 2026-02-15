<?php
/**
 * Simple Money Tracker - エントリーポイント
 */

// エラー表示（開発環境のみ）
ini_set('display_errors', 1);
error_reporting(E_ALL);

// データベース接続
require_once '../config/database.php';

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Money Tracker</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.3);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #667eea;
            margin-bottom: 10px;
            text-align: center;
        }
        .subtitle {
            color: #666;
            text-align: center;
            margin-bottom: 30px;
        }
        .status {
            background: #f0f9ff;
            border-left: 4px solid #0ea5e9;
            padding: 15px;
            margin-bottom: 20px;
        }
        .status h3 {
            color: #0369a1;
            margin-bottom: 10px;
        }
        .status-item {
            display: flex;
            justify-content: space-between;
            padding: 5px 0;
        }
        .status-label {
            color: #666;
        }
        .status-value {
            font-weight: bold;
            color: #0ea5e9;
        }
        .success {
            color: #10b981;
        }
        .error {
            color: #ef4444;
        }
        .info-box {
            background: #f9fafb;
            padding: 15px;
            border-radius: 5px;
            margin-top: 20px;
        }
        .info-box h4 {
            color: #374151;
            margin-bottom: 10px;
        }
        .info-box ul {
            list-style-position: inside;
            color: #6b7280;
        }
        .info-box li {
            padding: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Simple Money Tracker</h1>
        <p class="subtitle">収支管理Webアプリケーション</p>

        <div class="status">
            <h3>環境構築ステータス</h3>
            <?php
            try {
                // データベース接続テスト
                $stmt = $pdo->query("SELECT COUNT(*) as user_count FROM users");
                $userCount = $stmt->fetch()['user_count'];

                $stmt = $pdo->query("SELECT COUNT(*) as transaction_count FROM transactions");
                $transactionCount = $stmt->fetch()['transaction_count'];

                echo '<div class="status-item">';
                echo '<span class="status-label">データベース接続:</span>';
                echo '<span class="status-value success">✓ 成功</span>';
                echo '</div>';

                echo '<div class="status-item">';
                echo '<span class="status-label">登録ユーザー数:</span>';
                echo '<span class="status-value">' . $userCount . ' 人</span>';
                echo '</div>';

                echo '<div class="status-item">';
                echo '<span class="status-label">収支データ数:</span>';
                echo '<span class="status-value">' . $transactionCount . ' 件</span>';
                echo '</div>';

            } catch (PDOException $e) {
                echo '<div class="status-item">';
                echo '<span class="status-label">データベース接続:</span>';
                echo '<span class="status-value error">✗ 失敗</span>';
                echo '</div>';
                echo '<p class="error">エラー: ' . htmlspecialchars($e->getMessage()) . '</p>';
            }
            ?>
        </div>

        <div class="info-box">
            <h4>アクセス情報:</h4>
            <ul>
                <li>Webアプリ: <a href="http://localhost:8080" target="_blank">http://localhost:8080</a></li>
                <li>phpMyAdmin: <a href="http://localhost:8081" target="_blank">http://localhost:8081</a></li>
            </ul>
        </div>
    </div>
</body>
</html>