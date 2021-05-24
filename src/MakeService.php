<?php

namespace Getsolaris\LaravelMakeService;

use Illuminate\Console\GeneratorCommand;

/**
 * Class MakeService
 * @package Getsolaris\LaravelMakeService
 * @author  getsolaris (https://github.com/getsolaris)
 */
class MakeService extends GeneratorCommand
{
    /**
     * STUB_PATH
     */
    const STUB_PATH = __DIR__ . ' /Stubs/';

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name : Create a service class} {--c : Create a service contract}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class and contract';

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    protected function getStub() { }

    /**
     * @param bool $isContract
     * @return string
     */
    protected function getServiceStub(bool $isContract): string
    {
        return self::STUB_PATH .
            $isContract ? 'service.origin.stub' : 'service.stub';
    }

    /**
     * @return string
     */
    protected function getServiceContractStub(): string
    {
        return self::STUB_PATH . 'service.contract.stub';
    }

    /**
     * Execute the console command.
     *
     * @return bool|null
     *
     * @see \Illuminate\Console\GeneratorCommand
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function handle()
    {
        if ($this->isReservedName($this->getNameInput())) {
            $this->error('The name "'.$this->getNameInput().'" is reserved by PHP.');

            return false;
        }

        $name = $this->qualifyClass($this->getNameInput());

        $path = $this->getPath($name);

        if ((! $this->hasOption('force') ||
                ! $this->option('force')) &&
            $this->alreadyExists($this->getNameInput())) {
            $this->error($this->type.' already exists!');

            return false;
        }

        $this->makeDirectory($path);
        $isContract = $this->option('c');

        $this->files->put($path, $this->sortImports(
            $this->buildServiceClass($name, $isContract)
        ));
        $message = $this->type;

        // Whether to create contract
        if ($isContract) {
            $contractName = $this->getNameInput() . 'Contract.php';
            $contractPath = str_replace($this->getNameInput() . '.php', 'Contracts/', $path);

            $this->makeDirectory($contractPath . $contractName);

            $this->files->put($contractPath . $contractName,
                $this->sortImports(
                    $this->buildServiceContractInterface($this->getNameInput())
                )
            );

            $message .= ' and Contract';
        }

        $this->info($message . ' created successfully.');
    }

    /**
     * Build the class with the given name.
     *
     * @param string $name
     * @param $isContract
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildServiceClass($name, $isContract): string
    {
        $stub = $this->files->get($this->getServiceStub($isContract));

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * Build the class with the given name.
     *
     * @param  string  $name
     * @return string
     *
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    protected function buildServiceContractInterface($name): string
    {
        $stub = $this->files->get($this->getServiceContractStub());

        return $this->replaceNamespace($stub, $name)->replaceClass($stub, $name);
    }

    /**
     * @param $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return $rootNamespace . '\Services';
    }
}
