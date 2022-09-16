    @extends('layouts.website')
@section('content')
    <head>

    <style>
            .header {
                font-family: 'SFProText';
                font-style: normal;
                font-weight: 600;
                font-size: 16px;
                line-height: 24px;
                color: #202223;
            }

            .para {
                position: absolute;
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

            body {
                font-family: 'SFProText';
                font-style: normal;
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
           .form{
            border-radius: 8px;

            background: #FFFFFF;
           }
        </style>
    </head>

    <body class="mt-3">
        <div class="container">


            <div class="row">
                <div class="col-md-5">
                    <h1 class="header">Fibbi token</h1>
                    <div class="row">
                        <p class="para">For authorization and use of Fibbl’s Shopify app, company specific tokens
                            needs
                            to be added. Token and secret can be found here in the Fibbl platform. </p>
                    </div>
                </div>

                <div class="col-md-7 form">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title">
                                <h1 class="header">Token</h1>
                                <form action="token" method="post" >
                                    @csrf
                                    <div class="row">

                                        <div class="col-md-12">
                                            <label>Token</label><br>
                                            <input type="text" class="inputs" name="api_token" value="hendfijhfdjosjkadsdfdsfjodjfsok">
                                        </div>
                                        <div class="col-md-12 mt-4">
                                            <label>Secret Key</label><br>
                                            <input type="text" class="inputs" name="api_secret" value="hendfijhfdjosjsdfsdgsdkadjodjfsok">
                                        </div>


                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-9"></div>
                                        <div class="col-md-3 mt-4"> <button type="submit"  class="btn btn-secondary"
                                                style="background: #008060;">Connect</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>



        </div>
    </body>

    </html>
@endsection

