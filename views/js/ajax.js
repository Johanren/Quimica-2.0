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