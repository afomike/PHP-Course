<?php

declare(strict_types=1);

date_default_timezone_set('Africa/Lagos');

define('APP_PATH', __DIR__ . DIRECTORY_SEPARATOR);
define('PUBLIC_PATH', APP_PATH . 'public' . DIRECTORY_SEPARATOR);
define('STORAGE_PATH', APP_PATH . 'storage' . DIRECTORY_SEPARATOR);
define('EXPENSES_FILE', STORAGE_PATH . 'expenses.json');
define('EXPENSES_LOCK_FILE', STORAGE_PATH . 'expenses.lock');

if (!is_dir(STORAGE_PATH) && !mkdir(STORAGE_PATH, 0775, true) && !is_dir(STORAGE_PATH)) {
    throw new RuntimeException('Unable to create the expense storage directory.');
}

if (!file_exists(EXPENSES_FILE)) {
    $initialFile = fopen(EXPENSES_FILE, 'x');

    if ($initialFile === false) {
        if (!file_exists(EXPENSES_FILE)) {
            throw new RuntimeException('Unable to initialize the expense storage file.');
        }
    } elseif (fwrite($initialFile, "[]\n") === false) {
        fclose($initialFile);
        throw new RuntimeException('Unable to initialize the expense storage file.');
    } else {
        fclose($initialFile);
    }
}

require_once APP_PATH . 'utilities' . DIRECTORY_SEPARATOR . 'expenses.php';
require_once APP_PATH . 'utilities' . DIRECTORY_SEPARATOR . 'formatting.php';
