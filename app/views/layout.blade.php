<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Destiny Island Sign In Application">

    <link rel="shortcut icon" type="image/png" href="{{ asset('favicon.png') }}">

    <title>Destiny Island Sign In Application</title>

    <link rel="stylesheet" href="{{ asset('packages/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('destiny-island.css') }}">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Wrap all page content here -->
    <div id="wrap">

        <!-- Fixed navbar -->
        <div class="navbar navbar-inverse navbar-fixed-top hidden-print" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="{{ asset('images/logo.png') }}" class="navbar-brand" alt="Causeway Coast Vineyard">
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="">{{ link_to_route('home', 'HOME') }}</li>
                        <li class="">{{ link_to_route('register', 'REGISTER') }}</li>
                        <li class="dropdown">
                          <a href="#" class="dropdown-toggle" data-toggle="dropdown">DAILY PRINT-OUTS <b class="caret"></b></a>
                          <ul class="dropdown-menu">
                            <li class="">{{ link_to_route('printout.group', 'Groups') }}</li>
                            <li class="">{{ link_to_route('printout.activity', 'Activities') }}</li>
                          </ul>
                        </li>
                        <li class="">{{ link_to_route('registrations', 'REGISTRATIONS') }}</li>
                        <li class="">{{ link_to_route('bookings', 'BOOKINGS') }}</li>
                        <li class="">{{ link_to_route('printLeadersLabel', 'LEADER LABEL') }}</li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Begin page content -->
        <div class="container">

            <div class="page-header hidden-print">
                <img src="{{ asset('images/banner.jpg') }}" class="img-responsive" alt="Destiny Island banner">
                <h1>Destiny Island @if ($subtitle) <span class="subtitle"><small>&raquo; {{ $subtitle }}</small></span> @endif</h1>
            </div>

            @if (Session::has('info'))
            <div class="alert alert-info alert-dismissable">
                <p>{{ Session::get('info') }}</p>
            </div>
            @elseif (isset($info))
            <div class="alert alert-info alert-dismissable">
                <p>{{{ $info }}}</p>
            </div>
            @endif

            @if (Session::has('message'))
            <div class="alert alert-danger alert-dismissable">
                <p>{{ Session::get('message') }}</p>
            </div>
            @elseif (isset($message))
            <div class="alert alert-danger alert-dismissable">
                <p>{{{ $message }}}</p>
            </div>
            @endif

            @if ($errors->any())
            <div class="panel panel-danger">
                <div class="panel-heading">Validation Errors</div>
                <div class="panel-body">
                    <ul>
                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                    </ul>
                </div>
            </div>
            @endif

            <div>
                {{ $content }}
            </div>

        </div>

    </div>

    <!-- JavaScript placed at the end of the document so the pages load faster -->
    <script src="{{ asset('jquery-1.11.3.min.js') }}"></script>
    <script src="{{ asset('packages/bootstrap/js/bootstrap.min.js') }}"></script>

    @yield('extra_js')

</body>

</html>
