<?php get_header(); ?>

<ul class="tablon-listado-bloques">
	<li class="tablon-item">
		<section data-bloque="b1">
			<h1>aqui contenido de admin</h1>
		</section>
	</li>
	<li class="tablon-item">
		<section data-bloque="b2">
			<h1>aqui contenido de admin</h1>
		</section>
	</li>
</ul>




<?php get_footer(); ?>
<script type="text/javascript">
  $(document).ready(function() {
    //para mostrar de que bloque es el contenido
    $('.tablon-item').each(function(index, el) {
      var namebloque = $(el).find('section').attr('data-bloque');
      console.log(namebloque);
      if (namebloque) {
        $('<h1 class="tablon-title">Contenido '+namebloque+'</h1>').prependTo($(el));
      }else{
        $(el).hide();
      }
    });
  });
</script>


