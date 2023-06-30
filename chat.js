// チャットページの要素を取得
const chatContainer = document.getElementById('chatContainer');
const messageInput = document.getElementById('messageInput');
const sendButton = document.getElementById('sendButton');
const boardId = '掲示板のID'; // 掲示板のIDを設定

// メッセージ送信時の処理
function sendMessage() {
    const message = messageInput.value.trim();

    if (message !== '') {
        // 自分のメッセージとして表示するため、右側に配置
        const messageElement = createMessageElement('自分', message, true);
        chatContainer.appendChild(messageElement);

        // メッセージを送信するための処理
        const formData = new FormData();
        formData.append('message', message);
        formData.append('username', 'ユーザー名'); // ログインユーザーのユーザー名を設定
        formData.append('boardId', boardId);

        fetch('post_message2.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(result => {
            console.log(result);  // メッセージ送信成功時の処理
        })
        .catch(error => {
            console.error('エラー:', error);  // エラーハンドリング
        });

        // メッセージ入力欄をクリアする
        messageInput.value = '';
    }
}

// メッセージ要素を作成する関数
function createMessageElement(username, content, isOwnMessage) {
    const messageElement = document.createElement('div');
    messageElement.className = 'message';
    if (isOwnMessage) {
        messageElement.classList.add('own-message');
    }

    const usernameElement = document.createElement('span');
    usernameElement.className = 'username';
    usernameElement.textContent = username;

    const contentElement = document.createElement('span');
    contentElement.className = 'content';
    contentElement.textContent = content;

    messageElement.appendChild(usernameElement);
    messageElement.appendChild(contentElement);

    return messageElement;
}

// メッセージ送信ボタンのクリックイベントリスナーを設定
sendButton.addEventListener('click', sendMessage);

// メッセージ入力欄でEnterキーが押された場合の処理
messageInput.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault(); // Enterキーによる改行を防止
        sendMessage();
    }
});