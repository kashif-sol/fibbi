
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
            font-weight: 600;
            font-size: 16px;
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
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.05), 0px 1px 2px rgba(0, 0, 0, 0.15);
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
            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
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
            display: flex;
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
            text-align: center;
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
            box-shadow: 0px 0px 5px rgb(0 0 0 / 5%), 0px 1px 2px rgb(0 0 0 / 15%);
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
        }

    </style>

@endpush

@section('content')

<body style="padding: 20px">

    <div class="container mt-3">
        <div class="card first">
            <div class="card-body">
                <div class="card-title">
                    <div class="row">
                        <div class="col-md-10">
                            <p style="margin-top: 4px;">The Fibbl app is <b>activated</b>.</p>
                        </div>
                        <div class="col-md-2" style="text-align: left"><button class="btn btn-default" id="btntop" onclick="changevalue()" name="status" value="0" style="float: right; border:1px solid black">Deactivate</button></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-5">
                <h1 class="header">Fibbl token</h1>
                <div class="row">
                    <p class="para">For authorization and use of Fibbl's Shopify app, company specific tokens needs to be added. 
                        Token and secret can be found here in the Fibbl platform. 
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
        <form action="settings" method="post">
            @sessionToken
        <div class="row" style="margin-top:20px">
            <div class="col-md-1"></div>
            <div class="col-md-4" style="margin-right: 16px; padding: 0;">

                <div class="tooltip">
                    <!-- <span class="tooltiptext">Tooltip text</span> -->
                    <h1 class="header">App Settings <i class="fa fa-question-circle" aria-hidden="true"></i></h1>
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
                                    evaluate the performance. Learn more here.</p>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- <div class="row"> --}}
                    <p class="para">For authorization and use of Fibbl’s Shopify app, company specific tokens
                        needs
                        to be added. Token and secret can be found here in the Fibbl platform. </p>
                {{-- </div> --}}

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="header">Setup the App function</h1>
                            
                                <div class="row">

                                    <div class="col-md-12">
                                        <label>Product Identifier</label><br>
                                        <select name="product_identifier" class="product-identifier" id="product_identifier">
                                            <option value="SKU"  @if (isset($newsetting) && $newsetting->product_identifier == "SKU") selected @endif>SKU</option>
                                            <option value="Test" @if (isset($newsetting) && $newsetting->product_identifier == "Test") selected @endif>Test</option>

                                        </select>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label>Google Analytics ID</label><br>
                                        <input type="text" class="inputs" name="google_id" value="{{isset($newsetting) && $newsetting->google_id}}">
                                    </div>


                                </div>

                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row" style="margin-top:20px;margin-bottom: 20px;">
            <div class="col-md-1"></div>
            <div class="col-md-4" style="margin-right: 16px; padding: 0;">
                <h1 class="header">Button position</h1>
                <div class="row">
                    <p class="para">The app will by default add standardized clickable icons which represents the
                        different display technologies.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h1 class="header">Set the button position</h1>
                           
                                <div class="row">

                                    <div class="col-md-12">
                                        <label>Icon position</label><br>
                                        <select name="btn_postition" class="product-identifier" id="btn_postition">
                                         
                                            <option value="Down" @if (isset($newsetting) && $newsetting->btn_postition == "Down") selected @endif>Down</option>
                                            <option value="Test" @if (isset($newsetting) && $newsetting->btn_postition == "Test") selected @endif>Test</option>

                                        </select>
                                    </div>

                                    <div class="col-md-12" style=" margin-top: 10px;">
                                        <a href="#" class="btn btn-light" style="float: right;" data-toggle="modal" data-target="#basicModal">Select element</a>

                                    </div>
                                    

                                    <div class="col-md-12 mt-4">
                                        <label>CSS element</label><br>
                                        <input type="text" class="inputs" name="css" value="{{$newsetting->css ?? ''}}">
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
                                                    <label for="path">1. Path to use smart selector</label>
                                                    <input type="text" class="inputs" value="{{$response['onlineStorePreviewUrl'] ?? ''}}" disabled>
                                                    <div class="col-md-12 mt-3">
                                                        <p>2. A new window will be opened from your site</p>
                                                    </div>
                                                    <div class="col-md-12 mt-3">
                                                        <p>3. Move your mouse and select the position you want</p>
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
            <div class="col-md-12 mb-2">
                <button type="submit" style="float: right;background: #008060 !important;" class="btn btn-secondary">Save</button>
            </div>
        </form>
        </div>
        
    </div>
</body>

@endsection

@push('scripts')
<script type="text/javascript">
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
    </script>
@endpush
