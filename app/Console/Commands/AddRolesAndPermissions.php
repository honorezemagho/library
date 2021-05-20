<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use phpDocumentor\Reflection\Types\This;

class AddRolesAndPermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:rolesAndPermissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command permit to add some basics roles and permissions';

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
     * @return int
     */
    public function handle()
    {

      $this->info("The Command was executed successfully !");
      $this->error("Error");
    }
}
