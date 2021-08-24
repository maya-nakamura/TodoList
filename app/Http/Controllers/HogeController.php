<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HogeController extends Controller
{
    public function basic_request() {
        $base_url = 'http://example.com';
        $client = new \GuzzleHttp\Client( [
        'base_uri' => $base_url,
        ] );
        
        $path = '/index.html';
        $response = $client->request('PUT', '/put', ['json' => ['foo' => 'bar']]);
        $response_body = (string) $response->getBody();
        echo $response_body;
        }
    
    public function get_http_status_code() {
        $base_url = 'http://example.com';
        $client = new \GuzzleHttp\Client( [
            'base_uri' => $base_url,
        ] );

        $path = '/index.html';
        $response = $client->request('PUT', '/put', ['json' => ['foo' => 'bar']]);
        $response_body = (string) $response->getStatusCode();
        echo $response_body;
    }
}
