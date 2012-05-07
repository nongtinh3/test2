

$(document).ready(function(){
	//global vars
	var form = $("#form_regis");
	var name = $("#name");
	var nameInfo = $("#nameInfo");
	var email = $("#email");
	var emailInfo = $("#emailInfo");
	var pass1 = $("#pass1");
	var pass1Info = $("#pass1Info");
	var pass2 = $("#pass2");
	var pass2Info = $("#pass2Info");
	var diachi = $("#diachi");
	var diachiInfo = $("#diachiInfo");
	var phone = $("#phone");
	var phoneInfo = $("#phoneInfo");
	
	
	//On blur
	name.blur(validateName);
	email.blur(validateEmail);
	pass1.blur(validatePass1);
	pass2.blur(validatePass2);
	diachi.blur(validateDiachi);
	phone.blur(validatePhone);
	//On key press
	name.keyup(validateName);
	pass1.keyup(validatePass1);
	pass2.keyup(validatePass2);
	diachi.keyup(validateDiachi);
	phone.keyup(validatePhone);
	
	//On Submitting
	form.submit(function(){
		if(validateName() & validateEmail() & validatePass1() & validatePass2() & validateDiachi() 
		)
			return true
		else
			return false;
	});
	
	//validation functions
	function validateEmail(){
		//testing regular expression
		var a = $("#email").val();
		var filter = /^[a-zA-Z0-9]+[a-zA-Z0-9_.-]+[a-zA-Z0-9_-]+@[a-zA-Z0-9]+[a-zA-Z0-9.-]+[a-zA-Z0-9]+.[a-z]{2,4}$/;
		//if it's valid email
		if(filter.test(a)){
			email.removeClass("error");
			emailInfo.text("(*)Email này sẽ dùng để đăng nhập tài khoản, bạn nên điền email hay sử dụng nhất");
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
	function validateName(){
		//if it's NOT valid
		if(name.val().length < 4){
			name.addClass("error");
			nameInfo.text("(*)Bạn nên nhập đầy đủ Họ và Tên, gõ Tiếng Việt có dấu");
			nameInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			name.removeClass("error");
			nameInfo.text("Họ và Tên chưa hợp lệ");
			nameInfo.removeClass("error");
			return true;
		}
	}
	
	function validatePhone(){
		//if it's NOT valid
		if(phone.val().length < 10 ){
			phone.addClass("error");
			phoneInfo.text("(*)Số điện thoại phải là số ít nhất 10 kí tự");
			phoneInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			phone.removeClass("error");
			phoneInfo.text("Số điện thoại chưa chính xác");
			phoneInfo.removeClass("error");
			return true;
		}
	}
	
	function validateDiachi(){
		//if it's NOT valid
		if(diachi.val().length < 5){
			diachi.addClass("error");
			diachiInfo.text("(*)");
			diachiInfo.addClass("error");
			return false;
		}
		//if it's valid
		else{
			diachi.removeClass("error");
			diachiInfo.text("(*)");
			diachiInfo.removeClass("error");
			return true;
		}
	}
	function validatePass1(){
		var a = $("#password1");
		var b = $("#password2");

		//it's NOT valid
		if(pass1.val().length <5){
			pass1.addClass("error");
			pass1Info.text("(*)Mật khẩu truy cập có phân biệt chữ hoa, chữ thường, chữ số và ít nhất là 5 ký tự");
			pass1Info.addClass("error");
			return false;
		}
		//it's valid
		else{			
			pass1.removeClass("error");
			pass1Info.text("(*)Mật khẩu truy cập có phân biệt chữ hoa, chữ thường, chữ số và ít nhất là 5 ký tự");
			pass1Info.removeClass("error");
			validatePass2();
			return true;
		}
	}
	function validatePass2(){
		var a = $("#password1");
		var b = $("#password2");
		//are NOT valid
		if( pass1.val() != pass2.val() ){
			pass2.addClass("error");
			pass2Info.text("(*)Mật khẩu nhập lại không đúng");
			pass2Info.addClass("error");
			return false;
		}
		//are valid
		else{
			pass2.removeClass("error");
			pass2Info.text("(*)Xác nhận mật khẩu");
			pass2Info.removeClass("error");
			
			return true;
		}
	}
	
});

