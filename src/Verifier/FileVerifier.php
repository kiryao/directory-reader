<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Verifier;

use KirillGubenko\DirectoryReader\Verifier\Trait\PathVerifierTrait;
use KirillGubenko\DirectoryReader\Verifier\Interface\VerifierInterface;
use KirillGubenko\DirectoryReader\Verifier\Exception\PathNotFoundException;
use KirillGubenko\DirectoryReader\Verifier\Exception\NotAFileException;

class FileVerifier implements VerifierInterface
{
    use PathVerifierTrait;

    /**
     * @throws PathNotFoundException
     * @throws NotAFileException
     */
    public function verify(string $path): void
    {
        $this->verifyPath($path);
        $this->verifyFile($path);
    }

    /**
     * @throws NotAFileException
     */
    private function verifyFile(string $path): void
    {
        if (!is_file($path)) {
            throw new NotAFileException($path);
        }
    }
}
