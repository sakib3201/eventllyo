<?php

namespace Utility;
use Core\Database;

class AllMigrations {
    private $db;

    public function __construct() {
        $this->db = Database::connect();
    }

    public function runMigrations() {
        $files = glob('../migrations/*.php'); // Get all migration files

        foreach ($files as $file) {
            require_once $file; // Include the migration file
            $className = basename($file, '.php'); // Extract class name
            echo "$className";
            if (class_exists($className)) {
                $migration = new $className($this->db);
                $migration->up(); // Run the migration
                echo "Migrated: $className\n";
            }
        }
    }

    public function downMigrations() {
        $files = glob('../migrations/*.php'); // Get all migration files

        foreach ($files as $file) {
            require_once $file; // Include the migration file
            $className = basename($file, '.php'); // Extract class name
            echo "$className";
            if (class_exists($className)) {
                $migration = new $className($this->db);
                $migration->down(); // Revert the migration
                echo "Migration reverted: $className\n";
            }
        }
    }
}
