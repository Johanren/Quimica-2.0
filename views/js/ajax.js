$("#ConNombre").autocomplete({
	source: function(request, response){
		$.ajax({
			url: 'views/ajax.php',
			type:'get',
			dataType:'json',
			data: {conNom: request.term},
			success: function(data){
				response(data);
				console.log("el dato" ,data);
				
			}

		});
	},
	minLength: 1,
	select: function(event, ui){
		$(this).val(ui.item.label);
		$("#idPersonas").val(ui.item.id);
		
		return false;
	}

});

var check = function() {
	if (document.getElementById('password').value ==
		document.getElementById('confirm_password').value) {
		document.getElementById('message').style.color = 'green';
	document.getElementById('message').innerHTML = 'Contraseñas correctas';
} else {
	document.getElementById('message').style.color = 'red';
	document.getElementById('message').innerHTML = 'Contraseñas incorrectas';
}
}