function ajouterinput() {
	var numerobase = $("#nombrelien").val();
	var numero = parseInt(numerobase) + 1;
	var label = $("<label>").text("Image "+numero+":");
	var input = $('<input type="file">').attr({
		id : 'monfichier' + numero,
		name : 'monfichier' + numero
	});
	var br = $('<br/>');
	input.appendTo(label);
	$('#mesinput').append(label);
	$('#mesinput').append(br);
	$("#nombrelien").val(numero);
}
$("#ajouterinput").click(function() {
	ajouterinput();
});