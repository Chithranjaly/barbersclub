<?php
// Load from environment variables for security
// For local dev: set these in your .env or system environment
$host     = getenv('DB_HOST')     ?: 'localhost';
$user     = getenv('DB_USER')     ?: 'root';
$pass     = getenv('DB_PASS')     ?: '';
$database = getenv('DB_NAME')     ?: 'salon';

$con = mysqli_connect($host, $user, $pass, $database);

if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
