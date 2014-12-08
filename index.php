<html>
<head>
	<link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="asset/css/navbar-fixed-top.css" rel="stylesheet" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="asset/js/bootstrap.js"> </script>
</head>
<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-default navbar-fixed-top" role="navigation">
		<div class="container">
			<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
			</button>
			<a class="navbar-brand" href="#">Remidi Kuis 2 332150</a>
			</div>
			<div class="navbar-collapse collapse">
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<?php
	require_once('nusoap/lib/nusoap.php');
	$wsdl_url = 'http://wsf.cdyne.com/WeatherWS/Weather.asmx?WSDL';
	$client = new nusoap_client($wsdl_url, 'WSDL');
	$result = $client->call('GetWeatherInformation');
	?>
	<div class="container">
		<br>
		<br><br>
		<br>
	<table class="table table-bordered">
		<tr>
			<td>ID</td>
			<td>Weather</td>
			<td>Picture</td>
		</tr>
	<?php
	foreach ($result['GetWeatherInformationResult']['WeatherDescription'] as $weather) {

		echo "<tr>";
			echo "<td>". $weather['WeatherID']."</td>";
			echo "<td>". $weather['Description']."</td>";
			echo "<td><img src='". $weather['PictureURL']."'</td>";
		echo "</tr>";
		}
	?>
	</table>
</div>
</body>
</html>
