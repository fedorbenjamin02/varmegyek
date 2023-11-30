<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ImportCounties extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:import-counties';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.

     */

    public function handle(){
        $fileName = $this->argument('fileName');
        $csvData = $this->getCsvData($fileName);
        var_dump($csvData);
        return 0;
    }
    public function getCsvData($fileName, $withHeader = true) 
    {
        if (!file_exists($fileName)) {
            echo "$fileName nem található";
            return false;
        }
        $csvFile = fopen($fileName, 'r');
        $header = fgetcsv($csvFile);
        if ($withHeader) {
            $lines[] = $header;
        }
        else {
            $lines = [];
        }
        while (! feof($csvFile)) {
            $line = fgetcsv($csvFile);
            $lines[] = $line;
        }
        fclose($csvFile);

        return $lines;
    }
    private function truncate($table){
        try {
            DB::statement("TRUNCATE TABLE $table;");
            $this->info("$table table has been truncated");
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
