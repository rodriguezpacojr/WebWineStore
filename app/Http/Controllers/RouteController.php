<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class RouteController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);

        $response = $client->request('GET', 'route/listroutes/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        if ($data != null) {
            $routes = json_decode($data, true);
            return view('routes.index', compact('routes'));
        }
        else
            return view('logout');
    }

    public function create() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'employee/listemployees/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        $employees = json_decode($data, true);
        return view('routes.create')
            ->with('employee',$employees);
    }

    public function store(Request $request) {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/route/insertroute/".$_SESSION['token'];

        $myBody= [
            'destination' => $request-> name,
            'keyEmployee' => $request->keyemployee
        ];

        $request = $client->post($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response = $request;
        $response->getBody()->getContents();

        flash('Route created succesful')->success();
        return redirect()->route('routes.index');
    }

    public function edit($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'route/getroute/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $route = json_decode($data);

        return view('routes.edit')
            -> with('route',$route);
    }

    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/route/updateroute/".$_SESSION['token'];

        $myBody= [
            'keyRoute' => $id,
            'destination' => $request->name,
            'keyEmployee' => $request->keyEmployee,
        ];

        $response = $client->put($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response->getBody()->getContents();

        flash('Route updated succesful')->important();
        return redirect()->route('routes.index');
    }

    public function destroy($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $client->request('DELETE', 'route/deleteroute/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        flash('Route deleted succesful')->error();
        return redirect()->route('routes.index');
    }
}