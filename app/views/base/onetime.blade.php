
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/docs-assets/ico/favicon.png">

    <title>Mayfly</title>

    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap-signin.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/font/css/font-awesome.min.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
@if(Session::Has('flash_error'))
<div class="alert alert-danger">{{ Session::Get('flash_error')}}</div>
@endif
@if(Session::Has('flash_message'))
<div class="alert alert-info">{{ Session::Get('flash_message')}}</div>
@endif
    <div class="container">
		<div class='form-signin'>
		<h3><img src='/logo.png' style='height: 45px; width: 64px;'>Mayfly</h3>
		@yield('content')
		</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    @yield('javascript')
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-49182541-1', 'pwshare.com');
  ga('send', 'pageview');

</script>
  </body>
</html>

