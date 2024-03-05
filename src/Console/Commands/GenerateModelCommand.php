<?php

namespace App\Console\Commands;



class GenerateModelCommand
{
    public function run()
    {
        // Get model name from user input
        $modelName = $this->askForModelName();

        // Capitalize the first letter of the model name
        $modelName = ucfirst($modelName);
        // Load the model stub
        $stub = file_get_contents(__DIR__ . '/../../Stubs/model.stub');

        // Replace placeholders in the stub with actual values
        $stub = str_replace('{{ className }}', $modelName, $stub);

        // Generate the model file
        $filePath = __DIR__ . '/../../Models/' . $modelName . '.php';
      
        file_put_contents($filePath, $stub);

        // Output success message
        echo "Model generated successfully at: $filePath\n";
    }

    protected function askForModelName()
    {
        echo "Enter model name: ";
        return trim(fgets(STDIN));
    }
}