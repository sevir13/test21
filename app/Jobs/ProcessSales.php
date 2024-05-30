<?php

namespace App\Jobs;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSales implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sales;

    /**
     * Create a new job instance.
     */
    public function __construct(array $sales)
    {
        $this->sales = $sales;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $sales = $this->sales;

        foreach ($sales as $sale) {
            Sale::create($sale);
        }
    }
}
