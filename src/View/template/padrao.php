<!doctype html>
<html lang="pt-BR">
<meta name="author" content="Fredman Tamashiro">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Filmes</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/font-awesome-4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
</head>

<body>
	<?php
	
	?>
	<div class="container">
		<header class="d-flex justify-content-center py-3 border-bottom">
			<ul class="nav nav-pills">
				<%MENU%>
			</ul>
		</header>
		<main class="mt-5">
			<%SLOT%>
		</main>

		<footer class="pt-4 my-md-5 border-top">
			<div class="row">
				<div class="col text-center">
					<small class="d-block mb-3 text-body-secondary">© Copyright - 2023</small>
				</div>
			</div>
		</footer>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>