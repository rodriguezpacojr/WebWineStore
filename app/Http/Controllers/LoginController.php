<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Config;

class LoginController extends Controller
{
    public function __construct () {
        session_start();
    }

    public function index() {
        $_SESSION['token'] = null;
        return view('auth.login');
    }

    public function store(Request $request) {
        $username = $request->username;
        $password = md5($request->password);

        $client = new Client(['base_uri' => Config::get('auth._HOST').'IosAnd/api/']);
        $response = $client->request('GET', 'user/validate/'.$username.'/'.$password, ['auth' => ['root', 'root']]);
        $user = json_decode((string) $response->getBody());

        $token = $user->token;
        $_SESSION['token'] = $token;
        $_SESSION['username'] = $username;

        if ($token == "Access Denied") {
            flash('Access Denied, Try again')->error();
            return view('auth.login');
        }
        else {
            $role = $user->role;
            $_SESSION['role'] = $role;
            return view('welcome');
        }
    }
}