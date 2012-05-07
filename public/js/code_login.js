

$(document).ready(function(){
	//global vars
	var form = $("#form_login");
	var email = $("#txtemail");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#txtpass");
	var pass1Info = $("#passInfo");

	
	//On blur
	
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	
	//On key press
	email.keyup(validateEmail);
	pass1.keyup(validatePass1);
	
	
	//On Submitting
	form.submit(function(){
		if( validateEmail() & validatePass1() ) 
		
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#txtemail").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("");
			emailInfo.removeClass("error");
			return true;
		}
		//if it's NOT valid
		else{
			email.addClass("error");
			emailInfo.text("(*)Email nhập không hợp lệ");
			emailInfo.addClass("error");
			return false;
		}
	}
	
	
	
	

	function validatePass1(){	

		//it's NOT valid
		if(pass1.val() == ''){
			pass1.addClass("error");
			pass1Info.text("(*)Mật khẩu không hợp lệ");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	
	
});

