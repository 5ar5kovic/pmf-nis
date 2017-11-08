<?php
	$type = 0;
	if (isset($_GET['type'])) {
		$type = (int)$_GET['type'];
	} else {
		$type = 0;
	}

	if ($type <= 0) {
		$type = 0;
	} else {
		$type = 1;
	}
?>

<!DOCTYPE html>

<html>

	<head>

		<title> CodeStack </title>

		<link rel="icon" href="slike/favicon.png" type="image/gif" sizes="16x16">

		<link rel="stylesheet" type="text/css" href="../css/home.css">
		<link rel="stylesheet" href="../css/tabela.css">
    	
		<meta charset="UTF-8">

		<link rel="stylesheet" type="text/css" href="../css/font-awesome-4.7.0/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="../css/style.css">

		<script>
			function get_type() {
				return <?= $type ?> ;
			}
		</script>

		<script src="../js/jquery-3.2.1.min.js"></script>
		<script src="../js/script.js"></script>
		<script src="../js/ajax.js"></script>


		
	</head>

	<body>
		<div class="modal exit_modal">
		<div class="modal_box">
			<div class="close_modal"><i class="fa fa-times" id="close_mod"></i></div>
			<div class="header_res">Search results</div>
			<div class="content_res" id="h2_content">
				
			</div>
		</div>
	</div>
		<div class="container">
			<div class="container-in">
				<div class="con-box">
					<h2> Search for <?= $type ? "employers" : "applicants" ?> </h2>
					<h4> Enter a few keywords </h4>
					<div class="search-bar">
						  <input type="text" name="search" placeholder="Search.." class="boxq" id="search_text">
					</div>

					<div class="btn-container">
						<input id="search_button" type="button" value="Search" class="btn hvr-bob">
					</div>
				</div>

			</div>
		</div>
	
	</body>

</html>
