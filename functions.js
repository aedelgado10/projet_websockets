function service_status(codeWS){
	switch(codeWS){
		case 0:
			return "non-connecté";
		case 1:
			return "connecté";
		case 3:
			return "déconnecté";

		default:
			return "avec un problème de connexion";
	}
}

function close_ws(ws){
	ws.close();
}

function send_json(ws,data){
	return cx.send(JSON.stringify(data));
}

function gminfo(data){
	$('#more_info').html(data);
}
