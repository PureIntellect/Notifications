<?php
namespace PureIntellect\Notifications;

use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/../resources/views/', 'Notifications');
        $this->publishes([
            __DIR__.'/../resources/assets/js/' => base_path('resources/assets/js/components/'),
            __DIR__ . '/../resources/views/' => base_path('resources/views/vendor/PureIntellect/Notifications/'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
      require __DIR__.'/routes.php';
      $this->app->make('PureIntellect\Notifications\Controllers\NotificationController');
    }
}
