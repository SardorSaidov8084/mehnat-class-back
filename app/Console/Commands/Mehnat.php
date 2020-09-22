<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Str;

class Mehnat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'mehnat:model {model}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'model Name';

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
        $model = ucfirst($this->argument('model'));
        $mig_name = Str::plural(Str::snake($model));
        if($this->confirm('Do you want to create a model ? (yes|no)[no]',true)) {
            Artisan::call("make:model ".$model);
        } 
        if($this->confirm('Do you want to create a migration ? (yes|no)[no]',true)) {
            Artisan::call("make:migration create_".$mig_name."_table");
        } 
        if($this->confirm('Do you want to create Controller --api ? (yes|no)[no]',true)) {
            Artisan::call("make:controller Api/" . $model . "Controller --api");
        }
        if($this->confirm('Do you want to create a Repository ? (yes|no)[no]',true)) {
            Artisan::call("make:class Domains/".$model."/Repositories/" . $model."Repository" );
        }
        if($this->confirm('Do you want to create a Service ? (yes|no)[no]',true)) {
            Artisan::call("make:class Domains/".$model."/Services/" . $model."Service" );
        }
        return 0;
    }
}
