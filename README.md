## Введение

Directory Reader — класс-помощник, который выводит содержимое переданного пути без ссылок на родительскую папку и текущую.

## Требования

- [PHP](https://php.net) >= 8

## Установка

```bash
composer require kirill-gubenko/directory-reader
```

## Использование

```php
<?php

$directoryReader = new DirectoryReader();
print_r($directoryReader->getFiles(__DIR__)); // Returns array
```
