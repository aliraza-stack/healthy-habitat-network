<?php
/**
 * Env - Simple .env loader and writer (no Composer dependency)
 */
class Env {
    /**
     * Load .env file and set environment variables
     * @param string $path Path to .env file
     */
    public static function load($path = __DIR__ . '/../.env') {
        if (!file_exists($path)) return;
        $lines = file($path, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || $line[0] === '#' || strpos($line, '=') === false) continue;
            list($name, $value) = explode('=', $line, 2);
            $name = trim($name);
            $value = trim($value, " \t\n\r\0\x0B\""); // Trim spaces and quotes
            putenv("{$name}={$value}");
            $_ENV[$name] = $value;
            $_SERVER[$name] = $value;
        }
    }

    /**
     * Write or update a variable in the .env file
     * @param string $key
     * @param string $value
     * @param string $path
     */
    public static function set($key, $value, $path = __DIR__ . '/../.env') {
        $lines = file_exists($path) ? file($path, FILE_IGNORE_NEW_LINES) : [];
        $found = false;
        foreach ($lines as &$line) {
            if (strpos($line, "$key=") === 0) {
                $line = "$key=$value";
                $found = true;
                break;
            }
        }
        if (!$found) {
            $lines[] = "$key=$value";
        }
        file_put_contents($path, implode("\n", $lines) . "\n");
        // Update runtime
        putenv("{$key}={$value}");
        $_ENV[$key] = $value;
        $_SERVER[$key] = $value;
    }
}
