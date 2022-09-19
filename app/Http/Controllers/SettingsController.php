<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

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
}
