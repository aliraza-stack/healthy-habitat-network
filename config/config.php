<?php

// Load environment variables if not already loaded
require_once __DIR__ . '/../includes/Env.php';
Env::load();

class Config {
    // Debugging settings
    private const DEBUG_MODE = null;
    private const SHOW_LOGS = null;

    // Application settings
    private const APP_NAME = null;
    private const BASE_URL = null;
    private const TIMEZONE = null;

    // Session settings
    private const SESSION_NAME = null;
    private const SESSION_LIFETIME = null;

    // Log file settings
    private const LOG_FILE = null;

    public static function getConfig() {
        return [
            'debug_mode' => getenv('DEBUG_MODE') === 'true',
            'show_logs' => getenv('SHOW_LOGS') === 'true',
            'app_name' => getenv('APP_NAME'),
            'base_url' => getenv('BASE_URL'),
            'timezone' => getenv('TIMEZONE'),
            'session' => [
                'name' => getenv('SESSION_NAME'),
                'lifetime' => (int)getenv('SESSION_LIFETIME')
            ],
            'log_file' => getenv('LOG_FILE')
        ];
    }

    // Utility method to log messages
    public static function log($message) {
        if ((getenv('SHOW_LOGS') === 'true') && (getenv('DEBUG_MODE') === 'true')) {
            $timestamp = date('Y-m-d H:i:s');
            $logMessage = "[$timestamp] $message\n";
            file_put_contents(getenv('LOG_FILE'), $logMessage, FILE_APPEND);
            if (getenv('SHOW_LOGS') === 'true') {
                echo "<pre>$logMessage</pre>";
            }
        }
    }
}