<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;

class FlowerController extends Controller
{
    public function index()
    {
        $flowerData = Http::get('http://flowershop-tes.tk/api/flowers');
        $jsonBody = $flowerData->json();
        $validResponse = false;
        if ($jsonBody == null) {
            $data["title"] = __('flowers.title');
            $data['validResponse'] = $validResponse;
            return view('flowers.index')->with('data', $data);
        }
        $decodedData = $jsonBody['data'];
        $numberOfResults = sizeof($decodedData);
        $flowerNames = [];
        $amountsPerFlower = [];
        $prices = [];
        $links = [];

        for ($i = 0; $i < $numberOfResults; $i ++) {
            $flowerNames[$i] = $decodedData[$i]["name"];
            $amountsPerFlower[$i] = $decodedData[$i]["amount"];
            $prices[$i] = $decodedData[$i]["price"];
            $links[$i] = $decodedData[$i]["link"];
        }
        if ($numberOfResults > 0) {
            $validResponse = true;
        } else {
            $validResponse = false;
        }
        $data["flowerNames"] = $flowerNames;
        $data["amountsPerFlower"] = $amountsPerFlower;
        $data["prices"] = $prices;
        $data["links"] = $links;
        $data["numberOfResults"] = $numberOfResults;
        $data["title"] = __('flowers.title');
        $data["validResponse"] = $validResponse;
        return view('flowers.index')->with("data", $data);
    }
}
