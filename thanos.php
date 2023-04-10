#!/usr/bin/php
<?php

use Aternos\Thanos\Helper;
use Aternos\Thanos\Thanos;
use Aternos\Thanos\World\AnvilWorld;

require_once 'vendor/autoload.php';

if (!isset($argv[1])) {
    exit("Usage: cleanup.php <world> [<output>]\n");
}

$input = $argv[1];
$output = $input;

if (!is_dir($input) || count(scandir($input)) === 2) {
    exit('World must be a directory and not empty' . PHP_EOL);
}


$startTime = microtime(true);
$world = new AnvilWorld($input, $output);
$thanos = new Thanos();
$thanos->setMinInhabitedTime(0);
$removedChunks = $thanos->snap($world);

echo sprintf('Removed %d chunks in %.2f seconds',
    $removedChunks,
    round(microtime(true) - $startTime, 2)
);
echo PHP_EOL;
