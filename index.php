<!DOCTYPE html>
<html lang="fr">
<?php
	include './config/config.php';
?>
<head>
	<meta charset="utf-8">
	<title>Partage de compétences</title>
	<link rel="stylesheet" type="text/css" href="config/modules/bootstrap4/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="config/modules/bootstrap4/css/bootstrap.css">
</head>
<body>
	<script type="text/javascript" src="config/modules/bootstrap4/js/bootstrap.js"></script>
	<script type="text/javascript" src="config/modules/jquery/jquery-3.3.1.min.js"></script>

	<script type="text/javascript">
		var host = "<?php echo WS_HOST; ?>";

		try{
			var cx = new WebSocket(host);

			console.log(cx.readyState);
			cx.onopen = function(msg){
				console.log(msg);
			};

			cx.onmessage = function(msg){ console.log("Received: "+msg.data); };
			cx.onclose   = function(msg){ console.log("Disconnected - status "+this.readyState); };
		}catch(ex){
			console.log(ex);
		}
	</script>
</body>
</html>

