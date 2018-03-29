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
		<textarea id="texto"></textarea>
	</div>
	<script type="text/javascript" src="functions.js"></script>
	<script type="text/javascript">
		var host = "<?php echo WS_HOST; ?>";

		try{
			var cx = new WebSocket(host);

			console.log(cx.readyState);

			var meteoTest = {
				"cmd" : "meteo",
				"city" : "Toulouse"
			};

			cx.onopen = function(msg){
				console.log(msg);
			};

			cx.onmessage = function(msg){
				console.log(JSON.parse(msg.data));
			};

			cx.onclose   = function(msg){ console.log("Disconnected - status "+this.readyState); };
		}catch(ex){
			console.log(ex);
		}
	</script>
	<script type="text/javascript" src="config/modules/jquery/jquery-3.3.1.min.js"></script>
</body>
</html>