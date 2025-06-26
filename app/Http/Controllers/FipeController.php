<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FipeController extends Controller
{
    private $baseUrl = 'https://fipe.parallelum.com.br/api/v2';

    public function getBrands($type)
    {
        $response = Http::withHeaders([
            'X-Subscription-Token' => config('services.fipe.token'),
            'Accept' => 'application/json',
        ])->get("{$this->baseUrl}/{$type}/brands");

        return $response->json();
    }

    public function getModels($type, $brandId)
    {
        $response = Http::withHeaders([
            'X-Subscription-Token' => config('services.fipe.token'),
            'Accept' => 'application/json',
        ])->get("{$this->baseUrl}/{$type}/brands/{$brandId}/models");

        return $response->json();
    }

    public function getYears($type, $brandId, $modelId)
    {
        $response = Http::withHeaders([
            'X-Subscription-Token' => config('services.fipe.token'),
            'Accept' => 'application/json',
        ])->get("{$this->baseUrl}/{$type}/brands/{$brandId}/models/{$modelId}/years");

        return $response->json();
    }

    public function getValue($type, $brandId, $modelId, $yearId)
    {
        $response = Http::withHeaders([
            'X-Subscription-Token' => config('services.fipe.token'),
            'Accept' => 'application/json',
        ])->get("{$this->baseUrl}/{$type}/brands/{$brandId}/models/{$modelId}/years/{$yearId}");

        return $response->json();
    }
}
