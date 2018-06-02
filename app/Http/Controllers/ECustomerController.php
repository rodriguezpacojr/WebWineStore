<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class ECustomerController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);

        $response = $client->request('GET', 'customer/listcustomersemployee/'.$_SESSION['username'].'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();

        if ($data != null) {
            $customers = json_decode($data, true);
            return view('ecustomers.index', compact('customers'));
        }
        else
            return view('logout');

    }
}
