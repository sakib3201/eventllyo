<?php
require_once '../vendor/autoload.php';

use Utility\AllMigrations;

$migrations = new AllMigrations();
$migrations->downMigrations();

echo "Database setup completed!";
