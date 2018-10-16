<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class MakeServices extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new Service class';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = trim($this->argument('name'));

        if (! $name or is_null($name) or empty($name)) {
            $this->error('Not enough arguments (missing: "name").');
            return false;
        }

        $this->createService($name);
    }

    private function createService($name) {
        $name = $this->checkServiceName($name);

        $file = $name . '.php';

        if ($this->files->exists(app_path('Http/Services/' . $file))) {
            $this->error('Service already exists!');
            return false;
        }

        $original = $this->files->get(app_path('Http/Services/Service.php'));

        $original = str_replace('ServiceName', ucfirst($name), $original);
        $this->files->put(app_path('Http/Services/' . $name . '.php'), $original);

        $this->info('Service created successfully.');
        return true;
    }

    private function checkServiceName($name) {
        if (strpos($name, 'Service'))
            return ucfirst($name);
        else if (strpos($name, 'service')) 
            return ucfirst(str_replace('service', 'Service', $name));
        else 
            return ucfirst($name) . 'Service';
    }
}
