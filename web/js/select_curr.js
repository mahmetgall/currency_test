// выбор валюты
$(function() {
	
	$('.select_curr').click(function() {
		var check = 0;
		var id = $(this).data('id');
    
		if (this.checked) {
			check = 1;
		}
		
		$.ajax({
			url: '/currency/select-currency',

			data : {
				'id': id,
				'check' : check

			},
			success: function(result){

			   console.log('ok-'+result);
			},
			error: function(result) {
				console.log(result);

			},
			type: "POST"
		});
    });
		

});

