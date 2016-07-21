<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="Assets/css/master.css">
    <link rel="stylesheet" href="Assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="Assets/css/font-awesome.min.css">

    <script type="text/javascript" src="Assets/js/jquery.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
  </head>
  <body>
    <!-- Main Body -->


          <div class="container white bg-grey adminmenu no-sidepad">
            <nav class="navbar navbar-inverse go-bottom">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                   <a class="navbar-brand brand" href="#">HEATLHY EGGS</a>
                </div>

                  <ul class="nav navbar-nav navbar-left leftmenu" role="search">
                    <li><a href="/admin">Dashboard</a></li>
                    <li><a href="/statistics">Statistics</a> </li>
                    <li><a href="/shops">Shops</a></li>
                    <li><a href="/users"> Users </a> </li>
                </ul> 

                  <ul class="nav navbar-nav navbar-right rightmenu">
                    <li><a href="#" class='white'>Hello, {{Auth::user()->email}}</a></li>
                      <li>   <a class="white" href="{{ url('/logout') }}">Logout</a></li>
                  </ul>


            </nav>
          </div>

   <!-- End of main Body -->


    <script type="text/javascript" src="Assets/js/master.js"></script>
    <script src="Assets/js/bootstrap.min.js"></script>
    <script src="Assets/js/jquery.validate.js"> </script>
    <script src="Assets/js/main.js"> </script>
  </body>
</html>



