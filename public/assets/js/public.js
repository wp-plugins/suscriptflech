function suscripcion (email, nonce)
{
    if(jQuery('#checkbox').is(":checked"))
    {
        
        jQuery('#carga').css({display:'block'});
	
	jQuery.ajax({
	    type: "POST",
	    url: url_ajax, 
	    data: {'action':'suscribete','email':email, 'nonce':nonce},
	   
	    success: function(resp){
              
	 
			if(resp.indexOf("res") == 0)
			{
				jQuery("#exito1").show("slow");
				jQuery("#aviso1").hide("fast");
				jQuery("#aviso2").hide("fast");
				jQuery('#carga').css('display','none');
                                jQuery('.form_fx').hide("fast").css({display:'none'});
				document.wp_id_suscriptflech.wp_email_sucriptflech.value="";
			}
			if(resp == 1)
			{
				jQuery("#aviso1").show("slow");
				jQuery("#exito1").hide("fast");
				jQuery("#aviso2").hide("fast");
				jQuery('#carga').css('display','none');
			}
			if(resp == 2)
			{
				jQuery("#aviso2").show("slow");
				jQuery("#exito1").hide("fast");
				jQuery("#aviso1").hide("fast");
				jQuery('#carga').css('display','none');
			}
			 
		}
        });
    }
    else
    {
        jQuery('#humano').show("slow").css({display:'block'});
    }
}