git switch main       # 対象ブランチに切り替え
git pull

# 依存ライブラリのインストール
composer install --no-dev

# Laravel設定
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear