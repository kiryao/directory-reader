<?php

declare(strict_types=1);

namespace KirillGubenko\DirectoryReader\Verifier\Exception;

class NotADirectoryException extends \Exception
{
    public function __construct(string $path, int $code = 0, \Throwable $previous = null)
    {
        $message = 'Not a directory in ' . $path;
        parent::__construct($message, $code, $previous);
    }
}
