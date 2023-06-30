# おさんぽデジタル掲示板

## DEMO

  - デプロイしていません

## 紹介と使い方

  - アカウント登録/ログインする
  - 自分のいる位置情報を取得して、その場所にデジタル掲示板を作成する
  - 作成した掲示板ではチャット形式でメッセージのやり取りができる
  - 作成された掲示板に再度アクセスするためには、掲示板の場所（位置情報）の近くまで行って検索する必要がある（その場所に行かないとデジタル掲示板にアクセスできない）

## 工夫した点

  - アカウント登録/ログイン機能をMySqlを使って実装した
  - ログイン完了後は次のページに自動遷移
  - 掲示板IDと位置情報を紐づけてMySqlに保存
  - 掲示板作成ボタンを押すと自動で新しいhtmlが作成される機能を実装した
  - 掲示板作成後に新しいのhtmlページに自動遷移

## 苦戦した点/できていないところ

  - 掲示板でのチャットがサーバーサイドとの連携でできていない（掲示板IDとの連携をどうすればいいのか悩み中）
  - Map上に過去の掲示板を表すPin表示をしたかったが、そこまでいきつかなかった。。

## 参考にした web サイトなど

  - ChatGPT
