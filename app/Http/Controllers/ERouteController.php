<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class ERouteController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);

        $response = $client->request('GET', 'route/getroutes/'.$_SESSION['username'].'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        if ($data != null) {
            $routes = json_decode($data, true);
            return view('eroutes.index', compact('routes'));
        }
        else
            return view('logout');
    }
}
