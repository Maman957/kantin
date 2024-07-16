<!DOCTYPE html>
<html lang="en" class="light">
<!-- BEGIN: Head -->

<head>
	<meta charset="utf-8">
	<link href="<?= base_url('assets/img/icon.png') ?>" rel="shortcut icon">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Icewall admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
	<meta name="keywords" content="admin template, Icewall Admin Template, dashboard template, flat admin template, responsive admin template, web app">
	<meta name="author" content="LEFT4CODE">
	<title>Kantin LP3I Yogyakarta</title>
	<!-- BEGIN: CSS Assets-->
	<link rel="stylesheet" href="<?= site_url('asset') ?>/admin/dist/css/app.css" />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
	</link>
	<!-- END: CSS Assets-->
</head>
<!-- END: Head -->

<body class="login">
	<div class="container sm:px-10">
		<div class="block xl:grid grid-cols-2 gap-4">
			<!-- BEGIN: Login Info -->
			<div class="hidden xl:flex flex-col min-h-screen">
				<a href="" class="-intro-x flex items-center pt-5">
					<img alt="Midone - HTML Admin Template" class="h-10" src="<?= base_url('assets/img/logo.png') ?>">
				</a>
				<div class="my-auto">
					<img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="<?= site_url('asset') ?>/admin/dist/images/illustration.png">
					<div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">
						Kantin kejujuran
						<br>
						LP3I College Yogyakarta
					</div>
					<div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Ayo belanja dengan lebih mudah disini</div>
				</div>
			</div>
			<!-- END: Login Info -->
			<!-- BEGIN: Login Form -->
			<div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
				<div class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
					<h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
						Masuk
					</h2>
					<form action="<?= base_url('proses_login') ?>" method="post">
						<div class="intro-x mt-8">
							<input type="text" class="intro-x login__input form-control py-3 px-4 block" name="username" required autocomplete="off" placeholder="Username" required>
							<input type="password" class="intro-x login__input form-control py-3 px-4 block mt-4" name="password" required autocomplete="off" placeholder="Password" required>
						</div>
						<div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4">
							<div class="flex items-center mr-auto">
								<input id="remember-me" type="checkbox" class="form-check-input border mr-2">
								<label class="cursor-pointer select-none" for="remember-me">Ingatkan Saya</label>
							</div>
						</div>
						<div class="intro-x mt-5 xl:mt-8 text-center xl:text-left">
							<button type="submit" class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">Masuk</button>
							<a href="<?= base_url('daftar') ?>" class="btn btn-outline-secondary py-3 px-4 w-full xl:w-32 mt-3 xl:mt-0 align-top">Daftar</a>
						</div>
					</form>
					<div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> Copyright &copy; 2024 . Created by <a class="text-primary dark:text-slate-200" href="https://www.instagram.com/achmad_957/">Maman957</a>
					</div>
				</div>
				<!-- END: Login Form -->
			</div>
		</div>

		<script src="<?= site_url('asset') ?>/admin/dist/js/app.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>



		<?php if (@$_SESSION['gagal']) { ?>
			<script>
				swal("Data user tidak ditemukan!", "<?php echo $_SESSION['gagal']; ?>", "warning");
			</script>
			<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
		<?php unset($_SESSION['gagal']);
		} ?>
		<!-- END: JS Assets-->
		<?php if (@$_SESSION['pending']) { ?>
			<script>
				swal("Please Wait", "<?php echo $_SESSION['pending']; ?>", "warning");
			</script>
			<!-- jangan lupa untuk menambahkan unset agar sweet alert tidak muncul lagi saat di refresh -->
		<?php unset($_SESSION['pending']);
		} ?>
		<!-- END: JS Assets-->
</body>

</html>