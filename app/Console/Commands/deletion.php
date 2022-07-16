<?php

namespace App\Console\Commands;
use App\Models\Frame;
use App\Http\Controllers\frameController;

use Illuminate\Console\Command;

class deletion extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'frames:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete frames older than 30 days';

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

        $frames = Frame::where('happened_at', '<',now()->subDays(30)->endOfDay())
        ->get();

        $frameController = new frameController;
        foreach ($frames as $frame) {
            $frameController->destroy($frame->id);
        }

    }
}
