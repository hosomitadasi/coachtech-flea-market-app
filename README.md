# coachtech-flea-market-app
## 環境構築
Dockerビルド
・git clone git@github.com:coachtech-material/laravel-docker-template.git

・mv laravel-docker-template coachtech-flea-market-app

・docker-compose up -d --build

Laravel環境構築
・docker-compose exec php bash

・composer install

・cp .env.examle.env

・php artisan migrate

・php artisan db seed

## 開発環境
・お問い合わせ画面：http://localhost/

・ユーザー登録：http://localhost/register

・phpMyAdmin：http://localhost:8080/

使用技術（実行環境）
・Laravel:8.83.8

・PHP:7.4.9

・fortify:1.19

・nginx:1.21.1

・mysql:8.0.26

## ER図

