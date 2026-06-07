<?php

namespace App\Jobs;

use App\Models\Song;
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
     * @param array $data ['type' => 'event.name', 'payload' => [...]]
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
             
            default:
                Log::warning("Unknown event type: {$type}");
                break;
        }
    }

    protected function handleSongCreated(array $payload)
    { 
        Song::create([
            'song_id' => $payload['id'],
            'title' => $payload['title'] ?? 'song'
        ]);
    }
}
