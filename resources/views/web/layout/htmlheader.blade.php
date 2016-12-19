<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="@yield('description')">
  <meta name="keywords" content="@yield('keyword')">
  <title>@yield('web_title')</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="img/logo berkah.png" type="image/x-icon">

  <!-- Font awesome -->
  <link rel="stylesheet" href="{{ asset('css/font-awesome.css') }}">
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
  <!-- Slick slider -->
  <link rel="stylesheet" type="text/css" href="{{ asset('css/slick.css') }}">
  <!-- Fancybox slider -->
  <link rel="stylesheet" type="text/css" media="screen" href="{{ asset('css/jquery.fancybox.css') }}">
  <!-- Theme color -->
  <link id="switcher" rel="stylesheet" href="{{ asset('css/theme-color/red-theme.css') }}">

  <!-- Main style sheet -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">


  <!-- Google Fonts -->
  <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,400italic,300,300italic,500,700' rel='stylesheet' type='text/css'>


  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  @stack('css')
</head>
