<!doctype html>
<html class="no-js" lang="">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title></title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <link rel="apple-touch-icon" href="apple-touch-icon.png">
      <!-- Place favicon.ico in the root directory -->

      <link rel="stylesheet" href="/css/normalize.css">
      <link rel="stylesheet" href="/css/main.css">
      <link rel="stylesheet" href="/css/bootstrap.min.css">
      <link rel="stylesheet" href="/css/font-awesome.min.css">
      <script src="/js/vendor/modernizr-2.8.3.min.js"></script>
  </head>
  <body>
      <!--[if lt IE 8]>
          <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
      <![endif]-->

      <!-- Add your site or application content here -->
      <!-- <p>Hello world! This is HTML5 Boilerplate.</p> -->

      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">
              <img class="navbar-image" src="/img/smalllogo.png" align="left" alt=""><span>CNHS</span></a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="/about">ABOUT</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ADMISSION <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/admission/inquire">INQUIRE</a></li>
                  <li><a href="/admission/organizational-chart">ORGANIZATIONAL CHART</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">ACADEMICS <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="/academics/library">LIBRARY</a></li>
                  <li><a href="/academics/highschool">HIGHSCHOOL</a></li>
                  <li><a href="/academics/senior-highschool">SENIOR HIGHSCHOOL</a></li>
                </ul>
              </li>
              <li><a href="/department">DEPARTMENT</a></li>
              <li><a href="/events">CALENDAR OF EVENTS</a></li>
              <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> 
              Login</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>

      <!-- header -->

      <div id="headerjumb" class="header-main">
        <div class="row">
            <div class="col-sm-3">
                <center><img src="/img/logo2.png" width="180px"></center>
            </div>
            <div class="col-sm-6">
                <center><img src="/img/headerschoolname.jpg" 
                style="max-width: 750px; width:100%;"></center>
            </div>
            <div class="col-sm-3">
                <center><img src="/img/logoKNG2.png" width="180px"></center>
            </div>
        </div>
      </div>
        
      <div class="container-fluid main-container">
        @yield('content')
      </div>

      <div class="footer-main">
        <div class="row">
            <div class="col-sm-3 foot-div">
              <img src="/img/schoolfooterlogo.jpg" alt="">
            </div>
            <div class="col-sm-3 foot-div">
              <p class="center-middle">Calabanga National High School is a DepEd managed partially 
              urban secondary public school located in Calabanga,Camarines Sur. 
              The School is open to all elementary school graduates regardless 
              of their academic achievements and socio-economic status.</p>
            </div>
            <div class="col-sm-3 foot-div">
              <div class="center-middle">
                    <a class="btn btn-lg btn-social-icon btn-facebook" 
                        target="_blank" 
                        href="https://www.facebook.com/cnhs1966/?fref=ts" 
                        style="font-size: 50px;" >
                    <i class="fa fa-facebook-square"></i>
                    </a>
                    <p>Like our page!</p>
              </div>
            </div>
            <div class="col-sm-3 foot-div">
              <h4 class="center-middle">Sta. Cruz Ratay 
                <br> Calabanga Cam. Sur 
                <br>(054) 255 64 96 
                <br>Calabangahigh@gmail.com
              </h4>
            </div>
        </div>
      </div>
      <span class="clearfix"></span>
      <footer class="container-fluid text-center" style = "background-color: #000023; color: white; padding-top:10px; padding-bottom:10px;">
        <a id="scrollToTop" href="#headerjumb" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
        </a>
        <p>All Rights Reserved &copy;2015</p> 
      </footer>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script>window.jQuery || document.write('<script src="/js/vendor/jquery-1.11.3.min.js"><\/script>')</script>
      <script src="/js/plugins.js"></script>
      <script src="/js/main.js"></script>
      <script src="/js/jquery-2.1.4.min.js"></script>
      <script src="/js/bootstrap.min.js"></script>
      <script src="/js/script.js"></script>

      <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
      <script>
            (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
            function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
            e=o.createElement(i);r=o.getElementsByTagName(i)[0];
            e.src='https://www.google-analytics.com/analytics.js';
            r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
            ga('create','UA-XXXXX-X','auto');ga('send','pageview');
      </script>
  </body>
</html>
