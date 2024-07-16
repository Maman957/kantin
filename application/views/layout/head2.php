<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kantin LP3I Yogyakarta</title>
    <link href="<?= base_url('assets/img/icon.png') ?>" rel="icon">

    <link rel="stylesheet" href="<?= base_url('assets/css/katalog.css') ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600">
    <link rel="stylesheet" href="<?= base_url('assets/css/fontawesome.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/fullcalendar.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/css/tooplate.css') ?>">
    <script src="<?= base_url('assets/js/jquery-3.3.1.min.js') ?>"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <style>
        .btn-white {
            background-color: #fff !important;
            border-color: grey !important;
        }

        .btn-putih {
            background-color: #fff !important;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1) !important;
        }

        .btn-primary {
            background-color: #26156f !important;
            color: white !important;
            border-color: white !important;
        }

        .btn-danger {
            background-color: #d9241b !important;
            color: white !important;
            border-color: white !important;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .cart {
            margin-top: 20px;
            padding: 10px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .item {
            display: flex;
            align-items: center;
            padding: 10px;
            border-bottom: 1px solid #eee;
        }

        .item img {
            width: 100px;
            height: 100px;
            margin-right: 10px;
            border-radius: 4px;
        }

        .item-details {
            flex: 1;
        }

        .item-details h3 {
            margin: 0;
            color: #333;
        }

        .remove-button {
            background-color: #d9241b !important;
            color: white !important;
            border-color: white !important;
            padding: 5px 10px;
            cursor: pointer;
        }

        .remove-button:hover {
            background-color: #d9241b !important;
        }

        .add-item {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .add-item h2 {
            margin: 0 0 10px 0;
            color: #333;
        }

        #add-form {
            display: flex;
            flex-wrap: wrap;
        }

        #add-form input {
            flex: 1;
            margin-right: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .add-button {
            background-color: #4caf50;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
        }

        .add-button:hover {
            background-color: #388e3c;
        }

        .total {
            margin-top: 20px;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .total h2 {
            margin: 0;
            color: #333;
        }

        .checkout-button {
            background-color: #26156f !important;
            color: white !important;
            border-color: white !important;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 4px;
            float: right;
        }

        .checkout-button:hover {
            background-color: #26156f !important;
        }

        .card {
            width: 100%;
            padding-top: 10px;
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
            transition: transform 0.3s, box-shadow 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        .card .bg-image {
            position: relative;
            overflow: hidden;
        }

        .card .bg-image img {
            width: 100%;
            object-fit: cover;
        }

        .card .bg-image .mask {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.1);
            /* Warna biru */
            z-index: 1;
            opacity: 0;
            transition: opacity 0.3s;
        }

        .card .bg-image:hover .mask {
            opacity: 1;
        }

        .card .bg-image .mask h5 {
            position: absolute;
            bottom: 0;
            left: 0;
            margin: 0;
            padding: 8px 16px;
            background-color: #fff;
            /* Warna putih */
            color: #fff;
            font-size: 14px;
            font-weight: bold;
        }

        .card .card-body {
            padding: 16px;
        }

        .card .card-body .card-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        .card .btn-primary {
            width: 100%;
        }

        .card .card-body .price {
            font-size: 16px;
            font-weight: bold;
            color: #007bff;
            /* Warna biru */
        }

        .card .btn-primary:hover {
            background-color: rgba(0, 0, 0, 0.1);
            /* Warna biru yang lebih gelap */
        }

        /* Card hover effect */
        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            transform: translateY(-5px);
        }

        .carousel-item {
            height: 50vh;
        }

        .card {
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .footer-cta {
            box-shadow: rgba(0, 0, 0, 0.15) 0px 5px 15px;
        }

        .price {
            color: #263238;
            font-size: 24px;
        }

        .card-title {
            color: #263238
        }

        .sale {
            color: #E53935
        }

        .sale-badge {
            background-color: #E53935
        }

        .dropdown-item {
            color: #fff;
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            z-index: 1000;
            display: none;
            float: left;
            min-width: 10rem;
            padding: .5rem 0;
            margin: .125rem 0 0;
            font-size: 1rem;
            color: #fff;
            text-align: left;
            list-style: none;
            background-color: #26156f;
            background-clip: padding-box;
            border: 2px solid rgb(230 230 230);
            border-radius: .25rem
        }

        .dropdown-menu-right {
            right: 0;
            left: auto
        }

        .dropup .dropdown-menu {
            top: auto;
            bottom: 100%;
            margin-top: 0;
            margin-bottom: .125rem
        }

        .btn:active,
        .btn:focus {
            outline: none;
        }

        .btn.btn-primary {
            background-color: var(--color-black);
            color: var(--color-white);
            border-color: var(--color-black);
        }

        .search-form-wrap .search-form .btn {
            position: absolute;
            top: 2px;
            right: 4px;
            padding: 0;
            margin: 0;
            line-height: 1;
            font-size: 30px;
        }

        .search-form-wrap .search-form .btn:active,
        .search-form-wrap .search-form .btn:focus {
            outline: none;
            box-shadow: none;
        }

        .tm-col-big {
            width: 75%;
        }

        .tm-block-title {
            font-size: 1.4rem;
            color: black;
            margin-bottom: 30px;
        }

        .tm-site-title {
            display: inline-block;
            text-transform: uppercase;
            font-size: 2rem;
            margin-left: 1rem;
            color: black;
            letter-spacing: 1px;
        }

        .navbar-light .navbar-nav .nav-link {
            color: #ffff;
        }

        .bg-biru {
            background: #26156f;
        }

        .bg-merah {
            background: hsl(2.84deg 77.87% 47.84%);
        }

        .bg-white {
            background: white;
        }

        .tm-block {
            padding: 55px 40px;
        }

        .text-red {
            color: hsl(2.84deg 77.87% 47.84%);
        }

        .bg03 {
            background-image: url(<?= base_url("assets/img/dash-bg-04.jpg") ?>);
        }
    </style>
</head>