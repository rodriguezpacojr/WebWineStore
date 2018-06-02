<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class DeliverieController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'order/listordersd/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();

        if ($data != null) {
            $orders = json_decode($data, true);
            return view('deliveries.index', compact('orders'));
        }
        else
            return view('logout');
    }

    public function show($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'orderdetail/orderdetail/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $detail = json_decode($data, true);

        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'orderdetail/gettotal/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $total = json_decode($data);
        return view('deliveries.edit')
            -> with('detail',$detail)
            -> with('total',$total);
    }

    public function edit($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'orderdetail/orderdetail/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $detail = json_decode($data, true);

        $client1 = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $url1 = Config::get('auth._HOST')."IosAnd/api/product/updatestock/".$_SESSION['token'];

        foreach ($detail['orderdetail'] as $od) {

            $myBody1 = [
                'keyProduct' => $od['keyProduct'],
                'stock' => $od['quantity']
            ];

            $response = $client1->put($url1,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody1)]);
            $response->getBody()->getContents();
        }

        //Actualizar la orden
        $client2 = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);
        $url2 = Config::get('auth._HOST')."IosAnd/api/order/updatestatus/".$_SESSION['token'];

        $orderjson= [
            'keyOrder' => $id
        ];

        $response = $client2->put($url2,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($orderjson)]);
        $response->getBody()->getContents();

        flash('Delivered Successful')->important();
        return redirect()->route('deliveries.index');
    }
}