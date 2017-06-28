<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="../../favicon.ico">

	<title>Mitt MVC-projekt/CREATE</title>

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
			        aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Project name</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<form class="navbar-form navbar-right">
				<div class="form-group">
					<input type="text" placeholder="Email" class="form-control">
				</div>
				<div class="form-group">
					<input type="password" placeholder="Password" class="form-control">
				</div>
				<button type="submit" class="btn btn-success">Sign in</button>
			</form>
		</div><!--/.navbar-collapse -->
	</div>
</nav>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Add product</h1>
		<p>This is a template for a simple marketing or informational website. It includes a large callout called a
			jumbotron and three supporting pieces of content. Use it as a starting point to create something more
			unique.</p>
		<p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
	</div>
</div>

<div class="container">
	<!-- Example row of columns -->
	<div class="row">
		<div class="col-md-12">
			<h2>Product form</h2>
            <form method="post" action="/create-product">
                <div class="form-group">
                    <label for="exampleInputProduct">Product</label>
                    <input type="text" name="product" class="form-control" id="exampleInputProduct" placeholder="Product name">
                </div>
                <div class="form-group">
                    <label for="exampleInputDescription">Description</label>
                    <input type="text" name="description" class="form-control" id="exampleInputDescription" placeholder="Description">
                </div>
                <div class="form-group">
                    <label for="exampleInputPrice">Price</label>
                    <input type="text" name="price" class="form-control" id="exampleInputPrice" placeholder="Price">
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Image</label>
                    <input type="text" name="image" class="form-control" id="exampleInputImage" placeholder="URL">
                </div>
                <button type="submit" class="btn btn-default">Add!</button>
            </form>
		</div>
	</div>

	<hr>

	<footer>
		<p>&copy; 2016 Company, Inc.</p>
	</footer>
</div> <!-- /container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/vendor/jquery-3.2.1.min.js"></script>
<script src="/js/vendor/bootstrap.min.js"></script>
</body>
</html>
