$ = jQuery.noConflict();

 

var urlSite = $('.admin-url-static').attr('data-url-static');
var ubigeoDistUrl = '/static/ubigeo/departamentos.json';



$(document).ready(function() {

	var distSelected = $('.wrap_ubigeo_distrito input').val();
	if($('body').hasClass('post-type-proyectos')){
	
	    $('<select class="select-distrito"><option value="">Seleccione Departamento</option></select').appendTo('.wrap_distrito');

	    $.getJSON(urlSite+ubigeoDistUrl,function(dataListDist){
	    	console.log(dataListDist);
			var dataDist = dataListDist;
	        var listaDist ='';
	        var optionsDist = dataDist.length;
	            for(var p = 0; p < optionsDist; p++ ){
	            	var itemDist = dataDist[p];
	                 listaDist = listaDist + '<option data-ubigeo="'+itemDist.id_ubigeo+'">'+itemDist.nombre_ubigeo+'</option>';
	             };
	        
			$(listaDist).appendTo('.select-distrito');
	        $('.select-distrito').removeAttr('disabled');
	        $('.select-distrito option[data-ubigeo="'+distSelected+'"').prop('selected', 'selected');


	    }).error(function(){
	        console.log('error');
	    });    		

	    $('body').on('change', '.select-distrito', function(event) {
	    	
	    	var valDist = $('.select-distrito').val();
	    	var valDistAttr = $('.select-distrito option:selected').attr('data-ubigeo');

	    	

	    	if(valDistAttr){
			    $('.wrap_distrito input').val(valDist);
			    $('.wrap_ubigeo_distrito input').val(valDistAttr);
	    	}
	    	
	    	
	    });


	}
	



});





$(window).load(function() {


	
});