# JKC WordPress Theme
WordPressのテーマ開発用のリポジトリです。
gulpを使ってscssのコンパイル、画像圧縮、ブラウザシンクを行っています。
また、wp-envを使ってWordPressの環境構築を行っています。

## 動作が確認できている環境
- Nodeバージョン v22.11.0
- Docker Desktop v4.38.0

## 使い方（WordPressのオリジナルテーマ開発の場合）
1. クローンorダウンロードしたフォルダをvscode等で開く
2. ターミナルを開き、`npm i`とコマンドを入力
3. node_modulesとpackage-lock.jsonが生成されるのを確認する
4. `npm run wp:start`とコマンド入力し、wp-envを起動（WordPressの環境構築が行われる）
5. データベースをインポートする`npm run db:import`
6. `npx gulp`とコマンドを入力するとgulpが動き出す（gulpはブラウザシンク、scssコンパイル、画像圧縮の役割を担っている）
7. WordPressの管理画面（/wp-admin）に入り、テーマを開発中のものに変更（初期ユーザー名`admin`、初期パス`password`）

## 使い方（ブロックプラグイン作成の場合）
1. dist/wp-content/plugins/jkc-blocksをターミナルで開く
2. `npm run start`とコマンドを入力（webpackが監視とビルドを自動でやる→dist/wp-content/plugins/jkc-block/build）
3. dist/wp-content/plugins/jkc-block/src/blocksにて、各ブロック開発を行う
4. リリース用には、`npm run build`とコマンドを入力してビルドしたものをアップする。（dist/wp-content/plugins/jkc-block/build）

## 作業ディレクトリについて
- sassの記述はsrcフォルダの中で行う
- 画像はsrcフォルダのimagesの中に格納する
- phpとjsはdist直下のファイルに直接記述する
- プラグインは管理画面からインストールするとdist/wp-content/plugins/に自動的に格納される
- メディアは管理画面からアップロードするとdist/wp-content/uploads/フォルダに自動的に格納される

## よく使うコマンドまとめ
- パッケージインストール `npm i`
- gulp起動 `npx gulp`
- wp-env起動 `npm run wp:start`
- wp-env停止 `wp:stop`
- データベースをインポート `npm run db:import`
- データベースをエクスポート `npm run db:export`

## 備考
- CSS設計はFLOCSS(https://github.com/hiloki/flocss )を採用
- rem記述を前提

## トラベルシューティング
- 「公開に失敗しました。返答が正しいJSONレスポンスではありません。」エラーが発生して記事が保存できない場合は、パーマリンクを一度保存する。
- gulpのブラウザシンクサーバー(ポート番号3000)からは記事の保存が出来ないので、.wp-env.jsonのポート番号(10011)からアクセスすること。コーディング中は、ブラウザシンクを使いたいので、ポート番号3000をブラウザで開く。