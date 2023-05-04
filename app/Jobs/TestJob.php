<?php

namespace App\Jobs;

use Exception;
use App\Models\Post;
use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Events\NotificationEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class TestJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $name;
    public $userId;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $userId)
    {
        $this->name = $name;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $counter = 5000;

            while ($counter > 0) {
                $new_data = $this->name . '_' . $counter;
                Post::create(['name' => $new_data, 'created_at' => now(), 'updated_at' => now()]);
                $counter--;
            }

            //Calling Event After Sucessfully Completing the Job
            event(new \App\Events\NotificationEvent("Data Processing has completed.", $this->userId));
        } catch (Exception $ex) {

            //Calling Event If any error occured during the Job
            event(new \App\Events\NotificationEvent($ex, $this->userId));
        }
    }
}
