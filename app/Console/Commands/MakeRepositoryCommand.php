<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;

class MakeRepositoryCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:repository {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new repository class with interface';

    /**
     * The namespace of the contracts.
     *
     * @var string
     */
    protected $namespace = 'App\Repositories';

    /**
     * The path for the interface and repository.
     *
     * @var array<string, string>
     */
    protected $path = [
        'interface' => 'Contracts',
        'repository' => 'Eloquent',
    ];

    /**
     * The filesystem instance.
     */
    protected Filesystem $files;

    /**
     * Create a new command instance.
     */
    public function __construct(Filesystem $files)
    {
        parent::__construct();
        $this->files = $files;
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = trim($this->argument('name'));

        $interfaceName = "I{$name}Repository";
        $repositoryName = "{$name}Repository";

        $interfaceNamespace = "{$this->namespace}\\{$this->path['interface']}";
        $repositoryNamespace = "{$this->namespace}\\{$this->path['repository']}";

        $this->processFile(
            type: 'interface',
            className: $interfaceName,
            namespace: $interfaceNamespace,
            replacements: [
                '{{ namespace }}' => $interfaceNamespace,
                '{{ class }}' => $interfaceName,
            ]
        );

        $this->processFile(
            type: 'repository',
            className: $repositoryName,
            namespace: $repositoryNamespace,
            replacements: [
                '{{ namespace }}' => $repositoryNamespace,
                '{{ class }}' => $repositoryName,
                '{{ interfaceNamespace }}' => $interfaceNamespace.'\\'.$interfaceName,
                '{{ interface }}' => $interfaceName,
            ]
        );

        return Command::SUCCESS;
    }

    /**
     * Orchestrate the file creation process.
     */
    protected function processFile(string $type, string $className, string $namespace, array $replacements): void
    {
        $path = $this->getPath($namespace, $className);
        $stubPath = base_path("stubs/{$type}.stub");

        if ($this->files->exists($path)) {
            $this->components->error("{$type} already exists: {$className}");

            return;
        }

        if (! $this->files->exists($stubPath)) {
            $this->components->error("Stub not found: {$stubPath}");

            return;
        }

        $this->makeDirectory($path);

        $content = $this->buildContent($stubPath, $replacements);

        $this->files->put($path, $content);

        $this->components->info("{$type} created successfully: {$className}");
    }

    /**
     * Get the destination file path.
     */
    protected function getPath(string $namespace, string $className): string
    {
        $name = Str::replaceFirst($this->laravel->getNamespace(), '', $namespace);

        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'/'.$className.'.php';
    }

    /**
     * Create the directory if it doesn't exist.
     */
    protected function makeDirectory(string $path): void
    {
        if (! $this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0755, true);
        }
    }

    /**
     * Get stub content and replace placeholders.
     */
    protected function buildContent(string $stubPath, array $replacements): string
    {
        $stub = $this->files->get($stubPath);

        return str_replace(
            array_keys($replacements),
            array_values($replacements),
            $stub
        );
    }
}
