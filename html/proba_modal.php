<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../css/style1.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css\font-awesome-4.7.0\css\font-awesome.css">
</head>
<script>
	
	$(document).ready(function(){
		$('.button').click(function(){
		  var buttonId = $(this).attr('id');
		  $('#modal-container').removeAttr('class').addClass(buttonId);
		  $('body').addClass('modal-active');
		})

		$('#modal-container').click(function(){
		  $(this).addClass('out');
		  $('body').removeClass('modal-active');
		});
	});
</script>
<body>
	<div id="modal-container">
	  <div class="modal-background">
	    <div class="modal">
	      <h2>I'm a Modal</h2>
	      <p>Hear me roar.</p>
	      <svg class="modal-svg" xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" preserveAspectRatio="none">
									<rect x="0" y="0" fill="none" width="226" height="162" rx="3" ry="3"></rect>
								</svg>
	    </div>
	  </div>
	</div>
	<div class="content">
	  <h1>Modal Animations</h1>
	  <div class="buttons">
	    <div id="one" class="button">Unfolding</div>
	    <div id="two" class="button">Revealing</div>
	    <div id="three" class="button">Uncovering</div>
	    <div id="four" class="button">Blow Up</div><br>
	    <div id="five" class="button">Meep Meep</div>
	    <div id="six" class="button">Sketch</div>
	    <div id="seven" class="button">Bond</div>
	  </div>
	</div>
</body>