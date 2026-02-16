<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class BindServiceProvider extends ServiceProvider
{
    /**
     * The model observers.
     */
    protected array $modelObservers = [];

    /**
     * Register services.
     */
    public function register(): void
    {
        $repositoryPath = app_path('Repositories/Contracts');
        $implementationPath = app_path('Repositories/Eloquent');

        foreach (glob("{$repositoryPath}/*.php") as $interfaceFile) {
            $interfaceName = pathinfo($interfaceFile, PATHINFO_FILENAME);
            $implementationFile = "{$implementationPath}/".str_replace('I', '', $interfaceName).'.php';

            if (file_exists($implementationFile)) {
                $interfaceClass = "App\Repositories\Contracts\\{$interfaceName}";
                $implementationClass = "App\Repositories\Eloquent\\".str_replace('I', '', $interfaceName);

                $this->app->bind($interfaceClass, $implementationClass);
            }
        }
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        if (app()->runningInConsole() || ! empty($this->modelObservers)) {
            return;
        }

        $modelsPath = app_path('Models');
        $observersPath = app_path('Observers');

        if (! is_dir($observersPath)) {
            return;
        }

        foreach (glob("{$modelsPath}/*.php") as $modelFile) {
            $modelName = pathinfo($modelFile, PATHINFO_FILENAME);
            $observerFile = "{$observersPath}/{$modelName}Observer.php";

            if (! file_exists($observerFile)) {
                continue;
            }

            $modelClass = "App\Models\\{$modelName}";
            $observerClass = "App\Observers\\{$modelName}Observer";

            $this->modelObservers[$modelClass] = $observerClass;
        }

        foreach ($this->modelObservers as $model => $observer) {
            if (class_exists($model) && class_exists($observer)) {
                $model::observe($observer);
            }
        }
    }
}
