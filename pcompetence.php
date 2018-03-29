<!DOCTYPE html>
<html lang="fr">
<?php
	include './config/config.php';
?>
<head>
	<meta charset="utf-8">
	<title>Partage de compétences</title>
	<link rel="stylesheet" type="text/css" href="config/modules/bootstrap4/css/bootstrap.css">
</head>
<body>

	<div>
		<label>Le service est actuellement: <span id='status_ws'></span></label>

		<!--<button onclick="close_ws(cx);">Arrêter le service</button>-->

		<h1>Le temps:<h1>
		<p id="texto"><?php echo date("Y-m-d",1522357200); ?></p>

	</div>
	<script type="text/javascript" src="functions.js"></script>
	<script type="text/javascript">
		var host = "<?php echo WS_HOST; ?>";

		try{
			var cx = new WebSocket(host);

			var meteoTest = {
				"cmd" : "meteo_f",
				"city" : "Toulouse"
			};

			cx.onopen = function(msg){
				$('#status_ws').html(service_status(this.readyState));
			};

			cx.onmessage = function(msg){
				console.log(JSON.parse(msg.data));
				$('#texto').html(JSON.parse(msg.data));
			};

			cx.onclose   = function(msg){ 
				$('#status_ws').html(service_status(this.readyState));
			};

		}catch(ex){
			console.log(ex);
		}
	</script>
	<script type="text/javascript" src="config/modules/jquery/jquery-3.3.1.min.js"></script>
</body>
</html>