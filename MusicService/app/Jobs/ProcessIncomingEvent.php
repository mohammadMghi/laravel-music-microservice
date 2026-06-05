<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessIncomingEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public array $data;

    /**
     * Create a new job instance.
     * @param array $data  
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * Execute the job.
     */
    public function handle()
    {
        $type = $this->data['type'] ?? 'unknown';
        $payload = $this->data['payload'] ?? [];

        Log::info("Processing event: {$type}");

 
        switch ($type) {
            case 'song.created':
                $this->handleSongCreated($payload);
                break;
            
            // Add other events here
            default:
                Log::warning("Unknown event type: {$type}");
                break;
        }
    }

    protected function handleSongCreated(array $payload)
    { 
        Log::info("Song created logic running for ID: " . ($payload['id'] ?? 'N/A'));
    }
}