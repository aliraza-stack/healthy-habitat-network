<?php
require_once __DIR__ . '/../includes/Env.php';
Env::load();
// Wrapper for migration
require __DIR__ . '/../db/migrations/20250409_create_tables.php';
