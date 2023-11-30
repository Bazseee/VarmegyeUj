<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ImportCounties extends Command
{
    protected $signature = 'app.import-counties {filename} {--database=}';


    public function handle()
    {
        $fileName = $this->argument('fileName');
        $csvData = $this->getCSVData($fileName);
        var_dump($csvData);
        return 0;
 
        $schemaName = $this->argument('name') ?: config("database.connections.mysql.database");
        $charset = config("database.connections.mysql.charset",'utf8mb4');
        $collation = config("database.connections.mysql.collation",'utf8mb4_unicode_ci');
 
        config(["database.connections.mysql.database" => null]);
 
        $query = "CREATE DATABASE IF NOT EXISTS $schemaName CHARACTER SET $charset COLLATE $collation;";
 
        try {
            DB::statement($query);
            echo "$schemaName database has been created.";
        }
        catch (Exception $e) {
            $e->getMessage();
        }
 
        config(["database.connections.mysql.database" => $schemaName]);
    }
    private function getCSVData($fileName, $withHeader = true){
        if (!file_exists($fileName)) {
            echo "$fileName nem találhetó";
            return false;
        }
        $csvFile = fopen($fileName,'r');
        $header = fgetcsv($csvFile);
        if ($withHeader){
            $lines[] = $header;
        }
        else{
            $lines[] = $header;
        }
        while (! feof($csvFile)) {
            $line = fgets($csvFile);
            $lines[] = $line;
        }
        fclose($csvFile);
 
        return $lines;
    }
 
    private function truncate($table)
    {
        try {
            DB::statement("TRUNCATE TABEL $table;");
            $this->info("$table table has been truncated.");
        }
        catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}