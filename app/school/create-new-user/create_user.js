function createUserResponseHandler(res){
	console.log(res);
}

elementById('createNewUserSubmit').addEventListener('click',function(){

	var params = {} ,
	fn = function(){
		 // alert('hello');
	};
	
	params.uname = elementById('username').value;
	params.pswd = elementById('password').value;
	params.usrtype = elementById('usertype').value;
	params.fullname = elementById('fullname').value;
	params.contactno = elementById('contactno').value;
	
	AjaxPost('createUserCtrl.php',params,fn,'txt');

});
