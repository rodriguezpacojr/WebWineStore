<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class EmployeeController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);

        $response = $client->request('GET', 'employee/listemployees/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        if ($data != null) {
            $employees = json_decode($data, true);
            return view('employees.index', compact('employees'));
        }
        else
            return view('logout');
    }

    public function create() {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'user/listusers/'.$_SESSION['token'], ['auth' => ['root', 'root']]);
        $data = (string) $response->getBody();
        $users = json_decode($data, true);
        return view('employees.create')
            ->with('users',$users);
    }

    public function store(Request $request) {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/employee/insertemployee/".$_SESSION['token'];

        $myBody= [
            'name' => $request->name,
            'lastName' =>  $request->lastName,
            'bornDate' => $request->bornDate,
            'email' => $request->email,
            'phone' => $request->phone,
            'RFC' => $request->RFC,
            'photo' => "",
            'entryDate' => $request->entryDate,
            'keyUser' => $request->keyUser
        ];

        $response = $client->post($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response->getBody()->getContents();
        flash('Employee created succesful')->success();
        return redirect()->route('employees.index');
    }

    public function edit($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'employee/getemployee/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        $data = (string) $response->getBody();
        $employee = json_decode($data);

        return view('employees.edit')
            -> with('employee',$employee);
    }

    public function update(Request $request, $id)
    {
        $client = new \GuzzleHttp\Client(['headers' => [ 'Content-Type' => 'application/json' ]]);

        $url = Config::get('auth._HOST')."IosAnd/api/employee/updateemployee/".$_SESSION['token'];

        $myBody= [
            'keyEmployee' => $id,
            'name' => $request->name,
            'lastName' =>  $request->lastName,
            'bornDate' => $request->bornDate,
            'email' => $request->email,
            'phone' => $request->phone,
            'RFC' => $request->RFC,
            'photo' => "",
            'entryDate' => $request->entryDate
        ];

        $response = $client->put($url,['auth' => ['root', 'root'], 'body'=>\GuzzleHttp\json_encode($myBody)]);

        $response->getBody()->getContents();

        flash('Employee updated succesful')->important();
        return redirect()->route('employees.index');
    }

    public function destroy($id)
    {
        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $client->request('DELETE', 'employee/deleteemployee/'.$id.'/'.$_SESSION['token'], ['auth' => ['root', 'root']]);

        flash('Employee deleted succesful')->error();
        return redirect()->route('employees.index');
    }
}