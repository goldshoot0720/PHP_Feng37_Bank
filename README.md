# PHP_Feng37_Bank

一個使用 PHP 與 JavaScript 製作的簡易銀行存款紀錄工具。

這個專案保留原本的資料內容、銀行清單、存款輸入流程與彩蛋功能，並將介面重設計為偏 2026 到 2027 風格的科技感 UI。

## 功能

- 選擇金融機構並輸入存款金額
- 即時計算累積存款
- 使用 `localStorage` 暫存資料
- 透過 `process.php` 將資料寫回 `bank_savings.txt`
- 保留原本的彩蛋提示視窗

## 執行方式

在專案目錄下執行：

```powershell
php -S 127.0.0.1:8000 -t D:\codes\codexs\PHP_Feng37_Bank
```

然後打開：

```text
http://127.0.0.1:8000/index.php
```

## 主要檔案

- `index.php`
  主頁介面與科技風格樣式
- `myjs.js`
  前端互動、累積計算、彩蛋與資料送出
- `process.php`
  接收前端 JSON 並寫入文字檔
- `readFile.php`
  載入 `bank_savings.txt` 的資料到前端
- `bank_savings.txt`
  存款資料來源

## 這次改版重點

- 只改介面，不改原本功能內容
- 將舊版表單頁改為科技風格儀表板視覺
- 強化視覺層級、留白、背景氛圍與行動版排版
- 保留原始銀行選項與原始互動命名
