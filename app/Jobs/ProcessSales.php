<?php

namespace App\Jobs;

use App\Models\Sale;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class ProcessSales implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $tableName;
    protected $requestUrl;
    protected $pageFrom;
    protected $pageTo;
    protected $perPage;
    protected $dateFrom;
    protected $dateTo;

    /**
     * Create a new job instance.
     */
    public function __construct(string $tableName, string $requestUrl, int $pageFrom, int $pageTo, int $perPage, string $dateFrom, string $dateTo = null)
    {
        $this->tableName = $tableName;
        $this->requestUrl = $requestUrl;
        $this->pageFrom = $pageFrom;
        $this->pageTo = $pageTo;
        $this->perPage = $perPage;
        $this->dateFrom = $dateFrom;
        $this->dateTo = $dateTo;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        for($i = $this->pageFrom; $i < $this->pageTo; $i++) {
            $requestParams = [
                "dateFrom" => $this->dateFrom,
                "page" => $i,
                "limit" => $this->perPage,
                "key" => "E6kUTYrYwZq2tN4QEtyzsbEBk3ie"
            ];

            if(!is_null($this->dateTo)) {
                $requestParams["dateTo"] = $this->dateTo;
            }

            $response = Http::get($this->requestUrl, $requestParams);

            $responseBody = $response->body();
            $responseArr = json_decode($responseBody, true);

            if(isset($responseArr["data"])) {
                DB::table($this->tableName)->insert($responseArr["data"]);
            }
        }
    }
}
