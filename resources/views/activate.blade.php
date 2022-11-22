
@extends('layouts.website')
@push('styles')
    <style>
        .first {
            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 20px;
            gap: 20px;

            width: 100%;
            height: 76px;

            /* Surface/Default */

            background: #FFFFFF;
            /* shadow-card */

            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
            border-radius: 8px;
        }

        .header {
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 500;
            font-size: 14px;
            line-height: 24px;
            color: #202223;
            margin-bottom:20px;
        }
        .header2 {
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 600;
            font-size: 17px;
            line-height: 24px;
            color: #202223;
        }

        .inputs {
            box-sizing: border-box;

            /* Auto layout */

            display: flex;
            flex-direction: column;
            align-items: flex-start;
            padding: 8px 12px;
            gap: 10px;

            width: 100%;
            height: 36px;

            /* Surface/Default */

            background: #FFFFFF;
            /* Border/Subdued */

            border: 1px solid #C9CCCF;
            border-radius: 4px;
        }

        .btn-secondary{
            background: #008060 !important;
        }
        .product-identifier {
            box-sizing: border-box;

            /* Auto layout */

            display: flex;
            flex-direction: row;
            align-items: center;
            padding: 0px 8px 0px 12px;

            width: 100%;
            height: 36px;

            /* Surface/Default */

            background: #FFFFFF;
            /* Border Neutral/Subdued */

            border: 1px solid #BABFC3;
            border-radius: 4px;
        }

        .insert {
            box-sizing: border-box;

            /* Auto layout */

            display: flex;
            flex-direction: row;



            width: 40%;
            height: 36px;
            float: right;
            /* Surface/Default */

            background: #FFFFFF;
            /* Border Neutral/Subdued */

            border: 1px solid #BABFC3;
            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
            border-radius: 4px;
        }

        body {
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 10px;
            font-size: 13px;
        }

        .para {

            width: 310px;
            height: 80px;

            top: 71px;

            /* Desktop/Body */

            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            /* or 143% */


            color: #6D7175;
        }
        .para2{
            margin-top: 30px;
        }

        .hide {
            display: none;
            background: #FFFFFF;
            /* shadow-popover */

            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
            border-radius: 4px;
        }

        .one:hover+.hide {
            display: block;
            color: red;
        }

        .hiddenp {
           
            flex-direction: row;
            align-items: flex-start;
            padding: 0px 0px;
            gap: 10px;


            width: 100%;
            height: 100%;
            color: black;
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
        }

        .modal-content {
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            background: #FFFFFF;
            /* Divider/Top */

            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
            border-radius: 8px 8px 8px 8px;

        }

        .tooltip {

            display: contents;
            border-bottom: 1px dotted black;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 32%;

            color: black;
            text-align: left;
            border-radius: 6px;
            padding: 5px 0;

            /* Position the tooltip */
            position: absolute;
            z-index: 1;
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            background: #FFFFFF;
            /* Divider/Top */

            border-radius: 0px 0px 8px 8px;
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        .card {
            background: #FFFFFF;
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            border:none;
        }
        label {
    display: inline-block;
    margin-bottom: 5px;
    font-weight: 500;
}

div#basicModal {
    top: 18%;
}

.card.unsaved-changes-bar {
    position: fixed;
    top: 0px;
    z-index: 999;
    width: 100%;
    border: 1px solid #ccc;
    left: 0;
    text-align: center;
    font-size: 16px;
    line-height: 20px;
    vertical-align: middle;
    padding-top: 0px;
    color: #fff;
    display: none;
    background: #000;
    border-radius: 8px;
}

.card.unsaved-changes-bar  p {
    font-size: 20px;
    font-weight: 500;
    margin: 0px;
    padding: 0px;
}

.unsaved-flex {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

button#discard-btn {
    border: 1px solid #fff;
    color: #fff;
    cursor: pointer;
    margin-right: 18px;
     min-width: 80px;
}

button#un-save-btn {
    min-width: 80px;
    border: 1px solid #fff;
}
    </style>

@endpush

@php 

$icon_position = array(
    array("title" => "Insert inside" , "value" => "I"),
    array("title" => "Insert above" , "value" => "A"),
    array("title" => "Insert below" , "value" => "B")
  ); 

  $icon_position2 = array(
    array("title" => "Top" , "value" => "T"),
    array("title" => "Bottom" , "value" => "B")
  ); 

  $icon_position3 = array(
    array("title" => "Left" , "value" => "L"),
    array("title" => "Middle" , "value" => "M"),
    array("title" => "Right" , "value" => "R")
  ); 

  $identifier = array(
        array("title" => "product_id" , "value" => "product_id"),
    array("title" => "handle" , "value" => "handle"),
    array("title" => "barcode" , "value" => "barcode"),
    array("title" => "sku" , "value" => "sku")
  ); 
$btn_label = "Deactivated";
$btn_val = 1;
$btn_value = "Activate";

if(isset($newsetting))
{
    if($newsetting->status == 1)
    {
        $btn_label = "Activated";
        $btn_val = 0;
        $btn_value = "Deactivate";
    }else{
        $btn_label = "Deactivated";
        $btn_val = 1;
        $btn_value = "Activate";
    }
}

@endphp

@section('content')

<body style="padding: 20px; background: #F6F6F7;">
    <input type="hidden" name="shop_domain" id="shop_domain" value="{{Auth::user()->name}}" >
    <div class="container mt-3">


       <div class="card unsaved-changes-bar">
            <div class="card-body">
                <div class="card-title m-0">
                    <div class="unsaved-flex">
                        <p>Unsaved changes</p>
                        <div class="buttons-section">
                         <button type="button" id="discard-btn" class="btn btn-outline">Discard</button>
                            <button type="button" id="un-save-btn" class="btn btn-secondary">Save</button>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card first">
            <div class="card-body">
                <div class="card-title m-0">
                    <form action="activatebtn" method="post">
                        @sessionToken
                        <input type="hidden" name="status" value="{{$btn_val}}" >
                    <div class="row">
                        <div class="col-md-10 d-flex align-items-center">
                            <p style=" font-size: 14px;  margin: 0; ">The Fibbl app is <b>{{$btn_label}}</b>.</p>
                        </div>
                        <div class="col-md-2" style="text-align: left"><button type="submit" class="btn btn-secondary" id="btntop"  name="status" value="{{$btn_val}}" >{{$btn_value}}</button></div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-5">
                <h1 class="header2">Fibbl token</h1>
                <div class="row">
                    <p class="para">For authorization and use of Fibbl's Shopify app, company specific tokens needs to be added. 
                        Token and secret can be found <a target="_blank" href="https://app.fibbl.com/settings#tech">here</a> in the Fibbl platform. 
                    </p>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="header">Token</h1>
                            <form action="" method="post">
                                <div class="row">

                                    <div class="col-md-12">
                                        <label>Token</label><br>
                                        <input type="text" class="inputs" readonly name="api_token" value="{{$link->api_token}}" disabled>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label>Secret Key</label><br>
                                        <input type="text" class="inputs" readonly name="api_secret" value="{{$link->api_secret}}" disabled>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-md-10"></div>
                                    {{-- <div class="col-md-2 mt-4"> <button type="submit" class="btn btn-secondary" style="background: #008060 !important; float: right;">Disconnect</button> --}}
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
        <form action="settings" method="post" id="form_settings">
            @sessionToken
        <div class="row" style="margin-top:20px">
            
            <div class="col-md-5" >

                <div class="tooltip">
                    <!-- <span class="tooltiptext">Tooltip text</span> -->
                    <h1 class="header2">App settings <i class="fa fa-question-circle" aria-hidden="true"></i></h1>
                    <div class="tooltiptext">
                        <div class="card">
                            <div class="card-body">
                                <p class="hiddenp">The product ID connects Fibbl models to your products, and enables
                                    Fibbl
                                    technologies and content to be displayed on your website. This could be your SKU,
                                    EAN or
                                    article number depending on your data layer setup and preference.

                                    By adding your Google Analytics ID, you enable Fibbl to automatically send usage
                                    events
                                    of the display technologies to your Google Analytics account, so you can track and
                                    evaluate the performance. <a href="https://intercom.help/fibbl/en/collections/3302768-installing-fibbl" target="_balnk"> Learn more here.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
               
                    <p class="para">The product ID connects Fibbl models to your products, and enables Fibbl technologies and content to be displayed on your website. </p>
               

            </div>
            <div class="col-md-7 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="header">Setup the app function</h1>
                            
                                <div class="row">

                                    <div class="col-md-12">
                                        <label>Product identifier</label><br>
                                        <select name="product_identifier" class="product-identifier" id="product_identifier">
                                            @foreach ($identifier as $product_identifier)
                                            <option @if(isset($newsetting) && $newsetting->product_identifier == $product_identifier['value']) selected @endif value="{{$product_identifier['value']}}">{{$product_identifier['title']}}</option>
                                        @endforeach

                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label>Google Analytics ID</label><br>
                                        <input type="text" class="inputs" name="google_id" value="@if(isset($newsetting)){{ $newsetting->google_id ?: '' }} @endif">
                                    </div>


                                </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:20px;margin-bottom: 20px;">
         
            <div class="col-md-5" >
                <h1 class="header2 mt-4">Smart selector</h1>
                <div class="row">
                    <p class="para">Use the element selector and paste the selected CSS class or ID here. </p>
                </div>

                <div class="mt-4" >
                    <h1 class="header2">Button position</h1>
                    <div class="row">
                        <p class="para">The app will by default add standardized clickable icons which represents the
                            different display technologies.</p>
                    </div>
                </div>

            </div>

            
            <div class="col-md-7 mt-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="header">Set the button position</h1>
                           
                                <div class="row">

                                    <div class="col-md-12">
                                        <label>CSS element</label><br>
                                        <input type="text" class="inputs" name="css" value="{{$newsetting->css ?? ''}}" id="css_slector">
                                    </div>

                                    <div class="col-md-12" style=" margin-top: 10px;">
                                        <a href="#" class="btn btn-light" style="float: right;" data-toggle="modal" data-target="#basicModal">Select element</a>

                                    </div>
                                    
                                    <div class="col-md-12 ">
                                        <label>Icon position</label><br>
                                        <select name="btn_postition" class="product-identifier" id="btn_postition">
                                         @foreach ($icon_position as $icon_position)
                                             <option @if(isset($newsetting) && $newsetting->btn_postition == $icon_position['value']) selected @endif value="{{$icon_position['value']}}">{{$icon_position['title']}}</option>
                                         @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-2">
                                        <label>Icon position</label><br>
                                        <select name="btn_postition2" class="product-identifier" id="btn_postition">
                                         @foreach ($icon_position2 as $icon_position2)
                                             <option @if(isset($newsetting) && $newsetting->btn_postition2 == $icon_position2['value']) selected @endif value="{{$icon_position2['value']}}">{{$icon_position2['title']}}</option>
                                         @endforeach
                                        </select>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label>Icon position</label><br>
                                        <select name="btn_postition3" class="product-identifier" id="btn_postition">
                                         @foreach ($icon_position3 as $icon_position3)
                                             <option @if(isset($newsetting) && $newsetting->btn_postition3 == $icon_position3['value']) selected @endif value="{{$icon_position3['value']}}">{{$icon_position3['title']}}</option>
                                         @endforeach
                                        </select>
                                    </div>

                                    
                                    

                                    
                                    <div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <p class="modal-title" id="myModalLabel"> <b> Smart selector</b></p>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="    border: 1px solid white;
                                                        background: white;
                                                        font-size: 22px;">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Smart Selector</p>
                                                    <label for="path">1. Product page URL to use smart selector</label>
                                                    <input type="text" class="inputs" value="{{$response['onlineStorePreviewUrl'] ?? ''}}" disabled>
                                                    <div class="col-md-12 mt-3">
                                                        <p>2. A new window will be opened from your website</p>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <p>3. Move your mouse and select the element where you want to display Fibbl buttons</p>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <p>4. Click on the selected element name, it will be automatically pasted in the Shopify app. Go back to app and select button position</p>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                                                    {{-- <a data-target="{{$link->name}}" target="_blank" class="btn btn-secondary">Save changes</a> --}}
                                                    <a href="{{$response['onlineStorePreviewUrl'].'?smartSelector=true'}}"  target="_blank" class="btn btn-success">Start choosing</a>,
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                               
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-md-12 mb-5">
                <button type="submit" id="save-settin-btn" style="float: right;background: #008060 !important;" class="btn btn-secondary">Save</button>
            </div>
        </form>
    </div>
        </div>
        
    </div>
</body>

@endsection

@push('scripts')
<script type="text/javascript">

$("#form_settings input , #form_settings select").change(function(){
 $(".card.unsaved-changes-bar").show();
});

$("#form_settings input , #form_settings select").keyup(function(){
 $(".card.unsaved-changes-bar").show();
});


$("#discard-btn").click(function(){
    window.location.reload();
});

$("#un-save-btn").click(function(){
     $("#save-settin-btn").click();
});

    function changevalue(){
      currentvalue = document.getElementById('btntop').value;
      if(currentvalue == 0){
       document.getElementById("btntop").value=1;

      }else{
         document.getElementById("btntop").value=0;
      }
      console.log(currentvalue);
      var token = document.getElementsByClassName("session-token");
      console.log(token);
      var status = currentvalue;
      $.ajax({
       url: "/activatebtn",
        type:"POST",
            data:{
          status:status,
          token:token
         
        },
        success:function(response){
          console.log(response);
        }
        });
    }
    setInterval(GetSelector, 3000);
 
        
        function GetSelector()
        {
             $.ajax({
                 url: "/get-selector?shop="  + $("#shop_domain").val(),
                 type: 'GET',
                 dataType: 'json', 
                 success: function(res) {
                    if(res.status == "success")
                    {
                        if(res.data != "" && res.data != null )
                        {
                            if(res.data !=  $("#css_slector").val())
                            {
                                $(".card.unsaved-changes-bar").show();
                            }
                            $("#css_slector").val(res.data);
                           /// $(".close").click();
                           // $("#basicModal").modal("hide");
                        }
                    }
                 }
             });
        }
  

    </script>
@endpush
