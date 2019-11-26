<!DOCTYPE html>
<html>
<head>
	<title>Error Page</title>
    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="stylesheet" href="{{ url('/css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	<div class="container">
		<div class="jumbotron mb-0 d-flex align-items-center flex-column justify-content-center min-100" id="header">
		    <h1 class="display-3">404</h1>
		    <p>Upps... something wrong pages..</p>
		    <p class="lead">
		        <a class="btn btn-outline-secondary btn-lg" href="#" role="button">Come Back</a>
		    </p>
		</div>
		
	</div>
    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/app.js') }}"></script>
</body>
</html>