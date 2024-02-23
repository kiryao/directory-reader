# Directory Reader

Библиотека для чтения содержимого указанного каталога. Она позволяет получить информацию о файлах и их свойствах.

## Требования

- [PHP](https://php.net) >= 8

## Установка

Вы можете установить библиотеку с помощью Composer:

```bash
composer require kirill-gubenko/directory-reader
```

## Использование

Для удобства создания объекта класса используется Фабричный метод:

```php
<?php

require 'vendor/autoload.php';

use KirillGubenko\DirectoryReader\Factory\DirectoryReaderFactory;

$directoryReader = DirectoryReaderFactory::create();
```

Или создание через объекты всех зависимых классов:

```php
<?php

require 'vendor/autoload.php';

use KirillGubenko\DirectoryReader\Factory\DirectoryReaderFactory;

$directoryVerifier = new DirectoryVerifier();
$directoryScanner = new DirectoryScanner($directoryVerifier);

$fileVerifier = new FileVerifier();
$fileInfoProvider = new FileInfoProvider($fileVerifier);

$directoryReader = new DirectoryReader($directoryScanner, $fileInfoProvider);
```

### Конструктор основного класса

#### `__construct(DirectoryScannerInterface $directoryScanner, FileInfoProviderInterface $fileInfoProvider)`

Конструктор класса `DirectoryReader`, который принимает два параметра: `$directoryScanner` и `$fileInfoProvider`, реализующих интерфейсы `DirectoryScannerInterface` и `FileInfoProviderInterface`.

### Методы

#### `getFiles(string $path): array`

Метод `getFiles` возвращает массив файлов в указанном пути к каталогу, исключая ссылки на родительскую папку и текущую папку.

```php
<?php

// Получение массива файлов
print_r($directoryReader->getFiles('/путь/к/каталогу'));
```

#### `getFileInfo(string $path): array`

Метод `getFileInfo` возвращает информацию о файле в виде массива по указанному пути к файлу:

- `'size'` размер файла;
- `'last_modified'` дата последнего изменения файла в формате временной метки Unix;
- `'permissions'` разрешения доступа к файлу.

```php
<?php

// Получение информации в виде массива о конкретном файле
print_r($directoryReader->getFileInfo('/путь/к/файлу.txt'));
```

#### `getFilesWithInfo(string $path): array`

Метод `getFilesWithInfo` возвращает массив файлов с информацией о каждом файле в указанном пути к директории. Метод использует методы `getFiles` и `getFileInfo` для получения массива файлов и информации о каждом файле. Метод пропускает все другие директории внутри текущей директории.

```php
<?php

// Получение массиваы файлов с информацией
print_r($directoryReader->getFilesWithInfo('/путь/к/каталогу'));
```
