<meta charset="utf-8">

<title>Berkah | @yield('htmlheader_title', 'Your title here')</title>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.6 -->
<link rel="stylesheet" href="{{ asset('adminpage/css/bootstrap.min.css') }}" type="text/css">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
<!-- Ionicons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('adminpage/css/AdminLTE.css') }}" type="text/css">
<!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
<link rel="stylesheet" href="{{ asset('adminpage/css/skins/skin-red.min.css') }}" type="text/css">
<!-- iCheck -->
<link rel="stylesheet" href="{{ asset('adminpage/plugins/iCheck/square/blue.css') }}" type="text/css">


@stack('css')
