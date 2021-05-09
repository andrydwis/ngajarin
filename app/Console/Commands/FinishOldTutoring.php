<?php

namespace App\Console\Commands;

use App\Models\Tutoring;
use Carbon\Carbon;
use Illuminate\Console\Command;

class FinishOldTutoring extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tutoring:finisholdtutoring';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Finish Old Tutoring';

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
        $tutorings = Tutoring::where('status', 'diterima')->get();
        foreach($tutorings as $tutoring){
            if(Carbon::parse($tutoring->date.' '.$tutoring->hour_end)->isPast()){
                $tutoring->status = 'selesai';
                $tutoring->save();
            }
        }
        return 0;
    }
}
