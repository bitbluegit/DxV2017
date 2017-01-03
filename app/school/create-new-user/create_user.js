function createUserResponseHandler(res){
	console.log(res);
}

elementById('createNewUserSubmit').addEventListener('click',function(){
	
	var createUserObj = {} , params = {} ;
	createUserObj.url = 'createUserCtrl.php';
	createUserObj.fn = createUserResponseHandler;

	var uname = elementById('username').value,
	pswd = elementById('password').value,
	usrtype =elementById('usertype').value,
	fullname = elementById('fullname').value,
	contactno = elementById('contactno').value;

	params.uname = uname;
	params.pswd = pswd;
	params.usrtype = usrtype;
	params.fullname = fullname;
	params.contactno = contactno;

	createUserObj.params = params;

	AjaxPost(createUserObj);

});
