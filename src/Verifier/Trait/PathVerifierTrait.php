<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Verifier\Trait;

use KirillGubenko\DirectoryReader\Verifier\Exception\PathNotFoundException;

trait PathVerifierTrait
{
    /**
     * @throws PathNotFoundException
     */
    private function verifyPath(string $path): void
    {
        if (!file_exists($path)) {
            throw new PathNotFoundException($path);
        }
    }
}
