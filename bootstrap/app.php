<?php

use Illuminate\Foundation\Application;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Contracts\Console\Kernel as ConsoleKernel;
use Illuminate\Contracts\Debug\ExceptionHandler as ExceptionHandler;

/**
 * Initialize the Laravel Application
 *
 * @return Application
 */
function initializeApplication(): Application
{
    return new Application($_ENV['APP_BASE_PATH'] ?? dirname(__DIR__));
}

/**
 * Bind core interfaces to the application
 *
 * @param Application $app
 * @return void
 */
function bindCoreInterfaces(Application $app): void
{
    $app->singleton(HttpKernel::class, App\Http\Kernel::class);
    $app->singleton(ConsoleKernel::class, App\Console\Kernel::class);
    $app->singleton(ExceptionHandler::class, App\Exceptions\Handler::class);
}

// Create and configure the application
$app = initializeApplication();
bindCoreInterfaces($app);

// Return the application instance
return $app;
