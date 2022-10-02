<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>titile</title>

	<link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/assets/fonts/awards/awards.css') }}"/>
	<link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}"/>

</head>
<body>

<style type="text/css">

    div.blue {
        background: blue;
    }

    div.red {
        background: red;
    }

    div.green {
        background: green;
    }

    div.yellow {
        background: yellow;
    }


    .cards-list {
        z-index: 0;
        width: 100%;
        display: flex;
        justify-content: space-around;
        flex-wrap: wrap;
    }

    .card {
        margin: 15px auto;
        width: 150px;
        height: 150px;
        border-radius: 40px;
        box-shadow: 5px 5px 30px 7px rgba(0, 0, 0, 0.25), -5px -5px 30px 7px rgba(0, 0, 0, 0.22);
        cursor: pointer;
        transition: 0.4s;

        font-size: 95px;
        text-align: center;
    }

    .card .card_image {
        width: inherit;
        height: inherit;
        border-radius: 40px;
    }

    .card .card_image img {
        width: inherit;
        height: inherit;
        border-radius: 40px;
        object-fit: cover;
    }

    .card .card_title {
        text-align: center;
        border-radius: 0px 0px 40px 40px;
        font-family: sans-serif;
        font-weight: bold;
        font-size: 30px;
        margin-top: -80px;
        height: 40px;
    }

    .card:hover {
        transform: scale(0.9, 0.9);
        box-shadow: 5px 5px 30px 15px rgba(0, 0, 0, 0.25),
        -5px -5px 30px 15px rgba(0, 0, 0, 0.22);
    }

    .title-white {
        color: white;
    }

    .title-black {
        color: black;
    }

    @media all and (max-width: 500px) {
        .card-list {
            /* On small screens, we are no longer using row direction but column */
            flex-direction: column;
        }
    }


    /*
	.card {
	  margin: 30px auto;
	  width: 300px;
	  height: 300px;
	  border-radius: 40px;
	  background-image: url('https://i.redd.it/b3esnz5ra34y.jpg');
	  background-size: cover;
	  background-repeat: no-repeat;
	  background-position: center;
	  background-repeat: no-repeat;
	box-shadow: 5px 5px 30px 7px rgba(0,0,0,0.25), -5px -5px 30px 7px rgba(0,0,0,0.22);
	  transition: 0.4s;
	}
	*/


</style>


<section id="rw-layout" class="rw-layout">

	<!--
	// ===================================^__^=================================== //
	   Header
	// ===================================^__^=================================== //
	-->
	<div class="rw-section rw-header">
		<div class="rw-inner clearfix">
			<div class="grid-container">

				<div class="grid desk-8 mob-6 alpha clearfix">
					<div class="logo-holder">
						<img src="assets/placeholder/logo.png"
							 tppabs="http://smartik.ws/demo/themeforest/html/gustos/assets/placeholder/logo.png"
							 class="logo" alt=""/>
					</div>
					<nav id="the-main-menu" class="main-menu-nav menu-inline" data-breakpoint="1160">
						<ul class="menu horizontal">
							<li><a href="/edu/sort">Сортировка</a></li>
						</ul>
					</nav>
				</div>


			</div> <!-- .grid-container -->
		</div> <!-- .rw-inner -->
	</div> <!-- .rw-header -->

	<!--
	// ===================================^__^=================================== //
	   Content
	// ===================================^__^=================================== //
	-->
	<div class="rw-section rw-container ">
		<div class="rw-inner clearfix ">
			<!-- Main content -->
			<div class="cards-list">
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>
				<div class="card null"></div>




			</div>


		</div> <!-- .rw-inner -->
	</div> <!-- .rw-container -->

	<!--
	// ===================================^__^=================================== //
	   Footer
	// ===================================^__^=================================== //
	-->
	<div class="rw-section rw-footer">
		<div class="rw-inner clearfix">
			<div class="grid-container">

				<div class="grid desk-6">

				</div>

				<div class="grid desk-6">
					<div class="footer-menu">

						Минаева Анна

					</div>
				</div>

			</div>
			<a href="#rw-layout" class="footer-to-top" title="Go to top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>
	</div> <!-- .layout-footer -->

</section><!-- .rw-layout -->

<!-- Javascript -->
<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>

<script src="{{ asset('/assets/js/min/smk-menu.min.js') }}"></script>
<script src="{{ asset('/assets/js/rw-sidebar.js') }}"></script>
<script src="{{ asset('/assets/js/rw-sidebar.js') }}"></script>
<script src="{{ asset('/assets/js/min/jquery.qtip.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/smk-accordion.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/smk-visual-select.min.js') }}"></script>
<script src="{{ asset('/assets/js/min/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/assets/js/scripts.js') }}"></script>

<script language="JavaScript">
    $(document).ready(function () {
        var arrColor = [
            "blue", "red", "yellow", "green", "blue", "red", "yellow", "green",
            "blue", "red", "yellow", "green", "blue", "red", "yellow", "green",
            "blue", "red", "yellow", "green", "blue", "red", "yellow", "green",
            "blue", "red", "yellow", "green"
        ];
        var rand;

        $('.card').on('click', function () {
            if ($(this).hasClass('null')) {
                rand = Math.floor(Math.random() * arrColor.length);
                $(this).addClass(arrColor[rand]);

                switch (arrColor[rand]) {
                    case "green":
                        $(this).text('1');
                        break;
                    case "yellow":
                        $(this).text('2');
                        break;
                    case "blue":
                        $(this).text('3');
                        break;
                    case "red":
                        $(this).text('4');
                        break;
                }


                $(this).removeClass('null');
                arrColor.splice([rand], 1);
            }

            //alert(rand+'   '+arrColor.length);
        });
    });

</script>
</body>
</html>
