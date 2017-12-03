<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <title>INTERVIEW</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"></a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav pull-right">
                <li><a href="{{ '/'  }}">Teachers </a></li>
                <li class="li-first"><a href="{{ '/schools'  }}">Schools </a></li>
                <li>
                    {!! Form::open( ['action' => ['TeacherController@search'] , 'class'=>'navbar-form navbar-left']) !!}

                    <div class="form-group">
                        {!! Form::text('term',null, ['class' => 'form-control','placeholder'=>'Search teachers']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Search',['class' => 'btn btn-primary pull-right'] ) !!}
                    </div>

                    {!! Form::close() !!}
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>




@yield('content')


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<link href="{{ asset('css/Font-Awesome-master/css/font-awesome.min.css') }}" rel="stylesheet">
<!-- jQuery -->
<!-- <script type="text/javascript" src="assets/js/jquery-1.11.3.min.js"></script> -->
<script>window.jQuery || document.write('<script src="{{ asset('js/jquery-1.11.3.min.js') }}"><\/script>')</script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
</body>
</html>

