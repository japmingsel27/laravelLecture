<?php
namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class SimulationEvent implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $eventData;
    public $timestamp;

    public function __construct($eventData, $timestamp = null)
    {
        $this->eventData = $eventData;
        $this->timestamp = $timestamp ?? now();
    }

    public function handle()
    {
        Log::info("Processing event at {$this->timestamp->toDateTimeString()}: " . json_encode($this->eventData));
    
        if ($this->eventData['type'] === 'arrival') {
            SimulationEvent::dispatch([
                'type' => 'onqueue',
                'entity_id' => $this->eventData['entity_id']
            ], now()->addSeconds(rand(2, 5)))->delay(now()->addSeconds(rand(2, 10)));

        } elseif ($this->eventData['type'] === 'onqueue') {
            SimulationEvent::dispatch([
                'type' => 'service',
                'entity_id' => $this->eventData['entity_id']
            ], now()->addSeconds(rand(10, 16)))->delay(now()->addSeconds(rand(3, 4)));
        } elseif ($this->eventData['type'] === 'service') {
            SimulationEvent::dispatch([
                'type' => 'payment',
                'entity_id' => $this->eventData['entity_id']
            ], now()->addSeconds(rand(15, 20)))->delay(now()->addSeconds(rand(3, 4)));
        } elseif ($this->eventData['type'] === 'payment') {
            SimulationEvent::dispatch([
                'type' => 'departure',
                'entity_id' => $this->eventData['entity_id']
            ], now()->addSeconds(rand(25, 26)))->delay(now()->addSeconds(rand(3, 4)));
        }
        
         elseif ($this->eventData['type'] === 'departure') {
            Log::info("Entity {$this->eventData['entity_id']} has departed at {$this->timestamp->toDateTimeString()}.");
        }
        
    }
    
}
