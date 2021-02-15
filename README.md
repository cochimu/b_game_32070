## B_GAME

ボードゲームの作成者が作成したボードゲームを紹介するためのアプリです。

URL：http://54.150.112.224:10080/

## 概要

ボードゲームからB_GAMEという名前にしました。

ログインしたユーザーがボードゲームを紹介するための投稿ができます。
作成者は個人も企業も存在するため、特に規制はしておりません。
投稿する内容は、ボードゲーム名、説明、プレイ人数、プレイ時間です。
プレイ時間やプレイ人数によって検索ができた方がユーザーにとって使いやすいと考えました。
コメントできるようになっており、質問やプレイの感想などを想定しています。
リアルな感想があった方が次回作への励みになるかと思い機能として取り入れました。

## 開発した背景

こちらのアプリを作成した理由は以下の3点です。

1. コロナによる販売機会の減少により困っている作成者がいるのではないかと思った。
2. 購入者によるレビューサイトやプレイ動画はたくさんあるが、作成者が紹介しているものはない。
   作成者がどんな思いで、どんな風に遊んで欲しいのか分かると遊ぶのがより楽しいのではないかと考えた。
3. 私自身がボードゲームが大好き。

## 機能

- ユーザー管理機能
* ユーザー新規登録
* ログイン、ログアウト

- 投稿機能(CRUD)
* ボードゲームの投稿、編集、削除、一覧表示
* 画像アップロード機能(AWS S3バケット)

- コメント機能
実装中です。

- 検索機能
実装中です。

- レスポンシブデザイン
* Bootstrap


## 画面イメージ



## 使用技術
- フロントエンド
* HTML / CSS / Bootstrap
* JavaScript

- バックエンド
* PHP 7.4.14
* Laravel 8.24.0

- インフラ
* Docker 20.10.2
* Docker-compose 1.27.4
* nginx 1.18.0
* mysql 8.0.23
* AWS(EC2,S3,IAM)


## テーブル設計

## users テーブル

| Column     | Type   | Options     |
| ---------- | ------ | ----------- |
| id         |        |             |
| name       | string | null: false |
| email      | string | null: false |
| password   | string | null: false |

### Association

- has_many :games
- has_many :comments

## games テーブル

| Column          | Type       | Options                        |
| --------------- | ---------- | ------------------------------ |
| id              |            |                                |
| user_id         | bigInteger | null: false, foreign_key: true |
| name            | string     | null: false                    |
| describe        | text       | null: false                    |
| play_time       | integer    | null: false                    |
| players_minimum | integer    | null: false                    |
| players_max     | integer    | null: false                    |

### Association

- belongs_to :user
- has_many :comments

## comments テーブル

| Column  | Type       | Options                        |
| ------- | ---------- | ------------------------------ |
| id      |            |                                |
| user_id | bigInteger | null: false, foreign_key: true |
| game_id | bigInteger | null: false, foreign_key: true |
| text    | text       | null: false                    |

### Association

- belongs_to :user
- belongs_to :game