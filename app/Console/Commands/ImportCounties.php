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
        $filename = $this->argument('filename');
        $databaseName = $this->option('database') ?? config('database.default');

        if (!Schema::connection($databaseName)->hasTable('counties')) {
            $this->error("A 'counties' tábla nem létezik az adatbázisodban.");
            return;
        }

        $csvData = array_map('str_getcsv', file($filename));

        array_shift($csvData);

        foreach ($csvData as $row) {
            DB::connection($databaseName)->table('counties')->insert([
                'name' => $row[0],
            ]);
        }

        $this->info('Vármegyék beimportálva.');
    }
}