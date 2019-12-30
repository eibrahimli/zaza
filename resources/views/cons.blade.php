<!DOCTYPE html>
<html lang="en">
<head>
	<title>Zaza.az | Sizin Elan Saytınız</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{ asset('undercons/images/icons/favicon.ico') }}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('undercons/vendor/bootstrap/css/bootstrap.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('undercons/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('undercons/vendor/animate/animate.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('undercons/vendor/select2/select2.min.css') }}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{ asset('undercons/css/util.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('undercons/css/main.css') }}">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="size1 bg0 where1-parent">
		<!-- Coutdown -->
		<div class="flex-c-m bg-img1 size2 where1 overlay1 where2 respon2" style="background-image: url('{{ asset("undercons/images/bg01.jpg") }});">
			<div class="wsize2 flex-w flex-c-m cd100 js-tilt">
				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 days">10</span>
					<span class="s2-txt4">Gün</span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 hours">00</span>
					<span class="s2-txt4">Saat</span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 minutes">00</span>
					<span class="s2-txt4">Dəqİqə</span>
				</div>

				<div class="flex-col-c-m size6 bor2 m-l-10 m-r-10 m-t-15">
					<span class="l2-txt1 p-b-9 seconds">00</span>
					<span class="s2-txt4">Sanİyə</span>
				</div>
			</div>
		</div>
		
		<!-- Form -->
		<div class="size3 flex-col-sb flex-w p-l-75 p-r-75 p-t-45 p-b-45 respon1">
			<div class="wrap-pic1">
				<img src="https://zaza.az/frontend/themes/violet/img/logo.jpeg" alt="LOGO">
			</div>

			<div class="p-t-50 p-b-60">
				<p class="m1-txt1 p-b-36">
					Zaza.az  <span class="m1-txt2">sizin elan saytınız</span>, Tezliklə!
				</p>
				<p class="s2-txt3 p-t-18">
					Elan saytı olan zaza.az sizin işinizi dahada rahatlaşdıracaq...
				</p>
			</div>

			<div class="flex-w">
				<a href="https://fb.com" class="flex-c-m size5 bg3 how1 trans-04 m-r-5">
					<i class="fa fa-facebook"></i>
				</a>

				<a href="https://twitter.com" class="flex-c-m size5 bg4 how1 trans-04 m-r-5">
					<i class="fa fa-twitter"></i>
				</a>

				<a href="https://youtube.com" class="flex-c-m size5 bg5 how1 trans-04 m-r-5">
					<i class="fa fa-youtube-play"></i>
				</a>
			</div>
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="{{ asset('undercons/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('undercons/vendor/bootstrap/js/popper.js') }}"></script>
	<script src="{{ asset('undercons/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('undercons/vendor/select2/select2.min.js') }}"></script>
<!--===============================================================================================-->
	<script src="{{ asset('undercons/vendor/countdowntime/moment.min.js') }}"></script>
	<script src="{{ asset('undercons/vendor/countdowntime/moment-timezone.min.js') }}"></script>
	<script src="{{ asset('undercons/vendor/countdowntime/moment-timezone-with-data.min.js') }}"></script>
	<script src="{{ asset('undercons/vendor/countdowntime/countdowntime.js') }}"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 10,
			endtimeHours: 00,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="asset('undercons/vendor/tilt/tilt.jquery.min.js') }}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{ asset('undercons/js/main.js') }}"></script>

</body>
</html>