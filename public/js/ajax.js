function obj(){
	td=navigator.appName;
	if(td == "Microsoft Internet Explorer"){
		dd= new ActiveXObject("Microsoft.XMLHTTP");	
	}else{
		dd= new XMLHttpRequest();
	}
	return dd;
}

http=obj();

function getdata(x){
	http.open("get","check.php?data="+x,true);
	http.onreadystatechange=process;
	http.send(null);
}

function process(){
	if(http.readyState == 4 && http.status == 200){
		kq=http.responseText;
		document.getElementById("ketqua").innerHTML=kq;
	}
}