<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    Cache::store('octane')->put('framework', 'Laravel11', 10);
    return view('welcome');
});

Route::get('/2', function () {

    dd(Cache::store('octane')->get('framework'));
    return view('welcome');
});


//$root = __DIR__.'/../../database/migrations';
//
//$iter = new RecursiveIteratorIterator(
//    new RecursiveDirectoryIterator($root, RecursiveDirectoryIterator::SKIP_DOTS),
//    RecursiveIteratorIterator::SELF_FIRST,
//    // при блоке прав чтения не отвалится
//    RecursiveIteratorIterator::CATCH_GET_CHILD // Ignore "Permission denied" (>>на которую у него нет прав на чтение)
//);
//
//$paths = [$root];
//foreach ($iter as $path => $dir) {
//    if ($dir->isDir()) {
//        $paths[] = $path;
//    }
//}
//
//$this->loadMigrationsFrom($paths);
