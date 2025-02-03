# 本番公開時の.env(yasumuraの場合)

```
APP_NAME=Messageboard
APP_ENV=production
APP_KEY=base64:LgGMtcPcEncIsUV+lKx8vhFEf5qXRftPRPe9pinK0A8=
APP_DEBUG=true
APP_URL=https://academy-php.sakura.ne.jp/messageboard

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=mysql3102.db.sakura.ne.jp
DB_PORT=3306
DB_DATABASE=academy-php_messages
DB_USERNAME=academy-php_messages
DB_PASSWORD=パスワードをここへ
```

※.env を更新したらキャッシュをクリアーすること
```sh
% php artisan config:clear
```
シーダーの実施
```sh
% php artisan db:seed --class=MessageSeeder
```
