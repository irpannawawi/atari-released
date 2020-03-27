function change_to_run(id_production,url)
{
	data = {id : id_production}
	$.post(url,data,function(data){
		console.log(data)
		location.reload(true)
	})
}

function change_to_stop(id_production,url)
{
	console.log(id_production+'===='+url)
	data = {id:id_production}

	$.post(url,data,function(data){
		console.log(data)
		location.reload(true)
	})
}	