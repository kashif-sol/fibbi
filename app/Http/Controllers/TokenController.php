<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TokenController extends Controller
{
    public function index(Request $request)
    {
        $token = $request->api_token;
        $secret = $request->api_secret;
        $response = Http::withHeaders([
            "token" => $token,
            "secret" => $secret
        ])->get('https://api.fibbl.com/models/v1/1234');
        if ($response->status() == 404) {
            DB::table('users')
                ->where('id', 1)
                ->update([
                    'api_token' => $token,
                    'api_secret' => $secret,
                ]);
            return redirect('activate');
        }
        return redirect('token');
    }
    public function data()
    {
        $data = User::where('id', 1)->get();
        return view('token', compact('data'));
    }
}
