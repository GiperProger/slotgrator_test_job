
## 1. Подготовка к разработке

### Клонирование репозитория библиотеки и проекта
```sh
# Клонируем репозиторий библиотеки
git clone git@github.com:your-org/library.git
cd library

# Создаем новую ветку для изменений
git checkout -b feature/update-library
```

### Внесение изменений в библиотеку
Вносим необходимые изменения в код библиотеки.

### Коммит и пуш изменений
```sh
git add .
git commit -m "Добавлено улучшение в библиотеку"
git push origin feature/update-library
```

## 2. Тестирование библиотеки в проекте

### Подключение измененной версии библиотеки в проект
```sh
# Клонируем репозиторий проекта
cd ../
git clone git@github.com:your-org/project.git
cd project

# Указываем репозиторий библиотеки как источник
composer config repositories.library '{"type": "vcs", "url": "git@github.com:your-org/library.git"}'

# Обновляем библиотеку до новой ветки
composer require your-org/library:dev-feature/update-library
```

### Запуск тестов
```sh
vendor/bin/phpunit
```
Если тесты прошли успешно, переходим к релизу библиотеки.

## 3. Релиз библиотеки

### Создание тега и релиза
```sh
cd ../library
git checkout main
git merge feature/update-library

git tag -a v1.2.0 -m "Релиз библиотеки v1.2.0"
git push origin v1.2.0
```

## 4. Обновление зависимости в проекте

### Обновление версии библиотеки
```sh
cd ../project
composer require your-org/library:^1.2
```

### Повторное тестирование проекта
```sh
vendor/bin/phpunit
```
Если тесты успешны, фиксируем обновление.

### Коммит изменений в проект
```sh
git add composer.json composer.lock
git commit -m "Обновление зависимости library до v1.2.0"
git push origin main
```

## 5. Релиз и деплой проекта

### Создание тега
```sh
git tag -a v2.3.0 -m "Релиз проекта v2.3.0"
git push origin v2.3.0
```

### Деплой
В зависимости от CI/CD пайплайна деплой может выполняться автоматически или вручную.

Если требуется ручной деплой:
```sh
ssh user@server
cd /path/to/project
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php-fpm reload
```