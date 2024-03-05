<?php
namespace App\Console\Commands;

// Command to run migrations
class MigrateCommand
{
    public function run()
    {
        // Get pending migration files from directory
        $migrationFiles = glob(__DIR__ . '/../../../database/migrations/*.php');

        // Execute each migration
        foreach ($migrationFiles as $migrationFile) {
            require_once $migrationFile;
            // Extract class name from file path
            $className = $this->getClassNameFromFileName($migrationFile);
            // Instantiate migration class and run migration
            $migrationObject = new $className;
            $migrationObject->up();
            // Store migration in database
            // Update migration table
        }

        echo "Migrations completed.\n";
    }

    protected function getClassNameFromFileName($migrationFile)
    {
        // Extract class name from file path
        $fileNameWithoutExtension = basename($migrationFile, '.php');
        // Convert filename to class name (e.g., snake_case to StudlyCase)
        return studly_case($fileNameWithoutExtension);
    }
}