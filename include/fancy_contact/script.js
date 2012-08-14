$(document).ready(function(){
	$('#contact-form').jqTransform();
		
	$("button").click(function(){
		$(".formError").hide();
	});

	var use_ajax=true;
	$.validationEngine.settings={};

	$("#contact-form").validationEngine({
		inlineValidation: false,
		promptPosition: "centerRight",
		success :  function(){use_ajax=true},
		failure : function(){use_ajax=false;}
	 })

	$("#contact-form").submit(function(e){
			var url = $(this).attr('action');
			if(!$('#subject').val().length)
			{
				$.validationEngine.buildPrompt(".jqTransformSelectWrapper","* This field is required","error")
				return false;
			}
			if(use_ajax)
			{
				$('#loading').css('visibility','visible');
				$.post(url,$(this).serialize()+'&ajax=1',
				
					function(data){
						if(parseInt(data)==-1)
							$.validationEngine.buildPrompt("#captcha","* ´íÎóµÄÑéÖ¤ÂëWrong verification number!","error");
							
						else
						{
							$("#contact-form").hide('slow').after('<h1>Ð»Ð»Äã!</h1><br/><a href="#" class="btn" data-dismiss="modal">Close</a>');
						}
						
						$('#loading').css('visibility','hidden');
					}
				
				);
			}
			e.preventDefault();
	})
});