<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
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
        $data["dates"] = $labels;
        $data["prices"] = $prices;
        $data["numberOfResults"] = $numberOfResults;
        $data["title"] = 'Bitcoin Prices';
        return view('bitcoin.index')->with("data", $data);
    }
}
