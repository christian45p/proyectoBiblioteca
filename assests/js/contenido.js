$(document).ready(function(){
	$('.boton').click(function(){
		$('.contenido').load('http://localhost/proyectoBiblioteca/usuario/contenido?id='+$(this).attr('rel'));
	})
})