<head>
    <title>{{config('app.name') . ' | ' .$title ?? config('app.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta charset="utf-8" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{config('app.name') . ': ' .$title ?? config('app.name')}}" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="{{config('app.name')}}" />
    <link rel="canonical" href="" />
    <link rel="shortcut icon" href="{{asset('img/Logo.png')}}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
    <script src="https://kit.fontawesome.com/3e9e805a99.js" crossorigin="anonymous"></script>
    <!--end::Global Stylesheets Bundle-->
    <style>
        .bghome{
            background-image: url("{{ asset('img/Kantin Baru.jpeg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            /* background-position: center; */
        }
        .bgcard1{
            background-image: url("{{ asset('img/Background.jpeg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .bgcard2{
            background-image: url("{{ asset('img/Kantin Baru.jpeg') }}");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>