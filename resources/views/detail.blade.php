<!doctype html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Dsstcar Rent</title>
	<meta name="description" content="Scarica gratis il nostro Template HTML/CSS GARAGE. Se avete bisogno di un design per il vostro sito web GARAGE può fare per voi. Web Domus Italia">
	<meta name="author" content="Web Domus Italia">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap-3.3.6-dist/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="/css/font-awesome-4.5.0/css/font-awesome.css">
	<link rel="stylesheet" type="text/css" href="/css/slider.css">
	<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
    <style>
        input[type=text], select, textarea {
        width: 100%; /* Full width */
        padding: 12px; /* Some padding */ 
        border: 1px solid #ccc; /* Gray border */
        border-radius: 4px; /* Rounded borders */
        box-sizing: border-box; /* Make sure that padding and width stays in place */
        margin-top: 6px; /* Add a top margin */
        margin-bottom: 16px; /* Bottom margin */
        resize: vertical /* Allow the user to vertically resize the textarea (not horizontally) */
        }

        /* Style the submit button with a specific background color etc */
        .sewa {
        background-color: #04AA6D;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        /* When moving the mouse over the submit button, add a darker green color */
        .sewa:hover {
        background-color: #45a049;
        }

        /* Add a background color and some padding around the form */
        .container-form {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        }
    </style>
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
				<img src="/image/oldcar.jpg" alt="oldcar">
			</div>
            @foreach($data as $data)
			<div class="item">
				<img src="{{config('app.admin_site').'/img/mobil/'.$data->nama_file}}" alt="oldcar">
			</div>
            @endforeach
		</div>
</div>
<!-- ____________________Featured Section ______________________________--> 
<div class="allcontain">
	<div class="feturedsection">
		<h1 class="text-center"><span class="bdots">&bullet;</span>S E W A<span class="carstxt">M O B I L</span>&bullet;</h1>
	</div>
    <div class="container-form">
        <form>
            <label for="nama">Nama Mobil</label>
            <input id ="nama" class ="field" type="text" value="{{$data_mobil->nama_mobil}}" readonly>
            <label for="merk">Merk Mobil</label>
            <input id ="merk" class ="field" type="text" value="{{$data_mobil->merk_mobil}}" readonly>
            <label for="jenis">Jenis Mobil</label>
            <input id ="jenis" class ="field" type="text" value="{{$data_mobil->jenis_mobil == 1 ? 'Besar' : ($data_mobil->jenis_mobil ? 'Sedang' : 'Kecil')}}" readonly>
            <label for="stok">Sisa Stok</label>
            <input id ="stok" class ="field" type="text" value="{{$data_mobil->stok}}" readonly>
            <label for="nominal">Harga Per-Hari</label>
            <input id ="nominal" class ="field" type="text" value="Rp.{{$data_mobil->nominal}}" readonly>
            <button class="sewa"> <a href="/sewa/{{$data->id_mobil}}" style="color:black">Sewa</a></button>
        </form>
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

<script type="text/javascript" src="/css/bootstrap-3.3.6-dist/js/jquery.js"></script>
<script type="text/javascript" src="/js/isotope.js"></script>
<script type="text/javascript" src="/js/myscript.js"></script>
<script type="text/javascript" src="/css/bootstrap-3.3.6-dist/js/bootstrap.js"></script>
</body>
</html>