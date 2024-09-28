<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class SettingsProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $localSetting = json_decode(get_settings('local_setting'));
        $config = [];
        if ($localSetting) {
            $config['timezone'] = isset($localSetting->timezone) ? $localSetting->timezone : 'UTC';
            config(['app.timezone' => $config['timezone']]);
            date_default_timezone_set($config['timezone']);
        }
    }
}
