<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class ProductController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'product/listproducts/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        if ($data != null) {
            $products = json_decode($data, true);
            return view('products.index', compact('products'));
        }
        else
            return view('logout');
    }

    public function create() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'typeproduct/listtypeproducts/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        $categoria = json_decode($data, true);
        return view(('products.create'))
            ->with('categorias',$categoria);
    }

    public function store(Request $request) {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/product/insertproduct/".$_SESSION['token'];

        $myBody= [
            'name' => $request->name,
            'ml' =>  $request->ml,
            'color' => $request->color,
            'taste' => $request->taste,
            'stock' => $request->stock,
            'salesPrice' => $request->salesPrice,
            'keyTypeProduct' => $request->keytypeproduct,
            'availables' => $request->availables
        ];

        $request = $client->post($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response = $request;
        $response->getBody()->getContents();
        flash('Product created succesful')->success();
        return redirect()->route('products.index');
    }

    public function edit($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'product/getproduct/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        $product = json_decode($data);

        $response2 = $client->request('GET', 'typeproduct/listtypeproducts/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data2 = (string) $response2->getBody();
        $categoria = json_decode($data2, true);

        return view('products.edit')
            ->with('product',$product)
            ->with('categorias',$categoria);
    }

    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/product/updateproduct/".$_SESSION['token'];

        $myBody= [
            'keyProduct' => $id,
            'name' => $request->name,
            'ml' =>  $request->ml,
            'color' => $request->color,
            'taste' => $request->taste,
            'stock' => $request->stock,
            'salesPrice' => $request->salesPrice,
            'keyTypeProduct' => $request->keytypeproduct,
            'availables' => $request->availables
        ];

        $response = $client->put($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response->getBody()->getContents();

        flash('Product updated succesful')->important();
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $client->request('DELETE', 'product/deleteproduct/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        flash('Product deleted succesful')->error();
        return redirect()->route('products.index');
    }
}