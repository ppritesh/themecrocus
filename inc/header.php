<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		<?php
			if ( isset( $_REQUEST['type'] ) && !empty( $_REQUEST['type'] )) {
				
				$type = $_REQUEST['type'];
				
				if ( $type == "css" ) {
					echo "CSS Minifier";
				} else if ( $type == "html" ) {
					echo "HTML Minifier";
				} else if ( $type == "js" ) {
					echo "JavaScript Minifier";
				}	else{
					header("location:index.php");
					die();
				}

			} else {
				echo "Tools Collection";
			}
		?>	
	 - themecrocus
	</title>

	<!-- If JavaScript is not enable then go to enable page -->	
	<noscript>
		<meta http-equiv="refresh" content="0;url=enable.php">
		<style>
			body div{
				display: none;
			}
		</style>
	</noscript>
	
	<!-- Fevicon Icon -->	
	<link rel="icon" type="image/png" sizes="32x32" href="/fevicon.png">

	<!-- Bootstrap CSS File -->
	<link href="css/bootstrap.min.css" rel="stylesheet">

	<!-- Bootstrap Theme File -->
	<link href="css/bootstrap-theme.min.css" rel="stylesheet">
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
	
	<!-- Google Fonts -->	
	<link href='https://fonts.googleapis.com/css?family=Ubuntu:400,700,300' rel='stylesheet' type='text/css'>
	
	<!-- Animate(Animation) Stylesheet -->
	<link rel="stylesheet" href="css/animate.css">

	<!-- WweetAlert(Cool and Amazing jQuery Alert Box) Stylesheet -->
	<link rel="stylesheet" href="css/sweetalert.css">

	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	
	<div id="page-loader">
		<div class="smooth-loader">
		  <div class="ball-one"></div>
		  <div class="ball-two"></div>
		</div>
	</div>

	<div class="container">
		<!-- Site Logo -->
		<div class="logo">
			<svg>
				<symbol id="s-text">
					<text text-anchor="middle" x="50%" y="60%" class="logo-text">
					  themecrocus
					</text>
				</symbol>
				<g class="g-ants">
					<use xlink:href="#s-text" class="text-copy"></use>     
					<use xlink:href="#s-text" class="text-copy"></use>     
					<use xlink:href="#s-text" class="text-copy"></use>     
					<use xlink:href="#s-text" class="text-copy"></use>     
					<use xlink:href="#s-text" class="text-copy"></use>     
				</g>
			</svg>
		</div>
		<!-- End Logo -->