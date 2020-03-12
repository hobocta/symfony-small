<?php

declare(strict_types=1);

use App\Env;
use Symfony\Component\HttpFoundation\Request;

$root = dirname(__DIR__);

require_once $root . '/vendor/autoload.php';

try {
    $env = new Env($root);

    $app = new AppKernel($env->getEnvironment(), $env->isDebug());

    $app->boot();

    $request = Request::createFromGlobals();

    $response = $app->handle($request);
    $response->send();

    $app->terminate($request, $response);

} catch (Exception $e) {
    fwrite(
        STDERR,
        sprintf('Exception message: %s (%s:%s)', $e->getMessage(), $e->getFile(), $e->getLine()) . PHP_EOL
    );
}
