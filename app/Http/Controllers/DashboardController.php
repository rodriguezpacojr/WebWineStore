<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class DashboardController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);

        $response = $client->request('GET', 'user/count/customer/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $customers = json_decode((string) $response->getBody());

        $response = $client->request('GET', 'user/count/employee/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $employees = json_decode((string) $response->getBody());

        $response = $client->request('GET', 'user/count/product/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $products = json_decode((string) $response->getBody());

        $response = $client->request('GET', 'user/count/route/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $routes = json_decode((string) $response->getBody());

        return view('dashboards.index')
            ->with('customers', $customers)
            ->with('employees', $employees)
            ->with('products', $products)
            ->with('routes', $routes);
    }
}
