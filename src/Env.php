<?php

namespace App;

use Dotenv\Dotenv;
use Exception;

/**
 * Class Env
 * @package App
 */
class Env
{
    /**
     * Env constructor.
     * @param string $root
     */
    public function __construct(string $root)
    {
        Dotenv::createImmutable($root)->load();
    }

    /**
     * @return string
     * @throws Exception
     */
    public function getEnvironment(): string
    {
        return getenv('SYMFONY_ENVIRONMENT') ?: 'dev';
    }

    /**
     * @return bool
     */
    public function isDebug(): bool
    {
        $result = getenv('SYMFONY_DEBUG');

        return empty($result) || $result === 'true';
    }
}
