
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="/docs-assets/ico/favicon.png">

    <title>PWShare.com</title>

    <!-- Bootstrap core CSS -->
    <link href="/dist/css/bootstrap-cyso.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/font/css/font-awesome.min.css">
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,600|Average' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->

  </head>

  <body>
	<div class="navbar navbar-fixed-top light" role="navigation">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      		</button>
	<div class="pull-left"><a href="/" id=""  class="navbar-brand" style='margin-top: 8px'>PWShare</a></div>
      	<div class="nav-collapse collapset">
        	<ul class="nav navbar-nav">
                  	<li class="">
          			<a href="/about">about</a>
		</li>
        	<li class="dropdown ">
          	<a href="#" class="dropdown-toggle" data-toggle="dropdown">Language<b class="caret"></b></a>
          	<ul class="dropdown-menu">
			<li><a href='/setLang?lang=en&ref={{ base64_encode($_SERVER['REQUEST_URI'])}}'><img src='/img/icons/flag_usa.png'>English</a></li>
			<li><a href='/setLang?lang=nl&ref={{ base64_encode($_SERVER['REQUEST_URI'])}}'><img src='/img/icons/flag_netherlands.png'>Dutch</a></li>
			<li><a href='/setLang?lang=de&ref={{ base64_encode($_SERVER['REQUEST_URI'])}}'><img src='/img/icons/flag_germany.png'>German</a></li>

		</ul></li>
            	</ul>
          	</li>
       		</ul>
		</div>
</div>
@if(Session::Has('flash_error'))
<div class="alert alert-danger">{{ Session::Get('flash_error')}}</div>
@endif
@if(Session::Has('flash_message'))
<div class="alert alert-info">{{ Session::Get('flash_message')}}</div>
@endif
    <div class="container">
		<div class='col-md-4 col-md-offset-4 form-signin'>

		<p>&nbsp;</p>
		<p></p>
		@yield('content')
		</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/dist/js/ZeroClipboard.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    @yield('javascript')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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

