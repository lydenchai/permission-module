<?php

namespace Lyden\Permission;

use Illuminate\Support\ServiceProvider;
use Lyden\Permission\Repositories\PermissionRepository;
use Lyden\Permission\Repositories\PermissionRepositoryInterface;

class PermissionServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            PermissionRepositoryInterface::class,
            PermissionRepository::class
        );
    }

    public function boot()
    {
        $this->registerPublishables();
    }

    protected function registerPublishables(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../Config/Permission_config.php' => config_path('Permission_config.php'),
            ], 'config');
        }

        if (!class_exists('CreatePermissionsTable')) {
            $this->publishes([
                __DIR__ . '/../database/migrations/create_permissions_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_permissions_table.php'),
            ], 'migrations');
        }
    }
}
