$ = jQuery.noConflict();
	// $('div.acf-field').each(function(index, el) {
	//  var namecampo = $(el).attr('data-name');
	//  var ubicationlabel = $(el);
	//  if (namecampo) {
	//  	$('<h3 class="my-acf-field">'+namecampo+'</h3>').prependTo($(ubicationlabel));

	//  }	
	// });

	// $('th.acf-th').each(function(index, el) {
	//  var namecampo2 = $(el).attr('data-name');
	//  var ubicationlabel2 = $(el);
	//  if (namecampo2) {
	//  	$('<h3 class="my-acf-field2">'+namecampo2+'</h3>').prependTo($(ubicationlabel2));

	//  }	
	// });


var idbtn = document.getElementById('publish');
if (idbtn) {

	console.log('Si existe buton publish');

	// css button
	var style = window.getComputedStyle(idbtn);
	bgcbtn = style.getPropertyValue('background-color');
	bordebtn = style.getPropertyValue('border-color');
	colorbtn = style.getPropertyValue('color');
		

	//texto button
	var textbtn = idbtn.value;


	var btnsave = document.createElement("div");
	btnsave.innerHTML = '<a style="color:'+colorbtn+';background-color:'+bgcbtn+';border-color:'+bordebtn+';" href="#" class="btn-save-post"><i class="fa fa-floppy-o"></i><span class="btn-save-text">'+textbtn+'</span></a>';
	document.body.appendChild(btnsave);

	// enlazando botones grabar
	$('body').on('click', '.btn-save-post', function(event) {
		event.preventDefault();
		idbtn.click();
	});


}else{
	console.log('No existe buton publish');
}



$(document).ready(function() {

	let value_saved = $('.g0-state-project input[type="radio"]:checked').val();
	if(value_saved == 24 ){
		$('.number-dptos-delivered').addClass('active');
		$('.year-delivery').addClass('active');
		$('.descriptions-dptos').addClass('active');
	}		
	
	$('body').on('change', '.g0-state-project input[type="radio"]', function(event) {
		console.log('cambio?')
		let value_state = $(this).val();
		console.log('value_state',value_state);
		if(value_state == 24 ){
			$('.number-dptos-delivered').addClass('active');
			$('.year-delivery').addClass('active');
			$('.descriptions-dptos').addClass('active');
		}else{
			$('.number-dptos-delivered').removeClass('active');
			$('.year-delivery').removeClass('active');
			$('.descriptions-dptos').removeClass('active');
		}
		

		/* Act on the event */
	});

	//cambinado nombre a flamingo
	var namesite = $('#wp-admin-bar-site-name .ab-item').eq(0).text();
	var nameflamingo = 'Formularios '+namesite;
	$('#toplevel_page_flamingo .wp-menu-name').text(nameflamingo );

	var urlweb = window.location;
	urlweb = urlweb.search;
	urlweb = urlweb.split('=');

	if (urlweb[1] === 'flamingo') {
		$('.wp-heading-inline').text('Libreta de direcciones '+namesite);
	}	

	// mostrando el boton save al scrollear
		var altoScroll = 0
		$(window).scroll(function() {
			altoScroll = $(window).scrollTop();
			if (altoScroll > 60) {
				$('.btn-save-post').addClass('active');
			}else{
				$('.btn-save-post').removeClass('active');
			};
		});	
	// mostrando el boton save al scrollear	
});




$(window).load(function() {
	$('.wp-heading-inline').addClass('opacity');

	// tabs contact form 7
	$('#postbox-container-2').addClass('opacity');
	$('#contact-form-editor-tabs #mail-panel-tab').addClass('ui-tabs-active');
	
	// tabs contact form 7

	
});