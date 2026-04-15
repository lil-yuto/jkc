# JKC WordPress Theme

WordPress のテーマ開発用のリポジトリです。
gulp を使って scss のコンパイル、画像圧縮、ブラウザシンクを行っています。
また、wp-env を使って WordPress の環境構築を行っています。

## 動作が確認できている環境

-   Node バージョン v22.11.0
-   Docker Desktop v4.38.0

## 使い方（WordPress のオリジナルテーマ開発の場合）

1. クローン or ダウンロードしたフォルダを vscode 等で開く
2. Docker Desktop を起動する
3. ターミナルを開き、`npm i`とコマンドを入力
4. node_modules と package-lock.json が生成されるのを確認する
5. `npm run wp:start`とコマンド入力し、wp-env を起動（WordPress の環境構築が行われる）
6. データベースをインポートする`npm run db:import`
7. `npx gulp`とコマンドを入力すると gulp が動き出す（gulp はブラウザシンク、scss コンパイル、画像圧縮の役割を担っている）
8. WordPress の管理画面（/wp-admin）に入り、テーマを開発中のものに変更（初期ユーザー名`admin`、初期パス`password`）

## 使い方（ブロックプラグイン作成の場合）

1. `dist/wp-content/plugins/jkc-block` をターミナルで開く
2. `npm run start`とコマンドを入力（ファイル監視・自動ビルド → `dist/wp-content/plugins/jkc-block/build`）
3. `dist/wp-content/plugins/jkc-block/src/blocks` にて、各ブロック開発を行う
4. リリース用には、`npm run build`とコマンドを入力してビルドしたものをアップする（`dist/wp-content/plugins/jkc-block/build`）

## 作業ディレクトリについて

-   sass の記述は `src/sass/` フォルダの中で行う
-   画像は `src/images/` の中に格納する
-   php と js は `dist/wp-content/themes/jkc/` 直下のファイルに直接記述する
-   プラグインは管理画面からインストールすると `dist/wp-content/plugins/` に自動的に格納される
-   メディアは管理画面からアップロードすると `dist/wp-content/uploads/` フォルダに自動的に格納される

## よく使うコマンドまとめ

| コマンド | 説明 |
|---|---|
| `npm i` | パッケージインストール |
| `npm run wp:start` | wp-env 起動（WordPress 環境の構築・起動） |
| `npm run wp:stop` | wp-env 停止 |
| `npm run wp:restart` | wp-env 再起動（設定更新あり） |
| `npm run wp:destroy` | wp-env 環境を完全削除 |
| `npm run db:import` | データベースをインポート |
| `npm run db:export` | データベースをエクスポート |
| `npx gulp` | SCSS コンパイル・画像圧縮・BrowserSync 起動 |

## テンプレートファイル一覧

| ファイル | 説明 |
|---|---|
| `header.php` | 全ページ共通ヘッダー |
| `footer.php` | 全ページ共通フッター |
| `front-page.php` | トップページ |
| `page-{slug}.php` | 固定ページ専用レイアウト |
| `archive-{slug}.php` | カスタム投稿タイプのアーカイブページ |
| `single-{slug}.php` | カスタム投稿タイプの詳細ページ |
| `taxonomy-{slug}.php` | タクソノミーのアーカイブページ |
| `template-*.php` | 名前付きテンプレート（固定ページ編集画面のサイドバー「テンプレート」で選択） |
| `parts-*.php` | パーツテンプレート（`get_template_part()` で呼び出し） |
| `functions/` | PHP 機能モジュール群 |
| `dist/wp-content/plugins/jkc-block/src/blocks/` | Gutenberg カスタムブロック |

### 固定ページテンプレート（page-*.php）

| ファイル名 | 対応固定ページ | スラッグ | 説明 |
|---|---|---|---|
| `page.php` | 専用テンプレートなし全固定ページ | — | フォールバック。Gutenbergブロック表示 |
| `page-aboutus.php` | JKCの活動内容 | `aboutus` | JKCについての親ページ |
| `page-events.php` | イベント | `events` | 競技会一覧の親ページ |
| `page-event_schedule.php` | ドッグショー 競技会スケジュール | `event_schedule` | `event_schedule` カスタム投稿タイプの一覧 |
| `page-checkclass.php` | ドッグショー出陳クラスの確認 | `checkclass` | — |
| `page-checkclass-2.php` | ドッグショー出陳クラスの結果 | `checkclass-2` | — |
| `page-3min.php` | 3分でわかるJKC | `3min` | 専用header/footer（`3min/`フォルダ）を使用 |
| `page-aikenshiiku.php` | 愛犬飼育管理士情報 | `aikenshiiku` | `aikenshiiku` カスタム投稿タイプをアコーディオン表示 |
| `page-training-institute-page.php` | 公認トリマー養成機関 | `training-institute-page` | `training-institute` カスタム投稿タイプを一覧表示 |

### カスタム投稿タイプ アーカイブ（archive-*.php）

| ファイル名 | カスタム投稿タイプ | 日本語名 | URL |
|---|---|---|---|
| `archive-news.php` | `news` | お知らせ | `/news/` |
| `archive-breeds.php` | `breeds` | 犬種紹介 | `/breeds/` |
| `archive-movie.php` | `movie` | JKCチャンネル | `/movie/` |
| `archive-results.php` | `results` | 過去の大会結果 | `/results/` |
| `archive-faq.php` | `faq` | よくあるご質問 | `/faq/` |
| `archive-generalinfo.php` | `generalinfo` | 総合案内 | `/generalinfo/` |
| `archive-gazette-article.php` | `gazette-article` | ガゼット掲載記事 | `/gazette-article/` |
| `archive-gazette.php` | `gazette` | ガゼットのご案内 | `/gazette/` |
| `archive-jblog.php` | `jblog` | ジャックブログ | `/jblog/` |
| `archive-rescuedog.php` | `rescuedog` | 災害救助犬の育成 | `/rescuedog/` |
| `archive-name_list.php` | `name_list` | 犬名リスト | `/name_list/` |
| `archive-qualifications.php` | `qualifications` / `qualification1` / `qualification2` | 公認資格 | `/qualifications/` |
| `archive-registr-statistics.php` | `registr-statistics` | 犬種別犬籍登録頭数 | `/registr-statistics/` |
| `archive-doginfo.php` | `doginfo` | 犬の知識 | `/doginfo/` |

### カスタム投稿タイプ 詳細（single-*.php）

| ファイル名 | カスタム投稿タイプ | 説明 |
|---|---|---|
| `single.php` | 専用テンプレートなし全カスタム投稿タイプ | フォールバック |
| `single-breeds.php` | `breeds` | 犬種詳細ページ |
| `single-jblog.php` | `jblog` | ブログ記事詳細 |
| `single-doginfo-kids.php` | `doginfo` | 犬の知識（タイトル固定） |

### タクソノミー アーカイブ（taxonomy-*.php）

| ファイル名 | タクソノミー | 紐付けカスタム投稿タイプ | URL |
|---|---|---|---|
| `taxonomy-news_category.php` | `news_category` | news, breeds, movie | `/news_category/{term}/` |
| `taxonomy-results_category.php` | `results_category` | results | `/results_category/{term}/` |
| `taxonomy-breed_category.php` | `breed_category` | breeds | `/breed_category/{term}/` |
| `taxonomy-faq_category.php` | `faq_category` | faq | `/faq_category/{term}/` |

### 名前付き・パーツテンプレート

| ファイル名 | 種別 | 説明 |
|---|---|---|
| `template-royalcaninaward.php` | 名前付きテンプレート | 「ページ属性 > テンプレート」で選択。スラッグから受賞犬を表示（group1〜group10） |
| `template-child-page-list.php` | 名前付きテンプレート | 「ページ属性 > テンプレート」で選択。子ページをリスト表示 |
| `parts-search-from-alphabet.php` | パーツ | `get_template_part()` で呼び出し。アルファベット検索フォーム |
| `parts-search-from-katakana.php` | パーツ | `get_template_part()` で呼び出し。カタカナ検索フォーム |
| `parts-searchform.php` | パーツ | `get_template_part()` で呼び出し。汎用検索フォーム |

### functions/ ファイル

| ファイル名 | 制御内容 |
|---|---|
| `functions.php` | 各モジュールの `require_once`（エントリーポイント） |
| `init.php` | REST API制限・author/attachmentページの404化 |
| `admin.php` | ナビゲーションメニュースロット登録・管理画面カラム |
| `cptui.php` | 18タクソノミーの登録（`register_taxonomy()`） |
| `editor.php` | Gutenbergカラーパレット・使用可能ブロック制限 |
| `editor-style.php` | エディター用CSSの登録 |
| `script.php` | CSS/JSのenqueue（CDNライブラリ含む） |
| `shortcode.php` | ショートコード9件の定義 |
| `get_eventday.php` | イベント日付フォーマット関数 |

### カスタムブロック（jkc-block）

-   ソース: `dist/wp-content/plugins/jkc-block/src/blocks/`
-   ビルド: プラグインディレクトリで `npm run start`（開発）または `npm run build`（本番）
-   ⚠️ `save.js` を変更すると既存投稿で「ブロックエラー」が発生する可能性があるため、変更前に影響範囲を確認すること
-   **表記について**: 「`button` / `button-item`」のような `/` は親子関係を表します。`button-item` は `button` ブロック内にのみ配置可能な子ブロックです。

| ブロック名 | 用途 |
|---|---|
| `heading` | 見出し（lv2〜lv5・アンカーリンク付き） |
| `text` | 本文テキスト |
| `button` / `button-item` | リンクボタン（グループ・単体） |
| `accordion` / `accordion-item` | アコーディオン（開閉パネル） |
| `tab` / `tab-item` | タブ切り替えパネル |
| `anchor-link` / `anchor-link-item` | ページ内アンカーリンク |
| `anchor-link-small` / `anchor-link-item-small` | アンカーリンク（コンパクト版） |
| `card-grid-1` / `card-grid-2` / `card-grid-3` / `card-grid-4` | カードグリッド（列数違いのみで構造は同じ） |
| `card-item-style-1` / `card-item-style-2` / `card-item-style-3` / `card-item-style-4` | カードアイテム（1〜3はボタンあり、4はボタンなし） |
| `media-text` / `media-text-ex` | 画像＋テキスト横並び |
| `list-ordered` / `list-unordered` | 番号付き・箇条書きリスト |
| `definition-list` / `definition-item` | 定義リスト（dl/dt/dd） |
| `flow-horizontal` / `flow-horizontal-title` / `flow-horizontal-title-text` | 横並びフロー図 |
| `flow-vertical` / `flow-vertical-item` / `flow-vertical-item-text` | 縦並びフロー図 |
| `text-link` / `text-link-item` | テキストリンク一覧 |
| `reference-info` | 参考情報・注釈ボックス |
| `contact` | お問い合わせ情報 |
| `contest` / `contest-item` | 大会情報表示 |
| `youtube` | YouTube動画埋め込み |

## トラブルシューティング

-   「公開に失敗しました。返答が正しい JSON レスポンスではありません。」エラーが発生して記事が保存できない場合は、パーマリンクを一度保存する。
-   BrowserSync（ポート 3000）からは記事の保存ができないので、wp-env のポート（8000）からアクセスすること。コーディング中は BrowserSync（ポート 3000）をブラウザで開く。
