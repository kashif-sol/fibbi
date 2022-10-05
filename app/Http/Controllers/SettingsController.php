<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Redirect;

class SettingsController extends Controller
{
    public function index(Request $req)
    {
       
        $user=User::where('id',Auth::user()->id)->first();
        $product_identifier=$req->product_identifier;
        $google_id=$req->google_id;
        $btn_postition=$req->btn_postition;
        $btn_postition2=$req->btn_postition2;
        $btn_postition3=$req->btn_postition3;
        $css=$req->css;
        $user_id= Auth::user()->id;
        $newsetting = Setting::updateOrCreate([
            'user_id'   => $user_id ,
        ],[
            'product_identifier'     => $product_identifier,
            'google_id' => $google_id,
            'btn_postition'    => $btn_postition,
            'btn_postition2'    => $btn_postition2,
            'btn_postition3'    => $btn_postition3,
            'css'   => $css
        
      ]);
      $newsetting->save();
      return Redirect::tokenRedirect('activate', ['notice' => 'Congratulations ! Your Setting has been saved']);

  }

  public function get_selector(Request $request)
  {
    $shop = User::where("name" , $request->shop)->first();
    $response = Setting::where('user_id',$shop->id)->pluck('css')->first();
    return response()->json(['status' => "success" , "data" => $response]);
  }

  public function update_selector(Request $request)
  {
    $shop = User::where("name" , $request->shop)->first();
    DB::table('settings')
      ->where('user_id', $shop->id)
      ->update(['css' => $request->css]);
    return response()->json(['status' => "success" , "data" => "updated"]);
  }

  public function activeFibbl()
  {
      $newsetting = Setting::where('user_id',Auth::user()->id)->first();

      $link=User::where('id',Auth::user()->id)->first();
      $shop = Auth::user();
      $query = '{
        products(first: 1, query:"status:active") {
          edges {
            node {
              id
              title
              status
              onlineStoreUrl
            onlineStorePreviewUrl
            }
          }
        }
      }';
      $product=$shop->api()->graph($query);
      $response = $product['body']['data']['products']['edges'][0]['node'];
      return view('activate',compact('newsetting','link','response'));
  }
  
  public function status(Request $request)
  {
 

    DB::table('settings')
      ->where('user_id', Auth::user()->id)
      ->update(['status' => $request->status, ]);
 
      return Redirect::tokenRedirect('activate', ['notice' => 'Congratulations ! Your Setting has been saved']);
  }

    public function model_api()
    {
     
      $response = Http::withHeaders([
        "token" =>"token_2703122e819cf41e47aeedf04c511c980bfa504ea86fa9424d8d0bb347ff5274",
        "secret" =>"secret_33c2125207246fefce8f2c6903933b997d626968"])->get('https://api.fibbl.com/models/v1/1234');
        return response()->json(['status' => "success" , "data" => $response]);
    
    
    }
}
