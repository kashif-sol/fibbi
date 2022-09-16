@extends('layouts.website')
@section('content')
<head>

    <style>
        .heading {
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 600;
            font-size: 16px;
            line-height: 24px;
            color: #202223;
        }

        .para {
            width: 100%;
            height: 43px;
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 15px;
            line-height: 22px;
            color: #202223;
            flex: none;
            order: 1;
            align-self: stretch;
            flex-grow: 0
        }

        .body {
            font-family: 'SFProText';
            font-style: normal;
            font-weight: 400;
            font-size: 14px;
            line-height: 20px;
            color: #202223;
        }

        .second-btn {
            text-decoration: none;
            padding-left: 17px;
        }

        .parat {
            font-family: 'SFProText';
            font-style: normal;
        }

        body {
            border-radius: 0px 8px 8px 0px;
        }

        .card {
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.05), 0px 1px 2px rgba(0, 0, 0, 0.15);

        }

    </style>

</head>

<body class="mt-2">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-11">
                        <h1 class="heading">Welcome to the Fibbi Shopify app!</h1>
                    </div>
                    <div class="col-md-1">
                        <p style="text-align: right;"><strong>...</strong></p>
                    </div>
                </div>
                <div class="body">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="para">We are on a mission to create the world’s largest database of photorealistic
                                3D
                                assets from well known brands, and providing new innovative display technologies with
                                content to create a world where the online product experience exceeds the one of the
                                physical world.</p>
                        </div>
                    </div>

                    <p class="para">Our ground-breaking platform revolutionizes the accessibility of 3D assets, to a
                        cost
                        from €1 per model per month. And our Shopify app integrates display technologies such as 3D
                        viewer,
                        Augmented Reality placement, Virtual Try-on with just a few clicks. No coding skills required,
                        no
                        maintenance needed.</p>
                    <p class="para">To get started using the Shopify app, <span style="font-weight: bold;">you need an
                            account</span> on the Fibbl platform where you will find the Shopify specific tokens.</p>

                    <p class="parat" style="line-height: 25px ;"><span style="color: #2C6ECB;font-size: 16px;"> Click
                            here
                            to sign up and create an account.</span></p>

                    <p class="para"> Once logged in, go to this link to retrieve your tokens.</p>
                    <div class="row">
                        <div class="col-sm-3">
                            <a class="btn btn-secondary" href="token" style="background: #008060">Activate Fibbi</a>
                            <a class="second-btn">learn More</a>
                        </div>
                        <div class="col-sm-3">

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</body>
@endsection
