# TextGuard — PHP text protection library

## Description

**TextGuard** is a lightweight PHP library for protecting text from copying and automatic analysis. The library uses an approach with a custom font and a character replacement table: when displayed, the text looks fine, but when copied or extracted programmatically, the contents turn out to be distorted.

## Working principle

1. A special font (`keyfont.ttf`) is connected to the page, in which Unicode characters are reassigned to arbitrary codes.
2. The text passes through the replacement table before output (`keyTable.json`), which replaces each character with the corresponding font code.
3. Visually, the text is displayed correctly (the font "knows" how to show the correct glyph), but when copying, highlighting, or parsing, meaningless characters are extracted.

## Installation

Copy the following files to your project directory:

- `textguard.php ` is the main library file
- `keyfont.ttf' is a custom font with reassigned characters
- `keyTable.json` — character matching table

## Connection

```php
<?php
require_once 'textguard.php';
?>
```

## Usage

### Connecting the font

In the `<style>` section of your HTML, type the CSS to connect the font.:

```php
<style>
<?php fontConection(); ?>
</style>
```

### Secure text output

``php
<?php pr_tg("Your secret text"); ?>
``

The text will be displayed visually correctly, but the contents will be unreadable when copied.

### Debugging

To view the character codes, use the `pr_d()` function:

``php
<?php pr_d("A"); ?>
``

Outputs: source UCS code → replaced code → font symbol.

## Functions

| Function | Description |
|---------|----------|
| `fontConection()` | Outputs CSS rules `@font-face` for enabling custom font |
| `pr_tg($val)` | Outputs protected text with replacement characters according to the table |
| `pr_d($val)` | Debugging function — shows the character codes before and after the replacement |

## File structure

```
server/
,── textguard.php # Library with functions
├── keyfont.ttf # Custom font (based on Roboto)
└── keyTable.json # Character Replacement table
``


## Note

The font is based on **Roboto** from Google.

#TextGuard — PHP библиотека защиты текста

## Описание

**TextGuard** — лёгкая PHP-библиотека для защиты текста от копирования и автоматического анализа. Библиотека использует подход с кастомным шрифтом и таблицей замены символов: при отображении текст выглядит нормально, но при копировании или программном извлечении содержимое оказывается искажённым.

## Принцип работы

1. На страницу подключается специальный шрифт (`keyfont.ttf`), в котором символы Unicode переназначены на произвольные коды
2. Текст перед выводом проходит через таблицу замены (`keyTable.json`), которая заменяет каждый символ на соответствующий код из шрифта
3. Визуально текст отображается корректно (шрифт «знает», как показать правильный глиф), но при копировании, выделении или парсинге извлекаются бессмысленные символы

## Установка

Скопируйте следующие файлы в директорию вашего проекта:

- `textguard.php` — основной файл библиотеки
- `keyfont.ttf` — кастомный шрифт с переназначенными символами
- `keyTable.json` — таблица соответствия символов

## Подключение

```php
<?php
require_once 'textguard.php';
?>
```

## Использование

### Подключение шрифта

В секции `<style>` вашего HTML выведите CSS для подключения шрифта:

```php
<style>
<?php fontConection(); ?>
</style>
```

### Вывод защищённого текста

```php
<?php pr_tg("Ваш секретный текст"); ?>
```

Текст будет отображаться визуально корректно, но при копировании содержимое будет нечитаемо.

### Отладка

Для просмотра кодов символов используйте функцию `pr_d()`:

```php
<?php pr_d("А"); ?>
```

Выведет: исходный UCS-код → заменённый код → символ шрифта.

## Функции

| Функция | Описание |
|---------|----------|
| `fontConection()` | Выводит CSS-правила `@font-face` для подключения кастомного шрифта |
| `pr_tg($val)` | Выводит защищённый текст с заменой символов по таблице |
| `pr_d($val)` | Отладочная функция — показывает коды символа до и после замены |

## Структура файлов

```
server/
├── textguard.php    # Библиотека с функциями
├── keyfont.ttf      # Кастомный шрифт (на основе Roboto)
└── keyTable.json    # Таблица замены символов
```


## Примечание

Шрифт основан на **Roboto** от Google.
