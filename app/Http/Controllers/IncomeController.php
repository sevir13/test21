<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessSales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IncomeController extends Controller
{
    public function upload()
    {
        $requestUrl = "http://89.108.115.241:6969/api/incomes";
        $perPage = 500;
        $dateFrom = "2020-01-01";
        $dateTo = date("Y-m-d");

        $response = Http::get($requestUrl, [
            "dateFrom" => $dateFrom,
            "dateTo" => $dateTo,
            "page" => 1,
            "limit" => $perPage,
            "key" => "E6kUTYrYwZq2tN4QEtyzsbEBk3ie"
        ])->body();

        $responseArr = json_decode($response, true);

        if(isset($responseArr["meta"]["total"])) {
            $pageTotal = ceil($responseArr["meta"]["total"] / $perPage);
            $pageFrom = 1;

            while($pageFrom <= $pageTotal) {
                ProcessSales::dispatch("incomes", $requestUrl, $pageFrom, $pageFrom + 5, $perPage, $dateFrom, $dateTo);
                $pageFrom += 5;
            }
        }
    }
}
