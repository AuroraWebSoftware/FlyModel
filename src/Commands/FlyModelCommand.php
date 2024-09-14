<?php

namespace AuroraWebSoftware\FlyModel\Commands;

use Illuminate\Console\Command;

class FlyModelCommand extends Command
{
    public $signature = 'flymodel';

    public $description = 'My command';

    public function handle(): int
    {
        $this->comment('All done');

        return self::SUCCESS;
    }
}
