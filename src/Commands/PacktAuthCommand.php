<?php

namespace Packt\PacktAuth\Commands;

use Illuminate\Console\Command;

class PacktAuthCommand extends Command
{
    public $signature = 'packt-auth';

    public $description = 'My command';

    public function handle()
    {
        $this->comment('All done');
    }
}
