<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use Symfony\Component\Console\Input\ArgvInput;

class MigrationServiceProvider extends ServiceProvider
{
    public function register(): void
    {

    }

    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $input = new ArgvInput();
            $commandName = $input->getFirstArgument();
            if (\Str::is('migrate*', $commandName)) {
                $root = base_path('database/migrations');

                $iter = new RecursiveIteratorIterator(
                    new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
                    RecursiveIteratorIterator::SELF_FIRST,
                    // при блоке прав чтения не отвалится
                    RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied" (>>на которую у него нет прав на чтение)
                );

                $paths = [$root];
                foreach ($iter as $path => $dir) {
                    if ($dir->isDir()) {
                        $paths[] = $path;
                    }
                }

                $this->loadMigrationsFrom($paths);
            }
        }
    }
}
