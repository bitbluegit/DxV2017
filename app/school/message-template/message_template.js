
elementById('messageTmpSubmit').addEventListener('click',function(){
	var params = {} ,
	fn = function(jsonResponse){
		alert(jsonResponse.msg);
		window.location.reload();
	};
	
	params.title = elementById('title').value;
	params.msg = elementById('message').value;
	params.sec = elementById('section').value;

	if( title != "" &&  message !="" && section !="" ){
		AjaxPost('messageTmpCtrl.php',params,fn,'json');
	}else{
	
		alert('Please Fill Valid Details');
	}

});

