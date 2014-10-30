function suscripcion (email)
{
	jQuery('#carga').css({display:'block'});
	
	jQuery.ajax({
	    type: "POST",
	    url: url_ajax, 
	    data: {'action':'suscribete','email':email},
	   
	    success: function(resp){
	 
			if(resp == 00)
			{
				jQuery("#exito1").show("slow");
				jQuery("#aviso1").hide("fast");
				jQuery("#aviso2").hide("fast");
				jQuery('#carga').css('display','none');
				document.wp_id_suscriptflech.wp_email_sucriptflech.value="";
			}
			if(resp == 10)
			{
				jQuery("#aviso1").show("slow");
				jQuery("#exito1").hide("fast");
				jQuery("#aviso2").hide("fast");
				jQuery('#carga').css('display','none');
			}
			if(resp == 20)
			{
				jQuery("#aviso2").show("slow");
				jQuery("#exito1").hide("fast");
				jQuery("#aviso1").hide("fast");
				jQuery('#carga').css('display','none');
			}
			 
		}
    });
}