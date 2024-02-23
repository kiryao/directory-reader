<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader;

use KirillGubenko\DirectoryReader\Reader\Interface\FileInfoProviderInterface;
use KirillGubenko\DirectoryReader\Reader\Interface\DirectoryScannerInterface;

class DirectoryReader
{
    public function __construct(
        private DirectoryScannerInterface $directoryScanner,
        private FileInfoProviderInterface $fileInfoProvider,
    ) {
    }

    public function getFiles(string $path): array
    {
        $directory = $this->directoryScanner->scan($path);
        return array_diff($directory, [".", ".."]);
    }

    public function getFileInfo(string $path): array
    {
        return $this->fileInfoProvider->getFileInfo($path);
    }

    public function getFilesWithInfo(string $path): array
    {
        $files = $this->getFiles($path);
        $result = [];
        foreach ($files as $file) {
            $filePath = $path . '/' . $file;
            if (is_file($filePath)) {
                $result[$file] = $this->getFileInfo($filePath);
            }
        }
        return $result;
    }
}
