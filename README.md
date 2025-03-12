# JKC WordPress Theme

WordPress のテーマ開発用のリポジトリです。
gulp を使って scss のコンパイル、画像圧縮、ブラウザシンクを行っています。
また、wp-env を使って WordPress の環境構築を行っています。

## 動作が確認できている環境

-   Node バージョン v22.11.0
-   Docker Desktop v4.38.0

## 使い方（WordPress のオリジナルテーマ開発の場合）

1. クローン or ダウンロードしたフォルダを vscode 等で開く
2. ターミナルを開き、`npm i`とコマンドを入力
3. node_modules と package-lock.json が生成されるのを確認する
4. `npm run wp:start`とコマンド入力し、wp-env を起動（WordPress の環境構築が行われる）
5. データベースをインポートする`npm run db:import`
6. `npx gulp`とコマンドを入力すると gulp が動き出す（gulp はブラウザシンク、scss コンパイル、画像圧縮の役割を担っている）
7. WordPress の管理画面（/wp-admin）に入り、テーマを開発中のものに変更（初期ユーザー名`admin`、初期パス`password`）

## 使い方（ブロックプラグイン作成の場合）

1. dist/wp-content/plugins/jkc-blocks をターミナルで開く
2. `npm run start`とコマンドを入力（webpack が監視とビルドを自動でやる →dist/wp-content/plugins/jkc-block/build）
3. dist/wp-content/plugins/jkc-block/src/blocks にて、各ブロック開発を行う
4. リリース用には、`npm run build`とコマンドを入力してビルドしたものをアップする。（dist/wp-content/plugins/jkc-block/build）

## 作業ディレクトリについて

-   sass の記述は src フォルダの中で行う
-   画像は src フォルダの images の中に格納する
-   php と js は dist 直下のファイルに直接記述する
-   プラグインは管理画面からインストールすると dist/wp-content/plugins/に自動的に格納される
-   メディアは管理画面からアップロードすると dist/wp-content/uploads/フォルダに自動的に格納される

## よく使うコマンドまとめ

-   パッケージインストール `npm i`
-   gulp 起動 `npx gulp`
-   wp-env 起動 `npm run wp:start`
-   wp-env 停止 `wp:stop`
-   データベースをインポート `npm run db:import`
-   データベースをエクスポート `npm run db:export`

## 備考

-   CSS 設計は FLOCSS(https://github.com/hiloki/flocss )を採用
-   rem 記述を前提

## トラベルシューティング

-   「公開に失敗しました。返答が正しい JSON レスポンスではありません。」エラーが発生して記事が保存できない場合は、パーマリンクを一度保存する。
-   gulp のブラウザシンクサーバー(ポート番号 3000)からは記事の保存が出来ないので、.wp-env.json のポート番号(10011)からアクセスすること。コーディング中は、ブラウザシンクを使いたいので、ポート番号 3000 をブラウザで開く。
