<?php
require_once __DIR__ . '/../includes/Env.php';
Env::load();

// Echo script path and arguments for debugging
fwrite(STDOUT, "[rollback.php] Path: " . __FILE__ . "\n");
fwrite(STDOUT, "[rollback.php] Args: " . json_encode($argv) . "\n");

// Accept optional table name for targeted drop
$table = isset($argv[2]) ? $argv[2] : null;

// Only pass table name if it is not 'rollback' (protect against wrong arg)
$migrationScript = __DIR__ . '/../db/migrations/20250409_create_tables.php';
if ($table) {
    $cmd = "php $migrationScript down " . escapeshellarg($table);
} else {
    $cmd = "php $migrationScript down";
}

fwrite(STDOUT, "[rollback.php] Running: $cmd\n");
passthru($cmd);
