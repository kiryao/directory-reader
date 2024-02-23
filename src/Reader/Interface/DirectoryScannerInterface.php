<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Reader\Interface;

interface DirectoryScannerInterface
{
    public function scan(string $path): array;
}
