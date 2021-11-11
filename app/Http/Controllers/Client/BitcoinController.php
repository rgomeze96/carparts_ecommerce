<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Charts\BitcoinChart;
use Illuminate\Support\Facades\Http;


class BitcoinController extends Controller
{
    public function index()
    {
        $bitcoinData = Http::get('https://financialmodelingprep.com/api/v3/historical-chart/5min/BTCUSD?apikey=867ebac06dcfa0ae206d7eaf200af4c2');
        $reponseBody = $bitcoinData->getBody()->getContents();
        $decodedData = json_decode($reponseBody, true);
        $numberOfResults = sizeof($decodedData);
        $labels = [];
        $prices = [];
        for ($i = 0; $i < $numberOfResults; $i ++) {
            $labels[$i] = $decodedData[$i]["date"];
            $prices[$i] = $decodedData[$i]["close"];
        }
        $chart = new BitcoinChart;
        $chart->labels($labels);
        $chart->dataset('Closing Price of Bitcoin in USD', 'line', $prices)->options([
            'fill' => 'true',
            'borderColor' => 'darkred',
            'scales' => [
                'min' => '50000'
            ]
            
        ]);
        return view('bitcoin.index')->with([
            'bitcoinChart' => $chart
        ]);
    }
}
