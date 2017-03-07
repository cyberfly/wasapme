<!DOCTYPE html>
<html lang="en" ng-app="wasapMe">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ isset($title) ? $title.' :: '.config('backpack.base.project_name').' Admin' : config('backpack.base.project_name').' Admin' }}</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/jquery.bxslider.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('frontend/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('css/sweetalert.css') }}">
    <script>
      var config = {
        base_url : "{{ url('/') }}"
      };

    </script>

  </head>
  <body>

    <div class="loader"></div>
    <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
        <nav class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">{!! config('backpack.base.logo_lg') !!}</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#main-header">Home</a></li>
                <li class=""><a href="#feature">About</a></li>
                <li class=""><a href="#service">Pricing</a></li>
                <li class=""><a href="#contact">Contact Us</a></li>
                <li class="">
                  @if (Auth::guest())
                      <a href="/login">Login / Register</a>
                  @else
                      <a href="/myaccount">My Account</a>
                  @endif
                </li>
              </ul>
            </div>
          </div>
        </nav>
        </header>
        <div class="wrapper">
        <div class="container">
          <div class="row">
            <div id="getStarted" ng-controller="MainController" class="banner-info text-center wow fadeIn delay-05s">
              <!-- <h1 class="bnr-title">We are at ba<span>ker</span></h1> -->
              <h2 class="bnr-sub-title">WhatsApp Marketing Made Easy!</h2>
              <p class="bnr-para" style="margin-bottom: 60px;">Start sharing your WhatsApp direct link.<br> Track your marketing campaign perfomance in second</p>

              <form class="form-inline">
                <div class="form-group">
                  <label for="exampleInputName2">Phone Number</label>
                  <input type="text" class="form-control" id="exampleInputName2" placeholder="@{{ placeholder_phone }}" ng-model="data.phonenum" ng-keyup="createLink()">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail2">Message</label>
                  <input type="text" class="form-control" id="exampleInputEmail2" placeholder="@{{ placeholder_message }}" ng-model="data.message" ng-keyup="createLink()">

                </div>

                <!-- <button type="submit" class="btn btn-primary">Send now</button> -->
              </form>

              <div style="margin-top: 20px;">

                <div class="col-md-6 col-md-offset-2">

                  <input type="text" data-toggle="tooltip" title="Link copied to clipboard!" class="form-control" id="final_link" placeholder="@{{ placeholder_link }}" value="@{{ final_link }}" >

                </div>

                <div class="col-md-1">
                  <button class="btn btn-primary" ng-click="clickCopy()" >Click to Copy</button>
                </div>

              </div>


              <div class="brn-btn" style="clear: both;text-align: center;">
                <button type="button" class="btn btn-download" ng-click="startTracking()">Track now!</button>
                <!-- <a href="#" class="btn btn-more">Track now</a> -->
              </div>

              <div class="overlay-detail">
                <a href="#feature"><i class="fa fa-angle-down"></i></a>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    <!---->
    <section id="feature" ng-controller="CampaignController" class="section-padding wow fadeIn delay-05s">
      <div class="container">
        <div class="row">

          <div class="col-md-12">

              <h1>My Campaign</h1>

              <table class="table table-bordered table-hover table-striped">
                <thead>
                  <tr>
                    <td>Campaign Name</td>
                    <td>Campaign URL</td>
                    <td>Clicked</td>
                    <td>Campaign Start</td>
                    <td>Campaign End</td>
                  </tr>
                </thead>
                <tbody>
                  <tr ng-repeat="campaign in campaigns">
                    <td>@{{ campaign.campaign_name }}</td>
                    <td>@{{ campaign.campaign_url }}</td>
                    <td>40</td>
                    <td>@{{ campaign.start_at }}</td>
                    <td>@{{ campaign.end_at }}</td>
                  </tr>
                </tbody>
              </table>


          </div>

        </div>
      </div>
    </section>




    <footer id="footer">
      <div class="container">
        <div class="row text-center">
          <p>&copy; WasapMe. All Rights Reserved.</p>
        </div>
      </div>
    </footer>
    <!---->
  </div>
    <script src="{{ URL::asset('frontend/js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/angular.js') }}"></script>
    <script src="{{ URL::asset('js/angular-route.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.easing.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/wow.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/jquery.bxslider.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/custom.js') }}"></script>
    <script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/ngClipboard.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/main.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/directives.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/services.js') }}"></script>
    <script src="{{ URL::asset('frontend/js/controllers.js') }}"></script>


  </body>
</html>
<script type="text/javascript">

$( document ).ready(function() {

// swal("Good job!", "You clicked the button!", "success")


});

</script>