<?php

$files = array_values(array_filter(scandir(__DIR__ . '/logs'), function ($filename) {
    return !in_array($filename, [
        '.',
        '..',
        '.gitignore',
    ]);
}));

var_dump($files);

// file_put_contents(__DIR__ . '/logs/test', "Test\n", FILE_APPEND | LOCK_EX);
