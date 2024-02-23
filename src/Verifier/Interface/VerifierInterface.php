<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Verifier\Interface;

interface VerifierInterface
{
    public function verify(string $path): void;
}
