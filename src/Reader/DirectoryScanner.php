<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Reader;

use KirillGubenko\DirectoryReader\Verifier\Interface\VerifierInterface;
use KirillGubenko\DirectoryReader\Reader\Interface\DirectoryScannerInterface;

class DirectoryScanner implements DirectoryScannerInterface
{
    public function __construct(private VerifierInterface $verifier)
    {
    }

    public function scan(string $path): array
    {
        $this->verifier->verify($path);
        return scandir($path);
    }
}
