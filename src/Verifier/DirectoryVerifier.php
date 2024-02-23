<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Verifier;

use KirillGubenko\DirectoryReader\Verifier\Trait\PathVerifierTrait;
use KirillGubenko\DirectoryReader\Verifier\Interface\VerifierInterface;
use KirillGubenko\DirectoryReader\Verifier\Exception\PathNotFoundException;
use KirillGubenko\DirectoryReader\Verifier\Exception\NotADirectoryException;

class DirectoryVerifier implements VerifierInterface
{
    use PathVerifierTrait;

    /**
     * @throws PathNotFoundException
     * @throws NotADirectoryException
     */
    public function verify(string $path): void
    {
        $this->verifyDirectory($path);
        $this->verifyPath($path);
    }

    /**
     * @throws NotADirectoryException
     */
    private function verifyDirectory(string $path): void
    {
        if (!is_dir($path)) {
            throw new NotADirectoryException($path);
        }
    }
}
