
elementById('messageTmpSubmit').addEventListener('click',function(){
	var params = {} ,
	fn = function(){
		 // alert('hello');
	};
	
	params.title = elementById('title').value;
	params.msg = elementById('message').value;
	params.sec = elementById('section').value;
	
	AjaxPost('messageTmpCtrl.php',params,fn,'txt');

});

