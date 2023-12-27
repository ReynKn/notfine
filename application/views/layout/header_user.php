<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?= base_url('assets/') ?>assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="<?= base_url('assets/') ?>/img/logo.jpg">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Riau Store Frozen Food</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no"
		name="viewport" />
	<!--     Fonts and icons     -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet" />
	<!-- CSS Files -->
	<link href="<?= base_url('assets/') ?>/assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= base_url('assets/') ?>/assets/css/paper-dashboard.css?v=2.0.1" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="<?= base_url('assets/') ?>assets/demo/demo.css" rel="stylesheet" />
</head>
<style>
	body {
		margin: 0;
		font-family: 'Montserrat', sans-serif;
	}

	.header_top {
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 5px 5px 5px 5px;
		background-color: lightskyblue;
	}

	.logo img {
		width: 100px;
	}

	.header_top_right {
		display: flex;
		align-items: center;
	}

	.search_box form {
		display: flex;
		align-items: center;
		margin-right: 175px;
		width: 100px;
	}

	.search_box input[type="text"],
	.search_box input[type="submit"] {
		border: 1px solid gray;
		padding: 8px;
		border-radius: 5px;
		margin-right: 5px;
	}

	.search_box input[type="submit"] {
		background-color: white;
		color: black;
		font-weight: bold;
		cursor: pointer;
	}

	.search_box input[type="submit"]:hover {
		background-color: gold;
		transition: background-color 0.3s, color 0.3s;
	}

	.nav {
		display: flex;
		list-style: none;
		padding: 15px;
		margin: 0;
		background-color: lightskyblue;
	}

	.nav li {
		margin-right: 20px;
	}

	.nav a {
		display: block;
		text-decoration: none;
		color: white;
		padding: 15px 25px 0.1px;
		border-radius: 5px;
		background-color: lightskyblue;
		transition: background-color 0.3s, color 0.3s;
	}

	.nav a:hover {
		background-color: gold;
		color: black;
		font-weight: bold;
	}
</style>
</head>

<body class="">
	<div class="header_top">
		<div class="logo">
			<a href="http://localhost/riaustore/">
				<img src="http://localhost/riaustore/uploads/logo.jpg" alt="" width="100">
			</a>
		</div>
		<ul class="nav">
			<li class="active">
				<a href="<?= site_url('DashUser/') ?>">
					<p>Home</p>
				</a>
			</li>
			<li class="active">
				<a href="<?= site_url('DashUser/product') ?>">
					<p>Produk</p>
				</a>
			</li>
			<li class="active">
				<a href="<?= site_url('DashUser/cart/') ?>">
					<p>Keranjang</p>
				</a>
			</li>
			<li class="active">
			<a href="<?= site_url('Auth/') ?>">
					<p>Login</p>
				</a>
			</li>
			<li class="active">
			<a href="<?= site_url('Auth/registrasi/') ?>">
					<p>Register</p>
				</a>
			</li>
			<li class="active">
				<a href="<?= site_url('Auth/Logout') ?>">
					<p>Logout</p>
				</a>
			</li>
		</ul>
		<div class="header_top_right">
			<div class="search_box">
				<form method="get" action="http://localhost/riaustore/search">
					<input type="text" placeholder="Search for Products" name="search">
					<input type="submit" value="SEARCH">
				</form>
			</div>
		</div>
	</div>
	<div class="navbar-wrapper">
	</div>