## Laravelのスプレッドシート書き込み処理のサンプル

想定環境は以下です。
- Laravel11
- PHP8.2またはそれ以上
- Laravel seilによるdocker環境

## 環境設定
1.[GCP](https://console.cloud.google.com/)コンソールよりsheets APIの有効化設定を行なってください。

2.書き込み対象のスプレッドシートIDを.envに追記してください
```
SPREADSHEET_ID="スプレッドシートID"
```

3.クレデンシャル情報はjsonファイルでDLし、storage/app/private配下に設置してください。

設置後、.envに以下を追記
```
SPREADSHEET_CREDEINTIALS_NAME="jsonファイル名"
```
