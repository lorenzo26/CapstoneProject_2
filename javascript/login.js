function LogIn(){
	document.body.style.display="block";
		var divContainer_login = document.createElement("DIV");
			divContainer_login.className = "loginContainer";
		var imgLogo = document.createElement("IMG");
		imgLogo.setAttribute("src","images/logo-login.png")
		imgLogo.className = "logo";

		var divLogInBody = document.createElement("DIV");
		divLogInBody.className = "login-box-body";

			var pLogInMessage = document.createElement("P");
			pLogInMessage.className = "login-box-msg";
				var pLogInMessageContent = document.createTextNode("Please Sign in to Start Your Session");

			pLogInMessage.appendChild(pLogInMessageContent);

			var formLogIn = document.createElement("FORM");
			formLogIn.setAttribute("action","script/login.php");
			formLogIn.setAttribute("method","POST");
				 
				var divForm = document.createElement("DIV");
				divForm.className = "form-group has-feedback";
				 	var inputUserName = document.createElement("INPUT");
				 	inputUserName.className = "form-control";
				 	inputUserName.setAttribute("type","text");
				 	inputUserName.setAttribute("name","username");
				 	inputUserName.setAttribute("placeholder","Registration ID");
				 	inputUserName.setAttribute("required", "true");

				 	divForm.appendChild(inputUserName);

				var divForm2 = document.createElement("DIV");
				divForm2.className = "form-group has-feedback";
				 	var inputPassword = document.createElement("INPUT");
				 	inputPassword.className = "form-control";
				 	inputPassword.setAttribute("type","password");
				 	inputPassword.setAttribute("name","password");
				 	inputPassword.setAttribute("placeholder","Password");
				 	inputPassword.setAttribute("required", "true");
				 	
				 	divForm2.appendChild(inputPassword);

				var divRow = document.createElement("DIV");
				divRow.className = "row";

				
				 	
				 		var buttonSigIn = document.createElement("INPUT");
				 		buttonSigIn.className = "btn btn-primary btn-block btn-flat buttonSigIn";
				 		buttonSigIn.setAttribute("type","submit");
				 		buttonSigIn.setAttribute("name","signin");
				 		buttonSigIn.setAttribute("value","SIGN IN")
				 			

				 			
				divRow.appendChild(buttonSigIn);


			formLogIn.appendChild(divForm);
			formLogIn.appendChild(divForm2);
			formLogIn.appendChild(divRow);

			var aForgotPass = document.createElement("A");
			aForgotPass.setAttribute("href","forgotpassword.php")
				var aForgotPassContent = document.createTextNode("I forgot my password");

			aForgotPass.appendChild(aForgotPassContent);
			

		divLogInBody.appendChild(pLogInMessage);
		divLogInBody.appendChild(formLogIn);
		divLogInBody.appendChild(aForgotPass);
	divContainer_login.appendChild(imgLogo);
	document.body.appendChild(divContainer_login);
	document.body.appendChild(divLogInBody);
		
}