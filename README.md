# 概要
Laravelで開発を行う際のテンプレートリポジトリ

# git clone後に実行すること
```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs
```

.envの作成  
`cp .env.example .env`

起動  
`sail up -d`

key作成  
`sail artisan key:generate`

php cs fixerのインストール
`composer install  --working-dir=tools/php-cs-fixer`

# 主要パッケージ
- Laravel sail
- Larastan

# Larastanの実行
`./vendor/bin/phpstan analyse`

# PHP CS Fixerの実行
`tools/php-cs-fixer/vendor/bin/php-cs-fixer fix app`

# ドキュメント
## ER図
PlantUMLを使用して作成  
documents/er-figure  