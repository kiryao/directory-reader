<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Verifier\Exception;

class PathNotFoundException extends \Exception
{
    public function __construct(string $path, int $code = 0, \Throwable $previous = null)
    {
        $message = 'Path not found ' . $path;
        parent::__construct($message, $code, $previous);
    }
}
