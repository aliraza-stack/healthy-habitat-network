<?php

class Config {
    // Debugging settings
    private const DEBUG_MODE = true; // Enable/disable debugging
    private const SHOW_LOGS = true;  // Show/hide logs in output

    // Application settings
    private const APP_NAME = 'Healthy Habitat Network';
    private const BASE_URL = 'http://localhost:8000'; // Base URL for the project
    private const TIMEZONE = 'UTC';                   // Default timezone

    // Session settings
    private const SESSION_NAME = 'healthy_habitat_session';
    private const SESSION_LIFETIME = 3600; // Session lifetime in seconds (1 hour)

    // Log file settings
    private const LOG_FILE = __DIR__ . '/../logs/app.log'; // Path to log file

    public static function getConfig() {
        return [
            'debug_mode' => self::DEBUG_MODE,
            'show_logs' => self::SHOW_LOGS,
            'app_name' => self::APP_NAME,
            'base_url' => self::BASE_URL,
            'timezone' => self::TIMEZONE,
            'session' => [
                'name' => self::SESSION_NAME,
                'lifetime' => self::SESSION_LIFETIME
            ],
            'log_file' => self::LOG_FILE
        ];
    }

    // Utility method to log messages
    public static function log($message) {
        if (self::SHOW_LOGS && self::DEBUG_MODE) {
            $timestamp = date('Y-m-d H:i:s');
            $logMessage = "[$timestamp] $message\n";
            file_put_contents(self::LOG_FILE, $logMessage, FILE_APPEND);
            if (self::SHOW_LOGS) {
                echo "<pre>$logMessage</pre>";
            }
        }
    }
}