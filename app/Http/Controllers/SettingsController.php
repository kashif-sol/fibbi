<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SettingsController extends Controller
{
    public function index(Request $req){
      $user=User::where('id',1)->first();
    //   dd($user->id);
      $product_identifier=$req->product_identifier;
      $google_id=$req->google_id;
      $btn_postition=$req->btn_postition;
      $css=$req->css;
      $user_id=$user->id;
      $newsetting = Setting::updateOrCreate([
        //Add unique field combo to match here
        //For example, perhaps you only want one entry per user:
        'user_id'   => $user_id ,
    ],[
        'product_identifier'     => $product_identifier,
        'google_id' => $google_id,
        'btn_postition'    => $btn_postition,
        'css'   => $css
      
    ]);
    $newsetting->save();
   return redirect('activate');

    }
    public function get(){
        $newsetting = Setting::where('user_id',1 )->first();
        $link=User::where('id',1)->first();
      return view('activate',compact('newsetting','link'));
    }
    public function status(Request $request){
      $user=User::where('id',1)->first();
      $status=$request->status;
      
      $user_id=$user->id;
      DB::table('settings')
                ->where('user_id', $user_id)
                ->update([
                    'status' => $status,
                   
                ]);

    return redirect('activate');
    }

    public function model_api(){
     
      $response = Http::withHeaders([
        "token" =>"token_2703122e819cf41e47aeedf04c511c980bfa504ea86fa9424d8d0bb347ff5274",
        "secret" =>"secret_33c2125207246fefce8f2c6903933b997d626968"])->get('https://api.fibbl.com/models/v1/1234');
        return response()->json(['status' => "success" , "data" => $response]);
    
    
    }
}
