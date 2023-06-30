<?php
require 'dbconnect.php';

// リクエストからメッセージとユーザー名を取得
$message = $_POST['message'];
$username = $_POST['username'];
$boardId = $_POST['boardId'];

// メッセージをデータベースに保存
$query = "INSERT INTO messages (user_id, boardTitle, latitude, longitude, username) VALUES (:user_id, :boardTitle, :latitude, :longitude, :username)";
$statement = $pdo->prepare($query);
$statement->execute([
    ':user_id' => $boardId,
    ':boardTitle' => $message,
    ':latitude' => '', // メッセージの送信時の緯度
    ':longitude' => '', // メッセージの送信時の経度
    ':username' => $username
]);

echo "メッセージが送信されました。";
?>