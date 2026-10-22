<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once 'DatabaseConnection.php';

$pdo = DatabaseConnection::getInstance()->getConnection();
echo "<pre>";
echo "Terhubung ke database: " . $pdo->query('SELECT DATABASE()')->fetchColumn() . "\n\n";
print_r($pdo->query('SELECT * FROM products')->fetchAll());