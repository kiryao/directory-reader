<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Factory;

use KirillGubenko\DirectoryReader\Verifier\FileVerifier;
use KirillGubenko\DirectoryReader\Verifier\DirectoryVerifier;
use KirillGubenko\DirectoryReader\Reader\FileInfoProvider;
use KirillGubenko\DirectoryReader\Reader\DirectoryScanner;
use KirillGubenko\DirectoryReader\DirectoryReader;

class DirectoryReaderFactory
{
    public static function create(): DirectoryReader
    {
        $directoryVerifier = new DirectoryVerifier();
        $directoryScanner = new DirectoryScanner($directoryVerifier);

        $fileVerifier = new FileVerifier();
        $fileInfoProvider = new FileInfoProvider($fileVerifier);

        return new DirectoryReader($directoryScanner, $fileInfoProvider);
    }
}
