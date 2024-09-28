<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use RecursiveDirectoryIterator;
use RecursiveIteratorIterator;
use SplFileInfo;
use Throwable;
use ZipArchive;

class Build extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build:app';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will refresh the database and dump';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Log::info("Building the application");
        $this->warn("Build has been started");
        return $this->build();
    }

    public function build(): int
    {
        Artisan::call('clear:all', ['--withlog' => true]);
        Artisan::call('migrate:fresh', ['--force' => true, '--seed' => true]);
        Artisan::call('translations:import');
        if($this->serverDBBackup()){
            $this->compressFullProject();
        }
        return 0;
    }

    private function serverDBBackup(): bool
    {
        try {

            $database = config('database.connections.mysql.database');
            $user = config('database.connections.mysql.username');
            $pass = config('database.connections.mysql.password');
            $host = config('database.connections.mysql.host');
            $app_name = strtolower(config('app.name'));
            $app_version = "v" . str_replace('.', '_', config('app.version'));
            $dirName = DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "Release" . DIRECTORY_SEPARATOR . $app_name . DIRECTORY_SEPARATOR . $app_version;

            if (!File::isDirectory($dirName)) {
                $this->warn("Directory not exist. Creating now..");
                File::makeDirectory($dirName, 0777, true, true);
            } else {
                if (!$this->confirm($dirName . ' already exist. Do you wish to continue?')) {
                    return false; // function will return false
                }
            }

            $dir = $dirName . DIRECTORY_SEPARATOR . $app_name . "_" . $app_version . ".sql";

            if (File::exists($dir)) {
                try {
                    $this->warn("Deleting previous file");
                    unlink($dir);
                } catch (Throwable $th) {
                    $this->error($th->getMessage());
                    return false;
                }
            }


            // echo "<h3>Backing up database to `<code>{$dir}</code>`</h3>";
            // mysqldump -u [user name] –p [password] [options] [database_name] [tablename] > [dumpfilename.sql]
            // --add-drop-database --databases
            // mysqldump --user=root --password=bismib_fashion@_mysql --host=localhost --events --routines --triggers elaravel_v2 --result-file=db_backup_new.sql 2>&1
            $string = "mysqldump  --user=$user --password=$pass --host=$host --events --routines --triggers  $database  --result-file=$dir 2>&1";
            exec($string, $output);
            if (count($output) > 0) {
                $this->info(print_r($output));
            }
            $tableViewsCounts = DB::select('SELECT count(TABLE_NAME) AS TOTALNUMBEROFTABLES FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = ?', [$database]);
            $tableViewsCounts = $tableViewsCounts[0]->TOTALNUMBEROFTABLES;

            $viewsCounts = DB::select('SELECT count(TABLE_NAME) AS TOTALNUMBEROFVIEWS FROM INFORMATION_SCHEMA.TABLES WHERE  TABLE_TYPE LIKE "VIEW" AND TABLE_SCHEMA = ?', [$database]);
            $viewsCounts = $viewsCounts[0]->TOTALNUMBEROFVIEWS;

            $tablesCount = $tableViewsCounts - $viewsCounts;


            $proceduresCounts = DB::select('SELECT count(TYPE) AS proceduresCounts FROM mysql.proc WHERE  TYPE="PROCEDURE" AND db = ?', [$database]);
            $proceduresCounts = $proceduresCounts[0]->proceduresCounts;

            $functionsCounts = DB::select('SELECT count(TYPE) AS functionsCounts FROM mysql.proc WHERE  TYPE="FUNCTION" AND db = ?', [$database]);
            $functionsCounts = $functionsCounts[0]->functionsCounts;

            $init_command = PHP_EOL . '-- ' . ' Database Backup Generated time = ' . (Carbon::now()->toDateTimeLocalString()) . PHP_EOL . PHP_EOL .
                '-- =============Objects Counting Start================= ' . PHP_EOL . PHP_EOL .
                '-- Total Tables + Views = ' . $tableViewsCounts . PHP_EOL .
                '-- Total Tables = ' . $tablesCount . PHP_EOL .
                '-- Total Views = ' . $viewsCounts . PHP_EOL . PHP_EOL .
                '-- Total Procedures = ' . $proceduresCounts . PHP_EOL .
                '-- Total Functions = ' . $functionsCounts . PHP_EOL .
                '-- =============Objects Counting End================= ' . PHP_EOL .
                PHP_EOL . PHP_EOL .
                'SET FOREIGN_KEY_CHECKS=0; ' . PHP_EOL .
                'SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";' . PHP_EOL .
                'START TRANSACTION;' . PHP_EOL;

            $data = file_get_contents($dir);

            $append_command = PHP_EOL . 'SET FOREIGN_KEY_CHECKS=1;' . PHP_EOL . 'COMMIT;' . PHP_EOL;
            // dd($data);
            file_put_contents($dir, $init_command . $data . $append_command);
            $this->info("Database Backup Completed at " . $dir);
            return true;

        } catch (Throwable $th) {
            $this->error($th->getMessage());
            return false;
        }
    }

    function strcontains($str, array $arr): bool
    {
        foreach ($arr as $a) {
            if (stripos($str, $a) !== false) return true;
        }
        return false;
    }

    private $excludeFolders = ['.git', '.idea'];
    private $excludeFiles = ['build'];

    private function compressFullProject(): void
    {
        $app_name = strtolower(config('app.name'));
        $app_version = "v" . str_replace('.', '_', config('app.version'));
        $dirName = DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR . "Release" . DIRECTORY_SEPARATOR . $app_name . DIRECTORY_SEPARATOR . $app_version;
        $fullFilePath = $dirName . DIRECTORY_SEPARATOR . 'app_' . $app_version . '.zip';
        if (File::exists($fullFilePath)) {
            if (!$this->confirm('Zip already exist. Do you wish to continue?')) {
                return;
            }
        }
        // Get real path for our folder
        $rootPath = realpath(base_path());

        $this->info("Zipping Started");

        // Initialize archive object
        $zip = new ZipArchive();
        $zip->open($fullFilePath, ZipArchive::CREATE | ZipArchive::OVERWRITE);

        // Create recursive directory iterator
        /** @var SplFileInfo[] $files */
        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($rootPath),
            RecursiveIteratorIterator::LEAVES_ONLY
        );
        $count = 0;
        foreach ($files as $ignored) {
            $count++;
        }
        $bar = $this->output->createProgressBar($count);
        $bar->start();
        foreach ($files as $file) {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);
            if(in_array($file->getFilename(), $this->excludeFiles) || $this->strcontains($file->getRealPath(), $this->excludeFolders)){
               continue;
            }
            // Skip directories (they would be added automatically)
            if (!$file->isDir()) {
                if(!in_array($file->getFilename(), $this->excludeFiles) && !$this->strcontains($file->getRealPath(), $this->excludeFolders)){
                    // Add current file to archive
                    $zip->addFile($filePath, $relativePath);
                }

            }else{
                if($relativePath !== false)
                    $zip->addEmptyDir($relativePath);
            }
            $bar->advance();
        }

        // Zip archive will be created only after closing object
        $zip->close();
        $bar->finish();
        $this->newLine();
        $this->info("Zip Completed");
    }
}
