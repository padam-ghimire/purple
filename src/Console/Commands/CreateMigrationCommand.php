<?php
namespace App\Console\Commands;


// Command to create migration
class CreateMigrationCommand
{
    public function run()
    {
        // Ask user for table name
        $tableName = $this->askForTableName();

        // Generate timestamp
        $timestamp = date('YmdHis');


        $className = ucfirst($tableName);
        $stub = file_get_contents(__DIR__ . '/../../Stubs/migration.stub');
        $stub = str_replace('%ClassName%', $className, $stub);

        $stub = str_replace('{{ table }}', $tableName, $stub);


        $timestamp = date('YmdHis');
        $filename = __DIR__ . '/../../../database/migrations/' . $timestamp . '_create_' . $tableName . '_table.php';
        file_put_contents($filename, $stub);
        echo "Migration created: $filename\n";
    }

    protected function askForTableName()
    {
        echo "Enter table name: ";
        return trim(fgets(STDIN));
    }
}