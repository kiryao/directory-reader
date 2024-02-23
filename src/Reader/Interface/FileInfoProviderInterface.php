<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Reader\Interface;

interface FileInfoProviderInterface
{
    public function getFileInfo(string $path): array;
}
