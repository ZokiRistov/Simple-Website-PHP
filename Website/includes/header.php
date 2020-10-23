<?php
	define ("Title", "Restaurant Website");
	$myname = "Zoran Ristov";
	$companyName = "A Casual Place To Relax In";
	include 'includes/arrays.php';
	
?>

<!DOCTYPE html>
<html>

<head>
	<title><?php echo Title; ?></title>
	<link href="/assets/styles.css" rel="stylesheet">
</head>

<body id="final-example">
	
	<div class="wrapper">
	
		<div id="banner">
				<img src="img/banner.png" alt="1900 - Nineteen Hundred Restaurant" style="max-width: 800px;">
			
		</div>

		
		<div id="nav">
			<?php include 'includes/nav.php'; ?>
		</div>
		
		<div class="content">