<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Laravel\Lumen\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $nginxCertificatePath = config('ssl.nginx_certificate_path');
        $nginxCertificateKeyPath = config('ssl.nginx_certificate_key_path');

        $localCertificatePath = config('ssl.local_certificate_path');
        $localCertificateKeyPath = config('ssl.local_certificate_key_path');

        $schedule
            ->exec("sudo certbot renew && cp ${nginxCertificatePath} ${localCertificatePath} && cp ${nginxCertificateKeyPath} ${localCertificateKeyPath}")
            ->after(function () {
            })
            ->quarterly();
    }
}
