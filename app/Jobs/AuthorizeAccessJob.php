<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class AuthorizeAccessJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $userCollectionId, public $modelType,public $modelId)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        sleep(10);
        Log::notice("$this->userCollectionId .  $this->modelType . $this->modelId");

    }
}
