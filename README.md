# こころログ
## 概要
こころログは、メンタル系疾患で通院中の方が、日々の行動や気分を手軽に記録できるアプリケーションです。
「毎日の小さな変化に気づき、自己管理をサポートする」ことを目的に開発しました。

アプリケーション：~https://test-route-0401.com~
（コスト削減のためアプリは現在一時的にクローズ中です）

## 特徴
- シンプルな入力画面で、記録のハードルを下げる設計

- 気分スコアと行動内容をセットで記録可能

= 日々の記録をダッシュボードで可視化し、振り返りを支援

- データのCSVエクスポート対応で主治医への共有も容易に

## 主な機能一覧
- ユーザー登録・認証機能（Laravel Breeze使用）

- 今日の記録入力（気分スコア、行動内容） 

- 過去記録の一覧表示・編集・削除

- ダッシュボード表示（最新の記録を強調表示）

- プロフィール編集（基本情報）

- CSVエクスポート機能（行動記録のダウンロード）

## 技術スタック
- バックエンド: PHP 8.2 / Laravel 10

- フロントエンド: Bladeテンプレート / Tailwind CSS

- インフラ・デプロイ: Docker / AWS EC2

- データベース: MySQL 8.0

- その他: Git / GitHub / Laravel Sail (ローカル環境構築)

## 開発背景
メンタル疾患患者さんが「気軽に」「負担なく」使える記録アプリを目指しました。

紙の記録が負担だったり、既存アプリが高機能すぎて続かないという課題をヒアリングし、機能を最小限に絞り込みました。

医療機関への提出用に、CSVエクスポート機能も搭載しました。
