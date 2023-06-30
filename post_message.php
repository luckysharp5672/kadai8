<?php
include 'dbconnect.php';

// リクエストからユーザー名、メッセージ、緯度、経度を取得
$username = $_POST['username'];
$boardTitle = $_POST['boardTitle'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// メッセージをデータベースに保存
$query = "INSERT INTO messages (username, boardTitle, latitude, longitude) VALUES (:username, :boardTitle, :latitude, :longitude)";
$statement = $pdo->prepare($query);
$statement->execute([
    ':username' => $username,
    ':boardTitle' => $boardTitle,
    ':latitude' => $latitude,
    ':longitude' => $longitude
]);

// 最後に挿入されたメッセージのIDを取得
$boardId = $pdo->lastInsertId();

// 新しいHTMLファイル名を作成
$htmlFileName = 'chat_' . $boardId . '.html';

// 新しいHTMLファイルを作成し、内容を書き込む
$htmlContent = <<<HTML
<!DOCTYPE html>
<html>
<head>
    <title>{$boardTitle}</title>
    <meta charset="UTF-8">
    <style>
        .chat-container {
            width: 100%;
            height: 400px;
            overflow-y: scroll;
        }

        .message {
            display: flex;
            margin-bottom: 10px;
        }

        .message .username {
            font-weight: bold;
            margin-right: 5px;
        }

        .message .content {
            background-color: #f2f2f2;
            padding: 5px;
            border-radius: 5px;
            max-width: 80%;
        }

        .own-message {
            justify-content: flex-end;
        }
    </style>
</head>
<body>
    <h1>{$boardTitle}</h1>
    <div class="chat-container" id="chatContainer"></div>
    <div>
        <textarea id="messageInput"></textarea>
        <button id="sendButton">刻む</button>
    </div>

    <script src="/php2_yoshii_53/chat.js"></script>
</body>
</html>
HTML;

file_put_contents($htmlFileName, $htmlContent);

// 新しいHTMLファイルの名前をレスポンスとして返す
echo $htmlFileName;

?>
