<?php

require_once '../vendor/autoload.php';;

use Utility\AllMigrations;

$migrations = new AllMigrations();
$migrations->runMigrations();

echo "Database setup completed!";

