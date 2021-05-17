<?php

$excluded_folders = [
    'node_modules',
    'storage',
    'vendor'
];

$rules = [
        '@PSR12' => true,
        '@PHP71Migration:risky' => true,
        '@PHPUnit75Migration:risky' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['expectedDeprecation']],
];

$finder = PhpCsFixer\Finder::create()
    ->exclude($excluded_folders)
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)    
    ->in([
        __DIR__ . '/app',
        __DIR__ . '/config',
        __DIR__ . '/database',
        __DIR__ . '/resources',
        __DIR__ . '/routes',
        __DIR__ . '/tests',
    ])
;

$config = new PhpCsFixer\Config();
$config
    ->setRiskyAllowed(true)
    ->setRules($rules)
    ->setFinder($finder);

return $config;

