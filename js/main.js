$(document).ready(function(){

	$('.form').on('submit', function(e){
         event.preventDefault();

         $form = $(this);

         submitForm($form);
	});

	$('#forget-password').on('click', function( e ){
		e.preventDefault();

		$('#login').modal('hide');

	});

});

function submitForm($form){

	$footer = $form.parent('.modal-body').next('.modal-footer');
     
    $footer.html('<img src="images/ajax-loader.gif"/>');

	$.ajax({
		url: $form.attr('action'),
		method: $form.attr('method'),
		data: $form.serialize(),
		success: function( response ){
			response = $.parseJSON(response);

			if (response.success) {
				
				if (!response.logout) {

				  setTimeout(function(){
					$footer.html( response.message );
					window.location = response.url;
				    },8000);

				}

				$footer.html( response.message );
			
				
			}else if( response.error){
				
				$footer.html( response.message);

			}

			console.log(response)
		}
	});

}