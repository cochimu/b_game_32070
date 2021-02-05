## 使用技術
- フロントエンド
* HTML/CSS

- バックエンド
* PHP 7.4.14
* Laravel 8.24.0

- インフラ
* Docker 20.10.2
* Docker-compose 1.27.4
* nginx 1.18.0
* mysql 8.0.23


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

## memos テーブル

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
