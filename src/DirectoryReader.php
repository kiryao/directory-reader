<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader;

class DirectoryReader
{
    public function getFiles(string $path): array|bool
    {
        return array_diff(scandir($path), [".", ".."]);
    }
}
