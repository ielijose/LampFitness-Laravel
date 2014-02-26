<!DOCTYPE html>
<html>
  <head>
    <title>LampFitness</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    {{ HTML::style('bs3/css/bootstrap.min.css') }}
    {{ HTML::style('css/style-responsive.css') }}
    {{ HTML::style('css/atom-style.css') }}
    {{ HTML::style('css/font-awesome.min.css') }}
    {{ HTML::style('plugins/PCharts/style.css') }}
    {{ HTML::style('plugins/kalendar/kalendar.css') }}

    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    @yield('css')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
          {{ HTML::script('https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js') }}
          {{ HTML::script('https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js') }}
    <![endif]-->
  </head>
<body>
<!--layout-container start-->
<div id="layout-container"> 
  @include('includes.nav')
  
  <!--main start-->
  <div id="main">
    @include('includes.header')

    @yield('container')
    
  </div>
  <!--main end--> 
</div>
<!--layout-container end--> 

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
{{ HTML::script('js/jquery-1.10.2.js') }}
{{ HTML::script('js/jquery-ui-1.9.1.js') }}
<!-- Include all compiled plugins (below), or include individual files as needed --> 
{{ HTML::script('bs3/js/bootstrap.min.js') }}
{{ HTML::script('js/smooth-sliding-menu.js') }}
{{ HTML::script('js/console-numbering.js') }}
{{ HTML::script('js/to-do-admin.js') }}
{{ HTML::script('plugins/PCharts/PCharts.js') }}
{{ HTML::script('plugins/PCharts/serial.js') }}
{{ HTML::script('plugins/PCharts/amstock.js') }}
{{ HTML::script('plugins/PCharts/edit-chart.js') }}
{{ HTML::script('plugins/PCharts/gauge.js') }}
{{ HTML::script('plugins/PCharts/radar.js') }}
{{ HTML::script('plugins/PCharts/pie.js') }}
{{ HTML::script('plugins/kalendar/kalendar.js') }}
{{ HTML::script('plugins/kalendar/edit-kalendar.js') }}
{{ HTML::script('js/jquery.sparkline.js') }}
{{ HTML::script('js/sparkline-chart.js') }}
{{ HTML::script('js/select-checkbox.js') }}
{{ HTML::script('http://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.5.2/underscore-min.js') }}

@yield('js')
</body>
</html>