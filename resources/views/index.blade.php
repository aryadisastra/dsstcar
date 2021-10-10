<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dsstcar Rent</title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="css/slider.css">
	<link rel="stylesheet" type="text/css" href="css/mystyle.css">
</head>
<body>
<!-- Header -->
<div class="allcontain">
	<!-- Navbar Up -->
	<nav class="topnavbar navbar-default topnav">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed toggle-costume" data-toggle="collapse" data-target="#upmenu" aria-expanded="false">
					<span class="sr-only"> Toggle navigaion</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand logo" href="#"><img src="#" alt="logo"></a>
			</div>	 
		</div>
		<div class="collapse navbar-collapse" id="upmenu">
			<ul class="nav navbar-nav" id="navbarontop">
				<li class="active"><a href="#">HOME</a> </li>
			</ul>
		</div>
	</nav>
</div>
<!--_______________________________________ Carousel__________________________________ -->
<div class="allcontain">
	<div id="carousel-up" class="carousel slide" data-ride="carousel">
		<div class="carousel-inner " role="listbox">
			<div class="item active">
				<img src="image/oldcar.jpg" alt="oldcar">
				<div class="carousel-caption">
					<h2>Porsche 356</h2>
					<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
			<div class="item">
				<img src="image/porche.jpg" alt="porche">
				<div class="carousel-caption">
					<h2>Porche</h2>
						<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
			<div class="item">
				<img src="image/benz.jpg" alt="benz">
				<div class="carousel-caption">
					<h2>Car</h2>
					<p>Lorem ipsum dolor sit amet, consectetur ,<br>
						sed do eiusmod tempor incididunt ut labore </p>
				</div>
			</div>
		</div>
</div>
<!-- ____________________Featured Section ______________________________--> 
<div class="allcontain">
	<div class="feturedsection">
		<h1 class="text-center"><span class="bdots">&bullet;</span>S E W A<span class="carstxt">M O B I L</span>&bullet;</h1>
	</div>
	<div class="feturedimage">
		<div class="row firstrow">
			@foreach($data as $data)
			@php
				$image = \App\Models\MobilAttachment::select('nama_file')->where('id_mobil',$data->id_mobil)->first();
				$name = isset($image->nama_file) ? $image->nama_file : null;
				$load = '/img/mobil/'.$name;
			@endphp
			<div class="col-lg-6 costumcol colborder1">
				<div class="row costumrow">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 img1colon">
						<img style="width:300px;height:300x;" src="{{config('app.admin_site').''.$load}}" alt="porsche">
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 txt1colon ">
						<div class="featurecontant">
							<h1>{{$data->nama_mobil}}</h1>
							<p> Sisa Stok : {{$data->stok}}
								<br>
								Merk : {{$data->merk_mobil}}
								<br>
								Jenis Mobil : {{$data->jenis_mobil == 1 ? 'Besar' : ($data->jenis_mobil ? 'Sedang' : 'Kecil')}}
							</p>
			 				<h2>Harga Sewa Per-Hari Rp.{{$data->nominal}}</h2>
			 				<button id="btnRM"> <a href="/detail/{{$data->id_mobil}}" style="color:white">Selengkapnya</a></button>
						</div>
					</div>
				</div>
			</div>
			@endforeach
		</div>
	</div>
	<div class="bottommenu">
		<div class="footer">
			<div class="copyright">
				&copy; Copy right 2021
			</div>
			<div class="atisda">
					Designed by <a href="#">Dsstr </a> 
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="css/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="js/isotope.js"></script>
<script type="text/javascript" src="js/myscript.js"></script>
<script type="text/javascript" src="css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>