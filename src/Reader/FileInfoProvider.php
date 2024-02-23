<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Reader;

use KirillGubenko\DirectoryReader\Verifier\Interface\VerifierInterface;
use KirillGubenko\DirectoryReader\Reader\Interface\FileInfoProviderInterface;

class FileInfoProvider implements FileInfoProviderInterface
{
    public function __construct(private VerifierInterface $verifier)
    {
    }

    public function getFileInfo(string $path): array
    {
        $this->verifier->verify($path);

        return [
            'size' => filesize($path),
            'last_modified' => filemtime($path),
            'permissions' => substr(sprintf('%o', fileperms($path)), -4)
        ];
    }
}
