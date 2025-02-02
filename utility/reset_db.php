<?php

use Utility\AllMigrations;

$migrations = new AllMigrations();
$migrations->downMigrations();

echo "Database setup completed!";
