<!doctype html>
<html lang="pt-BR">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bootstrap demo</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<header class="d-flex justify-content-center py-3 border-bottom">
			<ul class="nav nav-pills">
				<li class="nav-item"><a href="#" class="nav-link active" aria-current="page">Home / Dashboard</a></li>
				<li class="nav-item"><a href="#" class="nav-link">Import</a></li>
				<li class="nav-item"><a href="#" class="nav-link">API</a></li>
			</ul>
		</header>
		<main class="mt-5">
			<div class="row row-cols-1 row-cols-md-3 mb-3 text-center">
				<div class="col">
					<div class="card mb-4 rounded-3 shadow-sm">
						<div class="card-header py-3">
							<h4 class="my-0 fw-normal">Free</h4>
						</div>
						<div class="card-body">
							<h1 class="card-title pricing-card-title">$0<small class="text-body-secondary fw-light">/mo</small></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li>10 users included</li>
								<li>2 GB of storage</li>
								<li>Email support</li>
								<li>Help center access</li>
							</ul>
							<button type="button" class="w-100 btn btn-lg btn-outline-primary">Sign up for free</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card mb-4 rounded-3 shadow-sm">
						<div class="card-header py-3">
							<h4 class="my-0 fw-normal">Pro</h4>
						</div>
						<div class="card-body">
							<h1 class="card-title pricing-card-title">$15<small class="text-body-secondary fw-light">/mo</small></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li>20 users included</li>
								<li>10 GB of storage</li>
								<li>Priority email support</li>
								<li>Help center access</li>
							</ul>
							<button type="button" class="w-100 btn btn-lg btn-primary">Get started</button>
						</div>
					</div>
				</div>
				<div class="col">
					<div class="card mb-4 rounded-3 shadow-sm border-primary">
						<div class="card-header py-3 text-bg-primary border-primary">
							<h4 class="my-0 fw-normal">Enterprise</h4>
						</div>
						<div class="card-body">
							<h1 class="card-title pricing-card-title">$29<small class="text-body-secondary fw-light">/mo</small></h1>
							<ul class="list-unstyled mt-3 mb-4">
								<li>30 users included</li>
								<li>15 GB of storage</li>
								<li>Phone and email support</li>
								<li>Help center access</li>
							</ul>
							<button type="button" class="w-100 btn btn-lg btn-primary">Contact us</button>
						</div>
					</div>
				</div>
			</div>
		</main>

		<footer class="pt-4 my-md-5 pt-md-5 border-top">
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