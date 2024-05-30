<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SaleController extends Controller
{
    public function upload()
    {
        $dateFrom = "2020-01-01";
        $dateTo = date("Y-m-d");

        $page = 1;
        $r = true;

        while($r) {
            $response = Http::get("http://89.108.115.241:6969/api/sales", [
                "dateFrom" => $dateFrom,
                "dateTo" => $dateTo,
                "page" => $page,
                "limit" => 100,
                "key" => "E6kUTYrYwZq2tN4QEtyzsbEBk3ie"
            ]);

            $responseBody = $response->body();
            $responseArr = json_decode($responseBody, true);
            $responseData = $responseArr["data"];

            if(count($responseData)) {
                ProcessSales::dispatch($responseData);
                $page++;
            } else {
                $r = false;
            }
        }
    }
}
