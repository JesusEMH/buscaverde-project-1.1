console.log('js insertado correctamente');

$(document).ready(function (){

	console.log("jquery y la web cargados...");
	$("#divlogin").hide();
	$('#loginboton').click(function(){
		$('#divlogin').show('fast');

	});
	$("#agregar2").click(function(){
		$("#divlogin").show('fast');
	});
	$("#agregar3").click(function(){
		$("#divlogin").show('fast');
	});
});