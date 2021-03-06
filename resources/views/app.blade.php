<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="/css/all.css" rel="stylesheet">
    <link href="/css/overwrite.css" rel="stylesheet">
    <link href="/css/tooltipster.css" rel="stylesheet">
    <link href="/css/jquery.fileupload.css" rel="stylesheet">
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300'
          rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@include('articles.partials._menu')
<div class="container">
    @include('flash::message')
    @yield('content')
</div>

<script src="/js/all.js"></script>
<script src="/js/jquery.tooltipster.min.js"></script>

@yield('footer')

<script>
    $(document).ready(function() {

        var galleryimg = '<span><img src="'+$('#tooltip').attr('data-src')+'" /></span>';
        $('#tooltip').tooltipster({
            content: $(galleryimg),
            animation: 'fade',
            delay: 200,
            position: 'bottom-left'
        });
    });
</script>
</body>
</html>