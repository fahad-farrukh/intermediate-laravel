<?php

namespace App\Jobs;

use App\Jobs\Job;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\DispatchesJobs;// For Dispatching another job from this job

class CompileReports extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels, DispatchesJobs;

    protected $reportId;
    protected $type;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($reportId, $type)
    {
        $this->reportId = $reportId;
        $this->type = $type;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //var_dump('Compiling the ' . $this->type . ' report with the id ' . $this->reportId . ' within the Job Class.');
        var_dump(sprintf('Compiling the %s report with the id %s within the Job Class.', $this->type, $this->reportId));
        
        if(TRUE){ // Dispatching another job from this job
            $this->dispatch(new DoSomethingElse);
        }
    }
}
