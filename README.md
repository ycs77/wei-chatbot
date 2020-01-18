# 小薇機器人

由 PHP 撰寫的 LINE 聊天機器人專案，串接[茉莉机器人](http://www.itpk.cn/)。

## 申請金鑰

### LINE Developers

開啟 [LINE Developers](https://developers.line.biz/) 新增 Messaging API 即可獲取金鑰，並關閉「自動回應訊息」和開啟「Webhook」。

### 茉莉机器人 (ITPK)

在 [茉莉机器人](http://www.itpk.cn/) 註冊帳號，並準備好金鑰，等一下要使用。

## 安裝

下載小薇機器人原始碼：

```
git clone https://github.com/ycs77/wei-chatbot.git
cd wei-chatbot
```

本地安裝：

```
composer install
```

線上環境安裝：

```
composer install -o --no-dev
```

複製環境變數，並設定 LINE Messaging API 和 茉莉机器人的金鑰：

```
cp .env.example .env
vim .env
```
