<?php

use Sami\Sami;
use Symfony\Component\Finder\Finder;

$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('vendor')
    ->in(__DIR__ . '/../vendor/lfalmeida')
    ->in(__DIR__ . '/../app');

return new Sami($iterator, [
    'title' => 'StarterKit',
    'cache_dir' => __DIR__ . '/../storage/docs/app',
    'build_dir' => __DIR__ . '/../public/docs/app',
    'default_opened_level' => 1,
]);