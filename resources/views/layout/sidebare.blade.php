
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Medicine Factory</title>
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.css"crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="../bootstrap5/"> --}}
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <style>

@keyframes swing {
    0% {
      transform: rotate(0deg);
    }
    10% {
      transform: rotate(10deg);
    }
    30% {
      transform: rotate(0deg);
    }
    40% {
      transform: rotate(-10deg);
    }
    50% {
      transform: rotate(0deg);
    }
    60% {
      transform: rotate(5deg);
    }
    70% {
      transform: rotate(0deg);
    }
    80% {
      transform: rotate(-5deg);
    }
    100% {
      transform: rotate(0deg);
    }
  }

  @keyframes sonar {
    0% {
      transform: scale(0.9);
      opacity: 1;
    }
    100% {
      transform: scale(2);
      opacity: 0;
    }
  }
  body {
    font-size: 0.9rem;
  }
  .page-wrapper .sidebar-wrapper,
  .sidebar-wrapper .sidebar-brand > a,
  .sidebar-wrapper .sidebar-dropdown > a:after,
  .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before,
  .sidebar-wrapper ul li a i,
  .page-wrapper .page-content,
  .sidebar-wrapper .sidebar-search input.search-menu,
  .sidebar-wrapper .sidebar-search .input-group-text,
  .sidebar-wrapper .sidebar-menu ul li a,
  #show-sidebar,
  #close-sidebar {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }

  /*----------------page-wrapper----------------*/

  .page-wrapper {
    height: 100vh;
  }

  .page-wrapper .theme {
    width: 40px;
    height: 40px;
    display: inline-block;
    border-radius: 4px;
    margin: 2px;
  }

  .page-wrapper .theme.chiller-theme {
    background: #1e2229;
  }

  /*----------------toggeled sidebar----------------*/

  .page-wrapper.toggled .sidebar-wrapper {
    left: 0px;
  }

  @media screen and (min-width: 768px) {
    .page-wrapper.toggled .page-content {
      padding-left: 300px;
    }
  }
  /*----------------show sidebar button----------------*/
  #show-sidebar {
    position: fixed;
    left: 0;
    top: 10px;
    border-radius: 0 4px 4px 0px;
    width: 35px;
    transition-delay: 0.3s;
  }
  .page-wrapper.toggled #show-sidebar {
    left: -40px;
  }
  /*----------------sidebar-wrapper----------------*/

  .sidebar-wrapper {
    width: 260px;
    height: 100%;
    max-height: 100%;
    position: fixed;
    top: 0;
    left: -300px;
    z-index: 999;
  }

  .sidebar-wrapper ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
  }

  .sidebar-wrapper a {
    text-decoration: none;
  }

  /*----------------sidebar-content----------------*/

  .sidebar-content {
    max-height: calc(100% - 30px);
    height: calc(100% - 30px);
    overflow-y: auto;
    position: relative;
  }

  .sidebar-content.desktop {
    overflow-y: hidden;
  }

  /*--------------------sidebar-brand----------------------*/

  .sidebar-wrapper .sidebar-brand {
    padding: 10px 20px;
    display: flex;
    align-items: center;
  }

  .sidebar-wrapper .sidebar-brand > a {
    text-transform: uppercase;
    font-weight: bold;
    flex-grow: 1;
  }

  .sidebar-wrapper .sidebar-brand #close-sidebar {
    cursor: pointer;
    font-size: 20px;
  }
  /*--------------------sidebar-header----------------------*/

  .sidebar-wrapper .sidebar-header {
    padding: 20px;
    overflow: hidden;
  }

  .sidebar-wrapper .sidebar-header .user-pic {
    float: left;
    width: 60px;
    padding: 2px;
    border-radius: 12px;
    margin-right: 15px;
    overflow: hidden;
  }

  .sidebar-wrapper .sidebar-header .user-pic img {
    object-fit: cover;
    height: 100%;
    width: 100%;
  }

  .sidebar-wrapper .sidebar-header .user-info {
    float: left;
  }

  .sidebar-wrapper .sidebar-header .user-info > span {
    display: block;
  }

  .sidebar-wrapper .sidebar-header .user-info .user-role {
    font-size: 12px;
  }

  .sidebar-wrapper .sidebar-header .user-info .user-status {
    font-size: 11px;
    margin-top: 4px;
  }

  .sidebar-wrapper .sidebar-header .user-info .user-status i {
    font-size: 8px;
    margin-right: 4px;
    color: #5cb85c;
  }

  /*-----------------------sidebar-search------------------------*/

  .sidebar-wrapper .sidebar-search > div {
    padding: 10px 20px;
  }

  /*----------------------sidebar-menu-------------------------*/

  .sidebar-wrapper .sidebar-menu {
    padding-bottom: 10px;
  }

  .sidebar-wrapper .sidebar-menu .header-menu span {
    font-weight: bold;
    font-size: 14px;
    padding: 15px 20px 5px 20px;
    display: inline-block;
  }

  .sidebar-wrapper .sidebar-menu ul li a {
    display: inline-block;
    width: 100%;
    text-decoration: none;
    position: relative;
    padding: 8px 30px 8px 20px;
  }

  .sidebar-wrapper .sidebar-menu ul li a i {
    margin-right: 10px;
    font-size: 12px;
    width: 30px;
    height: 30px;
    line-height: 30px;
    text-align: center;
    border-radius: 4px;
  }

  .sidebar-wrapper .sidebar-menu ul li a:hover > i::before {
    display: inline-block;
    animation: swing ease-in-out 0.5s 1 alternate;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-dropdown > a:after {
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    content: "\f105";
    font-style: normal;
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    text-align: center;
    background: 0 0;
    position: absolute;
    right: 15px;
    top: 14px;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu ul {
    padding: 5px 0;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li {
    padding-left: 25px;
    font-size: 13px;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a:before {
    content: "\f111";
    font-family: "Font Awesome 5 Free";
    font-weight: 400;
    font-style: normal;
    display: inline-block;
    text-align: center;
    text-decoration: none;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    margin-right: 10px;
    font-size: 8px;
  }

  .sidebar-wrapper .sidebar-menu ul li a span.label,
  .sidebar-wrapper .sidebar-menu ul li a span.badge {
    float: right;
    margin-top: 8px;
    margin-left: 5px;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .badge,
  .sidebar-wrapper .sidebar-menu .sidebar-dropdown .sidebar-submenu li a .label {
    float: right;
    margin-top: 0px;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-submenu {
    display: none;
  }

  .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active > a:after {
    transform: rotate(90deg);
    right: 17px;
  }

  /*--------------------------side-footer------------------------------*/

  .sidebar-footer {
    position: absolute;
    width: 100%;
    bottom: 0;
    display: flex;
  }

  .sidebar-footer > a {
    flex-grow: 1;
    text-align: center;
    height: 30px;
    line-height: 30px;
    position: relative;
  }

  .sidebar-footer > a .notification {
    position: absolute;
    top: 0;
  }

  .badge-sonar {
    display: inline-block;
    background: #980303;
    border-radius: 50%;
    height: 8px;
    width: 8px;
    position: absolute;
    top: 0;
  }

  .badge-sonar:after {
    content: "";
    position: absolute;
    top: 0;
    left: 0;
    border: 2px solid #980303;
    opacity: 0;
    border-radius: 50%;
    width: 100%;
    height: 100%;
    animation: sonar 1.5s infinite;
  }

  /*--------------------------page-content-----------------------------*/

  .page-wrapper .page-content {
    display: inline-block;
    width: 100%;
    padding-left: 0px;
    padding-top: 20px;
  }

  .page-wrapper .page-content > div {
    padding: 20px 40px;
  }

  .page-wrapper .page-content {
    overflow-x: hidden;
  }

  /*------scroll bar---------------------*/

  ::-webkit-scrollbar {
    width: 5px;
    height: 7px;
  }
  ::-webkit-scrollbar-button {
    width: 0px;
    height: 0px;
  }
  ::-webkit-scrollbar-thumb {
    background: #525965;
    border: 0px none #ffffff;
    border-radius: 0px;
  }
  ::-webkit-scrollbar-thumb:hover {
    background: #525965;
  }
  ::-webkit-scrollbar-thumb:active {
    background: #525965;
  }
  ::-webkit-scrollbar-track {
    background: transparent;
    border: 0px none #ffffff;
    border-radius: 50px;
  }
  ::-webkit-scrollbar-track:hover {
    background: transparent;
  }
  ::-webkit-scrollbar-track:active {
    background: transparent;
  }
  ::-webkit-scrollbar-corner {
    background: transparent;
  }


  /*-----------------------------chiller-theme-------------------------------------------------*/

  .chiller-theme .sidebar-wrapper {
      background: #31353D;
  }

  .chiller-theme .sidebar-wrapper .sidebar-header,
  .chiller-theme .sidebar-wrapper .sidebar-search,
  .chiller-theme .sidebar-wrapper .sidebar-menu {
      border-top: 1px solid #3a3f48;
  }

  .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
  .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
      border-color: transparent;
      box-shadow: none;
  }

  .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-role,
  .chiller-theme .sidebar-wrapper .sidebar-header .user-info .user-status,
  .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
  .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text,
  .chiller-theme .sidebar-wrapper .sidebar-brand>a,
  .chiller-theme .sidebar-wrapper .sidebar-menu ul li a,
  .chiller-theme .sidebar-footer>a {
      color: #818896;
  }

  .chiller-theme .sidebar-wrapper .sidebar-menu ul li:hover>a,
  .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active>a,
  .chiller-theme .sidebar-wrapper .sidebar-header .user-info,
  .chiller-theme .sidebar-wrapper .sidebar-brand>a:hover,
  .chiller-theme .sidebar-footer>a:hover i {
      color: #b8bfce;
  }

  .page-wrapper.chiller-theme.toggled #close-sidebar {
      color: #bdbdbd;
  }

  .page-wrapper.chiller-theme.toggled #close-sidebar:hover {
      color: #ffffff;
  }

  .chiller-theme .sidebar-wrapper ul li:hover a i,
  .chiller-theme .sidebar-wrapper .sidebar-dropdown .sidebar-submenu li a:hover:before,
  .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu:focus+span,
  .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown.active a i {
      color: #16c7ff;
      text-shadow:0px 0px 10px rgba(22, 199, 255, 0.5);
  }

  .chiller-theme .sidebar-wrapper .sidebar-menu ul li a i,
  .chiller-theme .sidebar-wrapper .sidebar-menu .sidebar-dropdown div,
  .chiller-theme .sidebar-wrapper .sidebar-search input.search-menu,
  .chiller-theme .sidebar-wrapper .sidebar-search .input-group-text {
      background: #3a3f48;
  }

  .chiller-theme .sidebar-wrapper .sidebar-menu .header-menu span {
      color: #6c7b88;
  }

  .chiller-theme .sidebar-footer {
      background: #3a3f48;
      box-shadow: 0px -1px 5px #282c33;
      border-top: 1px solid #464a52;
  }

  .chiller-theme .sidebar-footer>a:first-child {
      border-left: none;
  }

  .chiller-theme .sidebar-footer>a:last-child {
      border-right: none;
  }


    </style>

    <script>
            jQuery(function ($) {

$(".sidebar-dropdown > a").click(function() {
$(".sidebar-submenu").slideUp(200);
if (
$(this)
  .parent()
  .hasClass("active")
) {
$(".sidebar-dropdown").removeClass("active");
$(this)
  .parent()
  .removeClass("active");
} else {
$(".sidebar-dropdown").removeClass("active");
$(this)
  .next(".sidebar-submenu")
  .slideDown(200);
$(this)
  .parent()
  .addClass("active");
}
});

$("#close-sidebar").click(function() {
$(".page-wrapper").removeClass("toggled");
});
$("#show-sidebar").click(function() {
$(".page-wrapper").addClass("toggled");
});




});

    </script>

</head>

<body>
                                               {{-- start sidebar --}}
<div class="page-wrapper chiller-theme toggled">
  <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
    <i class="fas fa-bars"></i>
  </a>
  <nav id="sidebar" class="sidebar-wrapper">

    <div class="sidebar-content">
      <div class="sidebar-brand">
        <div id="close-sidebar">
          <i class="fas fa-times"></i>
        </div>
      </div>
      <div class="sidebar-header">
        <div class="user-pic">

        </div>
        <div class="user-info">
          <span class="user-name">Jhon
            <strong>Smith</strong>
          </span>
          <span class="user-role">Administrator</span>
          <span class="user-status">
          </span>
        </div>
      </div>
      <!-- sidebar-header  -->
      <div class="sidebar-search" >
        <div>
            <div class="input-group">
                <form action="{{route('catigorie.search')}}">
                 <input type="text" class="form-control search-menu" placeholder="Search for catigories..." name="searC" >
                 <div class="input-group-append">
                 <span class="input-group-text">
                      <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                  </div>
              </form>
              </div>
        </div>
      </div>
      <!-- sidebar-search  -->
      <div class="sidebar-menu">
        <ul>
          <li class="header-menu">
            <span>General</span>
          </li>
          <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-tachometer-alt"></i>
              <span>Catigories</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
              <li>
                    <a href="/AnalgesicsLink">Analgesics</a>
            </li>
                <li>
                  <a href="/AntibioticsLink">Antibiotics</a>
                </li>
                <li>
                  <a href="/AntidepressantsLink">Antidepressants</a>
                </li>
                <li>
                    <a href="/AntihypertensivesLink">Antihypertensives</a>
                  </li>
                  <li>
                    <a href="/AntacidsLink">Antacids</a>
                  </li>
                  <li>
                    <a href="/AntihistaminesLink">Antihistamines</a>
                  </li>
              </ul>
            </div>
          </li>


          {{-- <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-shopping-cart"></i>
              <span>E-commerce</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Products

                  </a>
                </li>
                <li>
                  <a href="#">Orders</a>
                </li>
                <li>
                  <a href="#">Credit cart</a>
                </li>
              </ul>
            </div>
          </li> --}}



          {{-- <li class="sidebar-dropdown">
            <a href="#">
              <i class="far fa-gem"></i>
              <span>Components</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">General</a>
                </li>
                <li>
                  <a href="#">Panels</a>
                </li>
                <li>
                  <a href="#">Tables</a>
                </li>
                <li>
                  <a href="#">Icons</a>
                </li>
                <li>
                  <a href="#">Forms</a>
                </li>
              </ul>
            </div>
          </li> --}}



          {{-- <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-chart-line"></i>
              <span>Charts</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Pie chart</a>
                </li>
                <li>
                  <a href="#">Line chart</a>
                </li>
                <li>
                  <a href="#">Bar chart</a>
                </li>
                <li>
                  <a href="#">Histogram</a>
                </li>
              </ul>
            </div>
          </li> --}}



          {{-- <li class="sidebar-dropdown">
            <a href="#">
              <i class="fa fa-globe"></i>
              <span>Maps</span>
            </a>
            <div class="sidebar-submenu">
              <ul>
                <li>
                  <a href="#">Google maps</a>
                </li>
                <li>
                  <a href="#">Open street map</a>
                </li>
              </ul>
            </div>
          </li> --}}




          <li class="header-menu">
            <span>Seetings</span>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-book"></i>
              <span>Languages</span>
            </a>
          </li>


          <li>
            <a href="#">
              <i class="fa fa-calendar"></i>
              <span>Mode</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- sidebar-menu  -->
    </div>
    <!-- sidebar-content  -->

    <div class="sidebar-footer">
      <a href="#">
        <i class="fa fa-bell"></i>
        <span class="badge badge-pill badge-warning notification">3</span>
      </a>
      <a href="#">
        <i class="fa fa-envelope"></i>
        <span class="badge badge-pill badge-success notification">7</span>
      </a>

      <a href="#">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </nav>
                                     {{-- end sidebare --}}
  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
      <h2>Medicines </h2>
      <hr>


                                        {{-- search for medicine --}}
      <div class="sidebar-search">
        <div>
          <div class="input-group">
            <form action="{{route('medicine.search')}}">
                <input type="text" class="form-control search-menu" placeholder="Search for Medicine..." name="sear">
                <div class="input-group-append">
                  <span class="input-group-text">
                    <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
                </div>
            </form>

          </div>
        </div>
      </div>

                            {{-- end searching for medicine --}}





                                             {{-- start bring medicine --}}
    @foreach ($medicines as $medicine)

       <div class="card">
        <div class="card-header" id="heading{{$medicine->id}}">
          <h4 class="mb-0">
            <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{$medicine->id}}" aria-expanded="false" aria-controls="collapse{{$medicine->id}}">

                <li>{{$medicine->commercial_name}}</li>
            </button>

          </h4>
        </div>

        <div id="collapse{{$medicine->id}}" class="collapse" aria-labelledby="heading{{$medicine->id}}" data-parent="#accordion">
            <div class="card-body">
        <pre>
            <h6  style="color: #22dd0d">Scientific_name is :{{$medicine->scientific_name}}        The home combany is:{{$medicine->man_company}}       Amount:{{$medicine->amount}}      Price is :{{$medicine->price}}</h6>
            <h6 style="color: #dd0d14">Expired day in :{{$medicine->exp_day}}</h6></h6>
        </pre>
          </div>
        </div>
      </div>
    @endforeach


                                      {{--start bring medicine --}}








      {{-- <div class="row">
        <div class="form-group col-md-12">
          <p>This is a responsive sidebar template with dropdown menu based on bootstrap 4 framework.</p>
          <p> You can find the complete code on <a href="https://github.com/azouaoui-med/pro-sidebar-template" target="_blank">
              Github</a>, it contains more themes and background image option</p>
        </div>
        <div class="form-group col-md-12">
          <iframe src="https://ghbtns.com/github-btn.html?user=azouaoui-med&repo=pro-sidebar-template&type=star&count=true&size=small" frameborder="0" scrolling="0" width="90px" height="30px"></iframe>
          <iframe src="https://ghbtns.com/github-btn.html?user=azouaoui-med&repo=pro-sidebar-template&type=fork&count=true&size=small" frameborder="0" scrolling="0" width="90px" height="30px"></iframe>
        </div>
        <div class="form-group col-md-12">
          <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">New !</h4>
            <p>New react pro sidebar library is now available on <a href="https://www.npmjs.com/package/react-pro-sidebar" target="_blank">npm</a> <a href="https://github.com/azouaoui-med/react-pro-sidebar" target="_blank">
                <img alt="GitHub stars" src="https://img.shields.io/github/stars/azouaoui-med/react-pro-sidebar?style=social" />
              </a></p>
            <a href="https://github.com/azouaoui-med/react-pro-sidebar" target="_blank" class="btn btn-sm btn-primary mr-2">
              Github</a>
            <a href="https://azouaoui-med.github.io/react-pro-sidebar" target="_blank" class="btn btn-sm btn-success">
              Demo</a>

          </div>

        </div>
      </div>
      <h5>More templates</h5>
      <hr>
      <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="card rounded-0 p-0 shadow-sm">
            <img src="https://user-images.githubusercontent.com/25878302/58369568-a49b2480-7efc-11e9-9ca9-2be44afacda1.png" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-body text-center">
              <h6 class="card-title">Angular Pro Sidebar</h6>
              <a href="https://github.com/azouaoui-med/angular-pro-sidebar" target="_blank" class="btn btn-primary btn-sm">Github</a>
              <a href="https://azouaoui-med.github.io/angular-pro-sidebar/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
          <div class="card rounded-0 p-0 shadow-sm">
            <img src="https://user-images.githubusercontent.com/25878302/58369258-33f20900-7ef8-11e9-8ff3-b277cb7ed7b4.PNG" class="card-img-top rounded-0" alt="Angular pro sidebar">
            <div class="card-body text-center">
              <h6 class="card-title">Angular Dashboard</h6>
              <a href="https://github.com/azouaoui-med/lightning-admin-angular" target="_blank" class="btn btn-primary btn-sm">Github</a>
              <a href="https://azouaoui-med.github.io/lightning-admin-angular/demo/" target="_blank" class="btn btn-success btn-sm">Preview</a>
            </div>
          </div>
        </div>
      </div>
      <hr>

      <footer class="text-center">
        <div class="mb-2">
          <small>
            © 2020 made with <i class="fa fa-heart" style="color:red"></i> by - <a target="_blank" rel="noopener noreferrer" href="https://azouaoui.netlify.com">
              Mohamed Azouaoui
            </a>
          </small>
        </div>
        <div>
          <a href="https://github.com/azouaoui-med" target="_blank">
            <img alt="GitHub followers" src="https://img.shields.io/github/followers/azouaoui-med?label=github&style=social" />
          </a>
          <a href="https://twitter.com/azouaoui_med" target="_blank">
            <img alt="Twitter Follow" src="https://img.shields.io/twitter/follow/azouaoui_med?label=twitter&style=social" />
          </a>
        </div>
      </footer>
    </div>
  </main>--}}
  <!-- page-content" -->
</div>
<!-- page-wrapper -->
<script src="bootstrap5/js/bootstrap.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

</body>

</html>
