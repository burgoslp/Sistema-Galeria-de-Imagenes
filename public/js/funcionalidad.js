$(document).ready(function(){

 		$('#boton-panel-create').on('click',function(e){

 				$('#panel-create').toggle();

 			event.preventDefault();
 		})

 		$('#boton-cerrar-panel-create').on('click',function(e){

 				$('#panel-create').toggle();

 			event.preventDefault();
 		})
		/////////////////////////////////////////////////////////////////
		////////////////////////////////////////////////////////////////

		 $('#boton-panel-coleccion-create').on('click',function(e){

			$('#panel-coleccion-create').toggle();

		event.preventDefault();
		})

		$('#boton-cerrar-panel-coleccion-create').on('click',function(e){

			$('#panel-coleccion-create').toggle();

		event.preventDefault();
		})
})