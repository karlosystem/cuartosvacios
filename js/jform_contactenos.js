$(document).ready(function(){
	 $("#btn_submit").removeAttr('disabled');
	 $('#contact_us').submit(function(e) {
    //$('#btn_reguser').click(function(e) {
		Contactenos();
		e.preventDefault();
		
	});
	
});

function valEmail(valor){
    re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/
    if(!re.exec(valor))    {
        return false;
    }else{
        return true;
    }
}


function Contactenos()
{
	hideshow('ImgLoadingContact',1);
	error(0,'');
	var MathNumber = /^([0-9])*$/ ;
	
	var submitButton = $("#btn_submit");
	btnText = $(submitButton).attr("value");

	var MyNombres = $("#txt_name").val();
	var MyEmail = $("#txt_email").val();
	var MyTelefono = $("#txt_phone").val();
	var MyMensaje = $("#txt_message").val();


	if(MyNombres==''){error(1,$('#txt_name').attr('title'));hideshow('ImgLoadingContact',0);return(false);}
	if(!valEmail(MyEmail) ){error(1,$('#txt_email').attr('title'));hideshow('ImgLoadingContact',0);return(false);}
	if(MyTelefono==''){error(1,$('#txt_phone').attr('title'));hideshow('ImgLoadingContact',0);return(false);}
	if(MyMensaje==''){error(1,$('#txt_message').attr('title'));hideshow('ImgLoadingContact',0);return(false);}

	$.ajax({
		type: "POST",
		url: "control_contactenos.php",
		data: $('#contact_us').serialize(),
		dataType: "json",
		        beforeSend : function (){
				$(submitButton).attr("value", "Validando Datos...");
        		$(submitButton).attr("disabled", "true");
				},success: function(msg){
			
			if(parseInt(msg.status)==1)
			{
				$("#btn_submit").attr("value", "Enviado !");
				success(1,msg.txt);
				setTimeout(function(){
	               //success(1,msg.txt);
				   $("#btn_submit").attr("value", btnText);
				   $("#btn_submit").removeAttr('disabled');
				   $('#contact_us').get(0).reset()
                }, 750);


				setTimeout(function(){
      				location.href= 'index.php';
			    },3000);
				//window.location=msg.txt;
			}
			else if(parseInt(msg.status)==0)
			{
				//$("#btn_sendmail").attr("value", "Registrado");
				error(1,msg.txt);
				setTimeout(function(){
	               //success(1,msg.txt);
				   $("#btn_submit").attr("value", btnText);
				   $("#btn_submit").removeAttr('disabled');
				   //$('#FormRegister').get(0).reset()
                }, 100);
			}
			
			hideshow('ImgLoadingContact',0);
		}
	});

}


function hideshow(el,act)
{
	if(act) $('#'+el).css('visibility','visible');
	else $('#'+el).css('visibility','hidden');
}

function error(act,txt)
{
	$("#message_formcontact").addClass('error_');
	hideshow('message_formcontact',act);
	if(txt) $('#message_formcontact').html(txt);
}

function success(act,txt)
{
	$("#message_formcontact").addClass('success_');
	hideshow('message_formcontact',act);
	if(txt) $('#message_formcontact').html(txt);
}
