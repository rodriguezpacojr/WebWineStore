<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class OrderController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'order/listordersu/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        if ($data != null) {
            $orders = json_decode($data, true);
            return view('orders.index', compact('orders'));
        }
        else
            return view('logout');
    }

    public function edit($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'orderdetail/orderdetail/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $detail = json_decode($data, true);

        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'orderdetail/gettotal/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $total = json_decode($data);
        return view('orders.edit')
            -> with('detail',$detail)
            -> with('total',$total);
    }
}