# Directory Reader

Класс-помощник, который выводит содержимое переданной директории

## Требования

- PHP>=8

## Установка

```bash
composer require kirill-gubenko/directory-reader
```

## Использование

```
<?php

$directoryReader = new DirectoryReader();
print_r($directoryReader->getFiles(__DIR__)); // returns array
```
