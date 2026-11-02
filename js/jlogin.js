var $lk = jQuery.noConflict();
$lk(document).ready(function(){
	 $lk("#get_btnlogin").removeAttr('disabled');
	 $lk('#contact_us').submit(function(e) {
		Login();
		e.preventDefault();
		
	});
	
});

var reloadTimer = null;
function setReloadTime(secs) 
{
    if (arguments.length == 1) {
        if (reloadTimer) clearTimeout(reloadTimer);
        reloadTimer = setTimeout("setReloadTime()", Math.ceil(parseFloat(secs) * 1000));
    }
    else {
        location.reload();
    }
}


function Login()
 {
	 hideshow_login('ImgLoadingLogin',1);
	 error_login(0,'');
	 
	 var submitButton = $lk("#get_btnlogin");
	 btnText = $lk(submitButton).attr("value");
	 filtermail_login = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; /*#Match Mail*/
	 
	if ($lk("#txt_email").val()==''){
		error_login(1,"E-mail no v&aacute;lido");
		hideshow_login('ImgLoadingLogin',0);
		return(false);
	}
	
	if ($lk("#txt_pass").val()==''){
		error_login(1,"clave no v&aacute;lido");
		hideshow_login('ImgLoadingLogin',0);
		return(false);
	}
	
	$lk.ajax({
		type: "POST",
		url: "control_login.php",
		data: $lk('#contact_us').serialize(),
		dataType: "json",
		 beforeSend : function (){
				$lk(submitButton).attr("value", "Validando...");
        		$lk(submitButton).attr("disabled", "true");
				},success: function(msg){
					 if(parseInt(msg.status)==1)
			            {
						 $lk("#get_btnlogin").attr("value", "Entrando..");
				         success_login(1,msg.txt);
							setTimeout(function(){
							   $lk("#get_btnlogin").attr("value", btnText);
							   $lk("#get_btnlogin").removeAttr('disabled');
							   $lk('#contact_us').get(0).reset()
							}, 750);
							setTimeout(function(){
							location.href= 'listado.php';
							},3000);
							//setReloadTime(2); /*  Refresh Page to 5 Seconds  */
				        }
						else if(parseInt(msg.status)==0)
						{
							error_login(1,msg.txt);
							setTimeout(function(){
							   //success(1,msg.txt);
							   $lk("#get_btnlogin").attr("value", btnText);
							   $lk("#get_btnlogin").removeAttr('disabled');
							   $lk('#contact_us').get(0).reset()
							}, 100);
						}
			   hideshow_login('ImgLoadingLogin',0);
			}
	});
}


function hideshow_login(el,act)
{
	if(act) $lk('#'+el).css('visibility','visible');
	else $lk('#'+el).css('visibility','hidden');
}

function error_login(act,txt)
{
	$lk("#message_formlogin").addClass('Loginerror_');
	hideshow_login('message_formlogin',act);
	if(txt) $lk('#message_formlogin').html(txt);
}

function success_login(act,txt)
{
	$lk("#message_formlogin").addClass('Loginsuccess_');
	hideshow_login('message_formlogin',act);
	if(txt) $lk('#message_formlogin').html(txt);
}
