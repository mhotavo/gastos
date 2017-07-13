function goLogin(){
	var connect, form, response, result, user, pass, sesion;
	user=__('usuario').value;
	pass=__('contrasena').value;
	sesion=__('session_login').checked ? true : false;

	form='user='+ user + '&pass='+ pass + '&sesion=' + sesion    ;
	connect = window.XMLHttpRequest ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
	connect.onreadystatechange =function(){
		if (connect.readyState == 4 && connect.status == 200) {
			if (connect.responseText == 1) {
				result='<div class="alert alert-dismissible alert-success">';
				result+='<button type="button" class="close" data-dismiss="alert">x</button>';
				result+='<h4>Conectado...</h4>';
				result+='<p><strong>Espera un momento por favor.</strong></p>';
				result+=' </div>';  
				__('_AJAX_LOGIN_').innerHTML = result;	 
				window.location='Integrantes';
				//location.reload();
			}else {
			__('_AJAX_LOGIN_').innerHTML = connect.responseText;
		}

		//console.log(connect.responseText);
		} else if(connect.readyState != 4){
			/**http://bootswatch.com/*/
			result='<div class="alert alert-dismissible alert-warning">';
			result+='<button type="button" class="close" data-dismiss="alert">x</button>';
			result+='<h4>Procesando...</h4>';
			result+='<p><strong>Espera un momento por favor.</strong></p>';
			result+=' </div>'; 
			__('_AJAX_LOGIN_').innerHTML = result;                                                                
		} 


	}
	connect.open('POST', 'GoLogin', true);
	connect.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded'); 
	connect.send(form);

}


function runScriptLogin(e){
	if (e.keyCode == 13) {
		goLogin();
	}
}