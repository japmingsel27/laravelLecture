<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessCustomer implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function handle()
    {
        echo "Customer arrived at: " . now() . "\n";
        sleep(rand(1, 5)); // Simulate service time
        echo "Customer left at: " . now() . "\n";
    }
}
// The ProcessCustomer job is a simple job that simulates a customer arriving at a service location and then leaving after a random amount of time. The job is queued and will be processed by a worker. The handle method is where the job logic is defined. In this case, the method simply outputs a message when the customer arrives and when they leave, with a random delay in between to simulate service time.