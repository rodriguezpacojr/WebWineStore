<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;
use Caffeinated\Flash\Facades\Flash;

class CustomerController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);

        $response = $client->request('GET', 'customer/listcustomers/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();

        if ($data != null) {
            $customers = json_decode($data, true);
            return view('customers.index', compact('customers'));
        }
        else
            return view('logout');
    }

    public function create() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'route/listroutes/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        $categoria = json_decode($data, true);
        return view(('customers.create'))
            ->with('categorias',$categoria);
    }

    public function store(Request $request) {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/customer/insertcustomer/".$_SESSION['token'];

        $myBody= [
            'name' => $request->name,
            'lastName' =>  $request->lastName,
            'bornDate' => $request->bornDate,
            'email' => $request->email,
            'phone' => $request->phone,
            'RFC' => $request->RFC,
            'entryDate' => $request->entryDate,
            'photo' => "",
            'latitude' => 0,
            'longitude' => 0,
            'keyRoute' => $request->keyRoute
        ];

        $response = $client->post($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response->getBody()->getContents();
        flash('Costomer created succesful')->success();
        return redirect()->route('customers.index');
    }

    public function edit($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'customer/getcustomer/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        $customer = json_decode($data);

        $response2 = $client->request('GET', 'route/listroutes/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data2 = (string) $response2->getBody();
        $categoria = json_decode($data2, true);

        return view('customers.edit')
            -> with('customer',$customer)
            -> with('categorias',$categoria);
    }

    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/customer/updatecustomer/".$_SESSION['token'];

        $myBody= [
            'keyCustomer' => $id,
            'name' => $request->name,
            'lastName' =>  $request->lastName,
            'bornDate' => $request->bornDate,
            'email' => $request->email,
            'phone' => $request->phone,
            'RFC' => $request->RFC,
            'entryDate' => $request->entryDate,
            'latitude' => 0,
            'longitude' => 0,
            'keyRoute' => $request->keyRoute
        ];

        $response = $client->put($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response->getBody()->getContents();

        flash('Customer updated succesful')->important();
        return redirect()->route('customers.index');
    }

    public function destroy($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $client->request('DELETE', 'customer/deletecustomer/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        flash('Customer deleted succesful')->error();
        return redirect()->route('customers.index');
    }
}
