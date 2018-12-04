<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeviceId extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deviceId:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return mixed
     */
    public function handle()
    {
        $path = base_path('.env');

        if (file_exists($path)) {
            $device_id = 'webcli-'.str_random(57);
            file_put_contents($path, str_replace(
                'DEVICE_ID='.env('DEVICE_ID'), 'DEVICE_ID='.$device_id, file_get_contents($path)
            ));
        }
    }
}
