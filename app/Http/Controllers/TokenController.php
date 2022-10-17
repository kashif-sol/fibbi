<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class TokenController extends Controller
{
    public function home()
    {
        $data = User::where('id', Auth::user()->id)->first();
        if(isset($data)){
            if(!empty($data->api_token) && !empty($data->api_secret) )
            {
                return redirect('activate');
            }
        }
        return view('index');
    }
    public function saveToken(Request $request)
    {

        $response = Http::withHeaders([
            "token" => $request->api_token,
            "secret" => $request->api_secret
        ])->get('https://api.fibbl.com/models/v1/1234');

        if ($response->status() == 404) 
        {
            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update([
                    'api_token' => $request->api_token,
                    'api_secret' => $request->api_secret
                ]);
            return redirect('activate');
        }
        else
        {
            return Redirect::tokenRedirect('addToken', ['notice' => 'Token or secret key is not correct, please try again']);
           
        }
    }
    public function tokenForm()
    {
        $data = User::where('id', Auth::user()->id)->first();
        if(isset($data)){
            if(!empty($data->api_token) && !empty($data->api_secret) )
            {
                return redirect('activate');
            }
        }
        return view('token', compact('data'));
    }
}
