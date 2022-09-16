<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TokenController extends Controller
{
    public function index(Request $request){
        $token=$request->api_token;
        $secret=$request->api_secret;
        DB::table('users')
        ->where('id', 1)
        ->update(['api_token' => $token,
                    'api_secret'=>$secret,
    ]);
    return redirect('token');

    }
}
